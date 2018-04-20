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
}
