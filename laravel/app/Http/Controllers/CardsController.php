<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;
use App\Card;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CardsController extends Controller
{
    public function new($listing_id)
    {
        return view('card/new', compact('listing_id'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all() ,[
            'card_title' => 'required|max:255',
            'card_memo' => 'required|max:255',
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $cards = new Cards;
        $cards->title = $request->card_title;
        $cards->listing_id = $request->card_listing_id;
        $cards->memo = $request->card_memo;

        $cards->save();

        return redirect('/');
    }

    public function show($listing_id, $card_id)
    {
        $listing = Listing::find($listing_id);
        $card = Card::find($card_id);

        return view('card/show', compact('listing', 'card'));
    }

    public function edit($listing_id, $card_id)
    {
        $listings = Listing::where('user_id', Auth::user()->id)->get();
        $listing = Listing::find($listing_id);
        $card = Card::find($card_id);

        return view('card/edit', compact('listings', 'listing', 'card'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all() ,[
            'card_title' => 'required|max:255',
            'card_memo' => 'required|max:255',
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $card = Card::find($request->id);
        $cards->title = $request->card_title;
        $cards->listing_id = $request->card_listing_id;
        $cards->memo = $request->card_memo;

        $cards->save();

        return redirect('/');
    }

    public function destroy($listing_id, $card_id)
    {
        $card = Card::find($card_id);
        $card->delete();

        return redirect('/');
    }
}
