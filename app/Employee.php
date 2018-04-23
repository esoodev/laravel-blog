<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $fillable = [
        'name',
        'description',
        'title',
        'birth_date',
        'is_active'
    ];

    /**
     * The magazines that belong to the employee.
     */
    public function magazines()
    {
        return $this->belongsToMany('App\Magazine')->withPivot('role_id');
    }

}
