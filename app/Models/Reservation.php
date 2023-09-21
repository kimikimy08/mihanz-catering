<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $fillable = [
        'celebrant_name',
        'event_location',
        'celebrant_age',
        'celebrant_theme',
        'celebrant_gender',
        'event_date',
        'start_time',
        'end_time',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function menu_selection()
    {
        return $this->belongsTo(MenuSelection::class);
    }

    public function porkBeefMenu()
    {
        return $this->belongsTo(Menu::class, 'pork_beef_menu_id');
    }

    public function chickenFishSeafoodMenu()
    {
        return $this->belongsTo(Menu::class, 'chicken_fish_seafood_menu_id');
    }

    public function vegetableMenu()
    {
        return $this->belongsTo(Menu::class, 'vegetable_menu_id');
    }

    public function pastaMenu()
    {
        return $this->belongsTo(Menu::class, 'pasta_menu_id');
    }

    public function dessertMenu()
    {
        return $this->belongsTo(Menu::class, 'dessert_menu_id');
    }

    public function drinkMenu()
    {
        return $this->belongsTo(Menu::class, 'drink_menu_id');
    }

}
