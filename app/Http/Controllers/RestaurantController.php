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

    public function show(Restaurant $restaurant)
    {
        // panggil relasi dari restaurant ke menu
        $menus = $restaurant->menus;
        
        return view('restaurant.show', [
            'restaurant'=> $restaurant,
            'menus' => $menus
        ]);
    }

    public function store()
    {
        // return request()->file('picture');
        $slug = \Str::slug(request()->name);

        $picture = request()->file('picture');
        $pictureUrl = $picture->store("img/restaurant");

        Restaurant::create([
            'name' => request()->name,
            'slug' => $slug,
            'description' => request()->description,
            'rating' => request()->rating,
            'category' => request()->category,
            'picture' => $pictureUrl,
        ]);

        return redirect()->route('index');
    }

                        // untuk menangkap parameter tambahan
    public function edit(Restaurant $restaurant)
    {
        return view('restaurant.edit', [
            'restaurant' => $restaurant
        ]);
    }

    public function update(Restaurant $restaurant)
    {
        if (request()->file('picture')) {
            \Storage::delete($restaurant->picture);
            $picture = request()->file('picture')->store("img/restaurant");
        } else {
            $picture = $restaurant->picture;
        }

        $slug = \Str::slug(request()->name);

        $restaurant->update([
            'name' => request()->name,
            'slug' => $slug,
            'description' => request()->description,
            'category' => request()->category,
            'rating' => request()->rating,
            'picture' => $picture,
        ]);

        return redirect()->route('index');
    }

    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        return redirect()->route('index');
    }
}
