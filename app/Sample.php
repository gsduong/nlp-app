<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class Sample extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'original_text', 'tokenized_text', 'processed_text', 'score_table', 'score', 'predicted_label', 'number_token'
    ];

    public static function custom_create($original_text, $intents, $vocab_size) {
    	// dd($intents);
        $client = new Client([
          'base_uri' => 'https://vntokenizer.herokuapp.com',
        ]);
        $payload = json_encode(array("message" => $original_text));

        $response = $client->post('/message', [
          'debug' => TRUE,
          'body' => $payload,
          'headers' => [
            'Content-Type' => 'application/json',
          ]
        ]);
        $body = $response->getBody()->getContents();
        $json = json_decode($body);
        

        // create score_table
        $score_table = array();
        $temp_array = array();
        $total_prob = 0;
        foreach ($intents as $no => $intent) {
        	$temp_array[$no] = $intent->prob_new_doc($json->finalText, $vocab_size);
        	$total_prob += $temp_array[$no];
        }
        $max_score = 0;
        foreach ($intents as $no => $intent) {
        	$score_table[$intent->name] = $temp_array[$no] / $total_prob;
        	if ($max_score <= $score_table[$intent->name]) {
        		$max_score = $score_table[$intent->name];
        	}
        }

        // predicted_label
        $predicted_label = array_search($max_score, $score_table);
        $sample = new Sample;
        $sample->original_text = $original_text;
        $sample->tokenized_text = $json->tokenizedText;
        $sample->processed_text = $json->finalText;
        $sample->number_token = $json->tokensSize;
        $sample->score_table = json_encode($score_table);
        $sample->score = $max_score;
        $sample->predicted_label = $predicted_label;
        $sample->save();

        return $sample;
    }
}
