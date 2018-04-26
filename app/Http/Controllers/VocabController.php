<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vocab;
use App\Intent;
use App\Document;
class VocabController extends Controller
{
    public function index(){
    	// Delete all and recalculate
    	Vocab::truncate();
    	$documents = Document::all();
    	foreach ($documents as $document) {
    		$words = explode(" ", $document->text);
    		foreach ($words as $key => $value) {
    			Vocab::addWord($value);
    		}
    	}
    	return view('vocab/index', ['words' => Vocab::all()]);
    }
}
