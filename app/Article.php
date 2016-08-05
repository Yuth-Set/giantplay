<?php

namespace App;

use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {
    protected $fillable = [
        'title', 'body', 'published_at'
    ];

    protected $dates = ['published_at'];
    public function scopePublished($query) {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeUnpublished($query) {
        $query->where('published_at', '>', Carbon::now());
    }

    public function setPublishedAtAttribute($date) {
        /*$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);*/
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    public function getPublishedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function getTagListAttribute() {
        return $this->tags->lists('id')->all();
    }

    public function isAuthorizeArticle() {
        if (Auth::user()) {
            if ((Auth::user() == $this->user) || (Auth::user()->type == 'admin')) {
                return true;
            }
        }
        return false;
    }

    public function isAuthorArticle() {
        if (Auth::user() && Auth::user() == $this->user) {
            return true;
        }
        return false;
    }
}
