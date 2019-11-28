<?php

namespace LibraFireProject\Http\Controllers;

use Illuminate\Http\Request;
use LibraFireProject\Item;

class AppController extends Controller
{
    public function welcome()
    {
    	$item = new Item();

    	$items = $item->allItems();

    	return view('welcome', ['items' => $items]);
    }

    public function itemOffer($id)
    {
    	$item = new Item();

    	$details = $item->findItemById($id);

    	return view('profile.offer', ['item' => $details]);
    }
}
