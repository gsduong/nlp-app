<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vocab;
class Intent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get the documents for the intent.
     */
    public function documents()
    {
        return $this->hasMany('App\Document', 'intent_id');
    }

    /**
     * Get the term_intent for the intent.
     */
    public function term_intents()
    {
        return $this->hasMany('App\TermIntent', 'intent_id');
    }

    public function count_total_term(){
        $documents = $this->documents;
        $count = 0;
        foreach ($documents as $document) {
            $count = $count + $document->term_count();
        }
        return $count;
    }

    public function count_word($word){
        $documents = $this->documents;
        $count = 0;
        foreach ($documents as $document) {
            $tokens_of_doc = explode(" ", $document->text);
            foreach ($tokens_of_doc as $token) {
                if ($token === $word) {
                    $count = $count + 1;
                }
            }
        }
        return $count;
    }

    public function prob_word($word){
        $vocab_size = Vocab::all()->count();
        if ($vocab_size == 0) {
            return 0;
        }
        return (float) ($this->count_word($word) + 1) / (float) ($this->count_total_term() + $vocab_size);        
    }

    public function prob_doc($string){
        $words = explode(" ", $string);
        $count_doc = $this->documents->count();
        $sum_doc = 0;
        $intents = Intent::all();
        foreach($intents as $intent) $sum_doc = $sum_doc + $intent->documents->count();
        $prob_doc = (float) $count_doc / (float) $sum_doc;
        foreach($words as $word) $prob_doc = $prob_doc * $this->prob_word($word);
        return $prob_doc;
    }

    public function percentage($string){
        $weight = 0;
        $intents = Intent::all();
        foreach($intents as $intent){
            $weight += $intent->prob_doc($string);
        }
        return $this->prob_doc($string) * 100 / $weight;
    }
}
