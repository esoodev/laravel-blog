<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\PageViewCounter\Traits\HasPageViewCounter;

class Magazine extends Model
{
    use HasPageViewCounter;

    const DEFAULT_CATEGORY = 1;
    const DEFAULT_CSS = "";
    const DEFAULT_JAVASCRIPT = "";

    protected $fillable = [
        'title',
        'content_lead',
        'content_body',
        'is_visible',
        'category_id',
    ];

    protected $attributes = [
        'category_id' => self::DEFAULT_CATEGORY,
        'content_css' => self::DEFAULT_CSS,
        'content_javascript' => self::DEFAULT_JAVASCRIPT,
    ];

    /**
     * Get the category that owns the magazine.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get the subjects for the magazine post.
     * One to many relationship.
     */
    public function subjects()
    {
        return $this->hasMany('App\Subject');
    }

    /**
     * The employess that belong to the magazine.
     */
    public function employees()
    {
        return $this->belongsToMany('App\Employee')->withPivot('role_id');
    }

    /**
     * Get authors of the magazine.
     */
    public function authors()
    {
        return $this->employees()->wherePivot('role_id', '=', 1);
    }

    /**
     * The tags that belong to the magazine.
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    /**
     * Get the comments for the magazine post.
     * One to many relationship.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * The employess with the given role_id.
     */
    private function employeesHasRoleId($role_id)
    {
        return $this->employees()->wherePivot('role_id', '=', $role_id)->get();
    }
}
