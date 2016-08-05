<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model {
/**
 * Fillable fields for a tag
 * @var [type]
 */
    protected $fillable = [
        'name'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function articles() {
        return $this->belongsToMany('App\Article');
    }

    public function isAuthorizeTag() {
        if (Auth::user()) {
            if ((Auth::user() == $this->user) || (Auth::user()->type == 'admin')) {
                return true;
            }
        }
        return false;
    }
}
