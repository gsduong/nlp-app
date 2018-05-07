<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Intent;
use App\Document;
use App\Vocab;
use App\Sample;
class NaiveBayesController extends Controller
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

    public function index() {
        // Sample::truncate();
        $intents = Intent::where('number_token', '>', 0)->get();
        $sample = Sample::all()->first();
        // dd($sample);
        $vocabs = Vocab::orderBy("freq", "desc")->get();
        return view('naive_bayes/index', ['vocabs' => $vocabs, 'intents' => $intents, 'sample' => $sample]);
    }

    public function train() {
    	Vocab::truncate();
        Sample::truncate();
        Intent::selfUpdateProb();
    	$intents = Intent::where('number_token', '>', 0)->get();
    	if ($intents->count() == 0) {
    		return 'No training data';
    	}
    	$bag_of_words = array();
    	$prob_table = array();
    	$total_word = Intent::all()->sum('number_token');
        $size = 0;
        foreach ($intents as $intent) {
        	$tokens_intent = json_decode($intent->bag_of_words, true);
        	foreach ($tokens_intent as $key => $value) {
	            if (array_key_exists($key, $bag_of_words)) {
	                $bag_of_words[$key] += $value;
	            }
	            else {
	                $bag_of_words[$key] = $value;
                    $size++;
	            }
        	}
        }
        foreach ($bag_of_words as $key => $value){
            $temp = array();
            foreach ($intents as $intent) {
                $temp[$intent->name] = $intent->prob_word($key, $size);
            }
            $prob_table[$key] = $temp;
        }
        foreach ($bag_of_words as $key => $value) {
            $vocab = new Vocab;
            $vocab->word = $key;
            $vocab->freq = $value;
            $vocab->prob_table = json_encode($prob_table[$key]);
            $vocab->save();
        }
        return redirect()->route('nbmodel.index')->with('success', 'Training completed!');
    }

    public function test(Request $request) {
        Sample::truncate();
        $original_text = $request->text_to_test;
        $vocabs = Vocab::all();
        $intents = Intent::where('number_token', '>', 0)->get();
        // dd($intents);
        $sample = Sample::custom_create($original_text, $intents, $vocabs->count());
        if ($sample->number_token == 0) {
            return redirect()->route('nbmodel.index')->with('errors', 'Document remains empty after processing!');
        }
        return redirect()->route('nbmodel.index')->with('success', $sample->predicted_label);
    }
}
