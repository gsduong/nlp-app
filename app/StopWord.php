<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StopWord extends Model
{
    protected $primaryKey = 'word'; // or null

    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'word'
    ];
}
