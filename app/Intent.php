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

    public function prob_new_doc($string, $vocab_size){
        $words = explode(" ", $string);
        $prob_doc = $this->prob;
        foreach ($words as $word) {
            $prob_doc *= $this->prob_word($word, $vocab_size);
        }
        return $prob_doc;
    }

    public static function selfUpdateProb(){
        $intents = Intent::all();
        foreach ($intents as $intent) {
            $intent->update(['prob' => ((float) $intent->documents->count()) / ((float) Document::all()->count())]);
        }
    }

}
