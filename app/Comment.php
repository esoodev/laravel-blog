<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    const DEFAULT_ACTIVE = true;
    const DEFAULT_MAGAZINE_ID = 0;

    protected $fillable = [
        'name',
        'email',
        'comment',
        'magazine_id'
    ];

    protected $attributes = [
        'is_active' => self::DEFAULT_ACTIVE,
        'magazine_id' => self::DEFAULT_MAGAZINE_ID,
    ];

    /**
     * The magazine that the comment belongs to.
     */
    public function magazine()
    {
        return $this->belongsTo('App\Magazine');
    }
    
}
