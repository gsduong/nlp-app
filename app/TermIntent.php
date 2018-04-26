<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TermIntent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'term', 'intent_id', 'term_count_in_intent', 'total_term_in_intent', 'prob_in_intent'
    ];
}
