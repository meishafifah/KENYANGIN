<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'rating',
        'picture',
        'category',
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
