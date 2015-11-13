<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
   protected $fillable =['title','description','image'];
}
