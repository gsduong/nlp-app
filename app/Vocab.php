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
        'word', 'freq', 'prob_table'
    ];
}
