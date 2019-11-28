<?php

namespace LibraFireProject\Http\Controllers;

use Illuminate\Http\Request;
use LibraFireProject\Item;
use LibraFireProject\Offer;

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

    public function addOffer(Request $request)
    {
    	$offer = $request->input('offer');
    	$minPrice = $request->input('minPrice');
    	$userId = $request->input('userId');
    	$itemId = $request->input('itemId');

    	$request->validate([
    		'offer' => 'required|numeric'
    	], [
    		'offer.required' => 'Offer can not be empty.',
    		'offer.numeric' => 'Offer must be a number.'
    	]);

    	$offer = (int) $offer;
    	$minPrice = (int) $minPrice;

    	if( $offer < $minPrice ){
    		return redirect()->back()->with('offerError', 'Offer can not be lower than Price.');
    	}

    	//
    }
}
