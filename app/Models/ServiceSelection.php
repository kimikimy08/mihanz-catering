<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSelection extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_category'
    ];

    public function service_promos()
    {
        return $this->hasMany(ServicePromo::class);
    }

    public function themeSelections()
    {
        return $this->hasMany(ThemeSelection::class);
    }
}
