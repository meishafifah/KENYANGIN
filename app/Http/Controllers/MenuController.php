<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function create(Restaurant $restaurant)
    {
        return view('menu.create', [
            'restaurant'=>$restaurant
        ]);
    }

    public function store(Restaurant $restaurant)
    {
        $picture = request()->file('picture');
        $pictureUrl = $picture->store("img/menu");

        // buat menu di dalam restaurant dengan relasi
        $restaurant->menus()->create([
            'name' => request()->name,
            'description' => request()->description,
            'price' => request()->price,
            'picture' => $pictureUrl
        ]);

        return redirect()->route('restaurant.show', $restaurant->slug);
    }

    public function edit(Menu $menu)
    {
        return view('menu.edit', [
            'menu'=>$menu
        ]);
    }

    public function update(Menu $menu)
    {
        if (request()->file('picture')) {
            \Storage::delete($menu->picture);
            $picture = request()->file('picture')->store("img/menu");
        } else {
            $picture = $menu->picture;
        }

        $menu->update([
            'name' => request()->name,
            'description' => request()->description,
            'price' => request()->price,
            'picture' => $picture
        ]);

        return redirect()->route('index');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->back();
    }
}
