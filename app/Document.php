<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'original_text', 'text', 'intent_id', 'tokenized_text'
    ];

    /**
     * Get the post that owns the comment.
     */
    public function intent()
    {
        return $this->belongsTo('App\Intent', 'intent_id');
    }

    public function term_count(){
        $string = $this->text;
        $words = explode(" ", $string);
        return count($words);
    }

    // public static function addNewDoc($string){
    //     $tokenized_text = $this->tokenize($string);
    //     $text = $this->remove_stopwords($tokenized_text);
    //     if ($text == '') {
    //         return null;
    //     }
    //     $doc = Document::firstOrCreate(['original_text' => $string, 'tokenized_text' => $tokenized_text, 'text' => $text]);
    //     return $doc;
    // }
    // public function remove_number($string){
    //     $tokens = explode(" ", $string);
    //     $results = "";
    //     foreach($tokens as $token) {
    //         if (ctype_digit($token)) {
    //             # code...
    //             // nothing
    //         }
    //         else {
    //             $results = $results . $token . " ";
    //         }
    //     }
    //     return trim($results);
    // }
}
