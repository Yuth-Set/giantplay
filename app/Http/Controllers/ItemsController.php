<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Item;

class ItemsController extends Controller
{
    public function index()
    {
      /*$items = Item::paginate(6);*/
      $items = DB::table('items')->paginate(6);
      return view('items.index',['items'=>$items]);
    }
}
