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
        'name', 'number_token', 'bag_of_words', 'default', 'prob'
    ];

    /**
     * Get the documents for the intent.
     */
    public function documents()
    {
        return $this->hasMany('App\Document', 'intent_id');
    }

    public function prob_word($word, $vocab_size){
        $bow = json_decode($this->bag_of_words, true);
        $count = array_key_exists($word, $bow) ? $bow[$word] : 0;
        return (float) ($count + 1) / (float) ($this->number_token + $vocab_size);
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
