<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'  
    ];

    /**
     * The magazines that belong to the tag.
     */
    public function magazines()
    {
        return $this->belongsToMany('App\Magazine');
    }
}
