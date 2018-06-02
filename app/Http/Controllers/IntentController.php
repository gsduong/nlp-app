<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Intent;
use App\Document;
use App\StopWord;
use App\Vocab;

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
        $this->updateProb();
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
            if($doc = Document::custom_create($original_text, $intent_id)){
                // update the probability of current intent in the whole training documents
                Vocab::truncate();
                $this->updateProb();
                return redirect('intent/' . $intent_id . '/add')->with('success', 'New document successfully added!');
            };
            return redirect('intent/' . $intent_id . '/add')->with('errors', 'New document failed to add! Check for duplication or document content.');
    	}
    	return "Intent not found";
    }

    public function updateDocument(Request $request, $intent_id, $doc_id){
        $intent = Intent::find($intent_id);
        if ($intent) {
            $doc = $intent->documents()->find($doc_id);
            if ($doc){
                $original_text = trim($request->document);
                if($updated_doc = $doc->custom_update($original_text)){
                    // if document is updated, intent bag of word need to be updated and model need to be retrain
                    Vocab::truncate();
                    return redirect()->route('intent.edit.document', [$intent_id, $doc_id])->with('success', 'Document successfully updated!');
                };
                return redirect()->route('intent.edit.document', [$intent_id, $doc_id])->with('errors', 'Document failed to update! Check for duplication or document content.');
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
            $doc->custom_delete();
            Vocab::truncate();
            $this->updateProb();
    	}
    	return redirect('intent/' . $intent_id);
    }

    private function updateProb(){
        $intents = Intent::all();
        foreach ($intents as $intent) {
            $intent->update(['prob' => ((float) $intent->documents->count()) / ((float) Document::all()->count())]);
        }
    }
    public function intents(){
        return response()->json(Intent::all());
    }
    public function documents() {
        return response()->json(Document::all());
    }
}
