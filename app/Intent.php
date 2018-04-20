<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
     * Get the comments for the blog post.
     */
    public function documents()
    {
        return $this->hasMany('App\Document', 'intent_id');
    }
}
