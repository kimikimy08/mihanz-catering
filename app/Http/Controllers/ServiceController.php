<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceSelection;
use App\Models\ThemeSelection;

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

    public function themesindex()
    {
        $themesItems = ThemeSelection::all();
        foreach ($themesItems as $themesItem) {
            $themesItem->theme_image = asset("images/themes/".rawurlencode($themesItem->theme_image));
        }
        return view('guest.themes', ['themesItems' => $themesItems]);
    }

    private function storeUniqueThemesPic($file, $userId)
    {
        $uniqueFilename = 'themes_' . time() . '.' . $file->getClientOriginalExtension();

        $file->storeAs('public/images/themes', $uniqueFilename);

        return 'themes/' . $uniqueFilename;
    }
}
