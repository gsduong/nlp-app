<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Vocab extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'word', 'freq'
    ];

    public static function addWord($string){
    	$words = Vocab::all();
    	$flag = 0;
    	if ($words->count() > 0) {
    		foreach ($words as $word) {
    			if ($word->word == $string) {
    				$word->freq = $word->freq + 1;
    				$word->save();
    				$flag = 1;
    				break;
    			}
    		}
    		if ($flag == 0) Vocab::create(['word' => $string]);
    	}
    	else {
    		Vocab::create(['word' => $string]);
    	}
    }
}
