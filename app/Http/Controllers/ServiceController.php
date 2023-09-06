<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceSelection;

class ServiceController extends Controller
{
    public function index()
    {
        $servicesItems = ServiceSelection::all();
        foreach ($servicesItems as $servicesItem) {
            $servicesItem->services_image = asset("images/services/service_selection/".rawurlencode($servicesItem->services_image));
        }
        return view('guest.services', compact('servicesItems'));
    }
}
