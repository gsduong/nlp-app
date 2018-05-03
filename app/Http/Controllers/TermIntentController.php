<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TermIntent;
use App\Vocab;
use App\Intent;
class TermIntentController extends Controller
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
		// $words = Vocab::all();
		// $terms = array();
		// $intents = Intent::all();
		// foreach ($words as $word) {
		// 	array_push($terms, $word->word);
		// }
		$intents = Intent::all();
		$terms = Vocab::pluck('word')->toArray();

		// truncate and recalculate
		TermIntent::truncate();
		foreach ($intents as $intent) {
			// count total words in intents
			$total_term_in_intent = $intent->count_total_term();
			foreach ($terms as $term) {
				$intent_id = $intent->id;
				$term_count_in_intent = $intent->count_word($term);
				$prob_in_intent = $intent->prob_word($term);
				$term_intent = new TermIntent;
				$term_intent->term = $term;
				$term_intent->intent_id = $intent_id;
				$term_intent->term_count_in_intent = $term_count_in_intent;
				$term_intent->total_term_in_intent = $total_term_in_intent;
				$term_intent->prob_in_intent = $prob_in_intent;
				$term_intent->save();
			}
		}
		//'term_intents' => TermIntent::all()
		return view('term_intent/index', ['intents' => $intents, 'terms' => $terms]);
	}

}
