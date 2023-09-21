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


}
