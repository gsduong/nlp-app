<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Sample;
use App\Intent;

class TestingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index(){
		return view('console/index');
	}
	public function test(Request $request){
		$document = trim($request->document);
		$tokenized_text = $this->tokenize($document);
		$processed_text = $this->process($tokenized_text);
        if ($tokenized_text == '') {
            return "String remains nothing after removing stopwords";
        }
        $terms = explode(" ", $processed_text);
		return view('console/result', ['document' => $document, 'tokenized_text' => $tokenized_text, 'processed_text' => $processed_text, 'intents' => Intent::all(), 'terms' => $terms]);
	}
	public function process($text){
		$text = $this->remove_stopwords($text);
		$text = $this->remove_number($text);
		$text = $this->remove_punctuation($text);
		return $text;
	}
    public function tokenize($string){
        $string = mb_strtolower($string);
        $client = new Client([
          'base_uri' => 'https://pyvi.herokuapp.com',
        ]);
        $payload = json_encode(array("text" => $string));
        $response = $client->post('/vntokenizer', [
          'debug' => TRUE,
          'body' => $payload,
          'headers' => [
            'Content-Type' => 'application/json',
          ]
        ]);
        return json_decode($response->getBody()->getContents())->text;
    }
    public function remove_number($string){
        $tokens = explode(" ", $string);
        $results = "";
        foreach($tokens as $token) {
            if (ctype_digit($token)) {
                # code...
                // nothing
            }
            else {
                $results = $results . $token . " ";
            }
        }
        return trim($results);
    }
    public function remove_punctuation($string){
        $punctuations = ["`", "~", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "-", "+", "{", "}", "|", "\\", ":", ";", "\"", "'", ",", ".", "?", "/"];
        $tokens = explode(" ", $string);
        $results = "";
        foreach($tokens as $token) {
            if (!in_array($token, $punctuations)) {
                $results = $results . $token . " ";
            }
        }
        return trim($results);
    }
    public function remove_stopwords($string){
        $stop_words = array();
        if ($file = fopen("uploads/files/stopwords.txt", "r")) {
            while(!feof($file)) {
                $line = trim(fgets($file));
                array_push($stop_words, $line);
            }
            fclose($file);
        }
        $tokens = explode(" ", $string);
        $result = "";
        foreach($tokens as $token){
            if(!in_array($token, $stop_words)) {
                $result = $result . $token . " ";
            }
        }
        return trim($result);
    }
}
