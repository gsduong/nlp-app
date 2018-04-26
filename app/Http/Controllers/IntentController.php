<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Intent;
use App\Document;
use App\StopWord;

class IntentController extends Controller
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
    	$intents = Intent::all();
    	return view('intent/index', ['intents' => $intents]);
    }

    public function show($id){
    	$intent = Intent::find($id);
    	if (!$intent) {
    		return "Intent not found";
    	}
    	return view('intent/show', ['intent' => $intent]);
    }

    public function showFormAddDocument($intent_id){
    	$intent = Intent::find($intent_id);
        if ($intent) return view('intent/add_doc', ['intent' => $intent]);
        return "Intent not found";
    }

    public function showFormEditDocument($intent_id, $doc_id){
        $intent = Intent::find($intent_id);
        if($intent) {
            $doc = $intent->documents()->find($doc_id);
            if ($doc){
                return view('intent/edit_doc', ['document' => $doc, 'intent' => $intent]);
            }
            return redirect('intent/' . $intent_id);
        }
        return "Intent not found";
    }

    public function addDocument(Request $request, $intent_id){
    	$intent = Intent::find($intent_id);
    	if ($intent) {
    		$original_text = trim($request->document);
            $tokenized_text = $this->tokenize($original_text);
            $text = $this->remove_stopwords($tokenized_text);
            $text = $this->remove_number($text);
            $text = $this->remove_punctuation($text);
            if ($text == '') {
                return "String remains nothing after removing stopwords";
            }
    		$intent->documents()->firstOrCreate(['original_text' => $request->document, 'tokenized_text' => $tokenized_text, 'text' => $text]);
            return redirect('intent/' . $intent_id . '/add');
    	}
    	return "Intent not found";
    }

    public function updateDocument(Request $request, $intent_id, $doc_id){
        $intent = Intent::find($intent_id);
        if ($intent) {
            $doc = $intent->documents()->find($doc_id);
            if ($doc){
                $original_text = trim($request->document);
                $tokenized_text = $this->tokenize($original_text);
                $text = $this->remove_stopwords($tokenized_text);
                $text = $this->remove_number($text);
                $text = $this->remove_punctuation($text);
                if ($text == '') {
                    return "String remains nothing after removing stopwords";
                }
                $doc->update(['original_text' => $request->document, 'tokenized_text' => $tokenized_text, 'text' => $text]);
                return redirect()->route('intent.edit.document', [$intent_id, $doc_id]);
            }
            return redirect('intent/' . $intent_id);
        }
        return "Intent not found";
    }

    public function deleteDocument($intent_id, $doc_id) {
    	$intent = Intent::find($intent_id);
    	if (!$intent) {
    		return "Intent not found";
    	}
    	$doc = $intent->documents->find($doc_id);
    	if ($doc) {
    		$doc->delete();
    	}
    	return redirect('intent/' . $intent_id);
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
        $body = $response->getBody()->getContents();
        $json = json_decode($body);
        return $json->text;
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

}
