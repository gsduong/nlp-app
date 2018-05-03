<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class Document extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'original_text', 'text', 'intent_id', 'tokenized_text', 'number_token', 'tokens'
    ];

    /**
     * Get the post that owns the comment.
     */
    public function intent()
    {
        return $this->belongsTo('App\Intent', 'intent_id');
    }

    public function term_count(){
        return $this->number_token;
    }

    public static function custom_create($original_text, $intent_id){
        $flag = null;
        if (Document::where('original_text', '=', $original_text)->count() > 0) {
            // duplicate found
            return $flag;
        }
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

        if ($json->tokensSize > 0) {
            $doc = new Document;
            $doc->intent_id = $intent_id;
            $doc->original_text = $original_text;
            $doc->tokenized_text = $json->tokenizedText;
            $doc->tokens = json_encode($json->tokens);
            $doc->number_token = $json->tokensSize;
            $doc->text = $json->finalText;
            $doc->save();
            // $flag = true;
            return $doc;
        }
        return $flag;
    }

    public function custom_update($original_text) {
        
        $flag = null;
        if (Document::where('original_text', '=', $original_text)->count() > 0) {
            // a similar document found
            return $flag;
        }
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
        if ($json->tokensSize > 0) {
            $old_tokens_document = json_decode($this->attributes['tokens'], true);
            $this->attributes['original_text'] = $original_text;
            $this->attributes['tokenized_text'] = $json->tokenizedText;
            $this->attributes['tokens'] = json_encode($json->tokens);
            $this->attributes['number_token'] = $json->tokensSize;
            $this->attributes['text'] = $json->finalText;

            $this->save();
            // $flag = true;
            $intent = $this->intent;
            $tokens_intent = json_decode($intent->bag_of_words, true);
            if (!$tokens_intent) {
                $tokens_intent = array();
            }
            foreach ($old_tokens_document as $token) {
                if (array_key_exists($token, $tokens_intent)) {
                    $tokens_intent[$token]--;
                    if ($tokens_intent[$token] == 0) {
                        unset($tokens_intent[$token]);
                    }
                }
            }
            $tokens_document = json_decode($this->attributes['tokens'], true);
            foreach ($tokens_document as $token) {
                if (array_key_exists($token, $tokens_intent)) {
                    $tokens_intent[$token]++;
                }
                else {
                    $tokens_intent[$token] = 1;
                }
            }
            $intent->update(['bag_of_words' => json_encode($tokens_intent)]);
            $intent->update(['number_token' => $intent->documents->sum('number_token')]);
            return Document::find($this->attributes['id']);
        }
        return $flag;
    }
}
