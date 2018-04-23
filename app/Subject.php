<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    
    const DEFAULT_MAGAZINE = 0;    

    protected $fillable = [
        'name',
        'magazine_id'    
    ];

    protected $attributes = [
        'magazine_id'=>self::DEFAULT_MAGAZINE
    ];

    /**
     * Get the magazine that owns the subject.
     */
    public function magazine()
    {
        return $this->belongsTo('App\Magazine');
    }

}
