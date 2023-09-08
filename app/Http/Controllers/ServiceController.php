<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceSelection;
use App\Models\ThemeSelection;
use App\Models\ServicePromo;

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

    public function servicePromoIndex($serviceCategory = null)
    {
        $categoryName = ServiceSelection::where('services_category', $serviceCategory)->first()->services_category;
        $promos = ServicePromo::whereHas('serviceSelection', function ($query) use ($serviceCategory) {
            $query->where('services_category', $serviceCategory);
        })->get();
    
        return view('guest.servicePromoIndex', compact('promos', 'categoryName'));
    }

    public function servicePromoPic($serviceCategory, $servicePromo)
    {
        // Retrieve the service category and promo by their slugs or IDs
        $category = ServiceSelection::where('services_category', $serviceCategory)->firstOrFail(); // Adjust this based on your model
        $promo = ServicePromo::where('id', $servicePromo)->firstOrFail();           // Adjust this based on your model

        // Ensure the promo belongs to the specified category
        if ($promo->service_selection_id !== $category->id) {
            abort(404); // or handle it in another way, e.g., redirect
        }



        

        return view('guest.servicePromoPic', compact('promo', 'category'));
    }


    public function adminindex () {
        $services = ServiceSelection::all();
        foreach ($services as $service) {
            $service->services_image = asset("images/services/service_selection/".rawurlencode($service->services_image));
        }
        return view('admin.services', compact('services'));
    }

    public function admin_theme_index()
    {
        $themes = ThemeSelection::with('serviceSelection')->get();

        foreach ($themes as $theme) {
            $theme->theme_image = asset("images/themes/" . rawurlencode($theme->theme_image));
        }

        return view('admin.themes', compact('themes'));
    }

    private function storeUniqueThemesPic($file, $userId)
    {
        $uniqueFilename = 'themes_' . time() . '.' . $file->getClientOriginalExtension();

        $file->storeAs('public/images/themes', $uniqueFilename);

        return 'themes/' . $uniqueFilename;
    }
}
