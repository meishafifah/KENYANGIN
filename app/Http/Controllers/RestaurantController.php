<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function create()
    {
       return view('restaurant/create');
    }

    public function store()
    {
        return request()->name;
        // Restaurant::create([
        //     ''
        // ])
    }
}
