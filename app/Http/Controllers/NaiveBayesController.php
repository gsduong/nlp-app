<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NaiveBayesModel;
use App\Intent;
use App\Document;
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

    }

    public function train() {
    	NaiveBayesModel::truncate();

    	$intents = Intent::where('number_token', '>', 0)->get();
    	if ($intents->count() == 0) {
    		return 'Failed to train!';
    	}
    	$bag_of_words = array();
    	$prob_array = array();
    	$size = Intent::all()->sum('number_token');
        foreach ($intents as $intent) {
        	$tokens_intent = json_decode($intent->bag_of_words, true);
        	foreach ($tokens_intent as $key => $value) {
	            if (array_key_exists($key, $bag_of_words)) {
	                $bag_of_words[$key] += $value;
	            }
	            else {
	                $bag_of_words[$key] = $value;
	            }
	            $prob_array[$key] = $intent->prob_word($key, $size);
        	}
        }

        NaiveBayesModel::create(['bag_of_words' => json_encode($bag_of_words), 'prob_table' => json_encode($prob_table), 'size' => $size]);
    }
}
