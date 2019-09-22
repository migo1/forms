<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\State;

class MainController extends Controller
{
    public function index()
    {
        $countries = Country::all()->pluck('name', 'id');

        return view('welcome', compact('countries'));
    }


    public function getStates($id)
    {
        $states = State::where('country_id', $id)->pluck('name', 'id');
        return json_encode($states);

    }
}
