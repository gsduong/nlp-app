<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NaiveBayesModel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bag_of_words', 'size', 'prob_table'
    ];
}
