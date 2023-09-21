<?php

namespace App\Http\Controllers;

use App\Models\ServiceSelection;
use App\Models\ThemeSelection;
use App\Models\ServicePromo;
use App\Models\MenuSelection;
use App\Models\Menu;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function premade_create($serviceCategory, $servicePromo)
    {
        $menuSelections = MenuSelection::all();
        $categoryName = ServiceSelection::where('services_category', $serviceCategory)->first()->services_category;
        $category = ServiceSelection::where('services_category', $serviceCategory)->firstOrFail(); 
        $promo = ServicePromo::where('id', $servicePromo)->firstOrFail(); 

        $vegetables = Menu::where('menu_selection_id', 7)->get();
        $desserts = Menu::where('menu_selection_id', 8)->get();
        $drinks = Menu::where('menu_selection_id', 9)->get();

        $beefMenus = Menu::where('menu_selection_id', 2)->get();

    // Fetch available menus for "pork" category
        $porkMenus = Menu::where('menu_selection_id', 1)->get();
        $chickenMenus = Menu::where('menu_selection_id', 3)->get();
        $fishMenus = Menu::where('menu_selection_id', 4)->get();
        $seafoodMenus = Menu::where('menu_selection_id', 5)->get();
        $pastas = Menu::where('menu_selection_id', 6)->get();

        return view('user.premade.create', compact('menuSelections', 'drinks', 'desserts', 'vegetables', 'beefMenus', 'porkMenus',
    'chickenMenus', 'fishMenus', 'seafoodMenus', 'pastas', 'categoryName', 'promo'));      
    }

    public function premade_store(Request $request, $serviceCategory, $servicePromo)
    {
        $categoryName = ServiceSelection::where('services_category', $serviceCategory)->first()->services_category;
        $category = ServiceSelection::where('services_category', $serviceCategory)->firstOrFail(); 
        $promo = ServicePromo::where('id', $servicePromo)->firstOrFail(); 

        $servicesItems = ServiceSelection::all();

        $termsAndConditions = $request->input('terms_and_conditions');

        if ($termsAndConditions === 'accept') {
        $validatedData = $request->validate([
            // Add validation rules for your reservation fields
            'celebrant_name' => 'required|string|max:255',
            'event_location' => 'required|string|max:255',
            'celebrant_age' => 'required|integer',
            'celebrant_theme' => 'required|string|max:255',
            'celebrant_gender' => 'required|string|max:255',
            'event_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            // Add more validation rules based on your form fields
        ]);

       

        $user = Auth::user();

        $reservation = new Reservation();
        $reservation->celebrant_name = $validatedData['celebrant_name'];
        $reservation->event_location = $validatedData['event_location'];
        $reservation->celebrant_age = $validatedData['celebrant_age'];
        $reservation->celebrant_theme = $validatedData['celebrant_theme'];
        $reservation->celebrant_gender = $validatedData['celebrant_gender'];
        $reservation->event_date = $validatedData['event_date'];
        $reservation->start_time = $validatedData['start_time'];
        $reservation->end_time = $validatedData['end_time'];

        $reservation->order_type = 'Pre-made';
        $reservation->promo_id = $promo->id;

        if (Auth::check()) {
            $reservation->user_id = Auth::user()->id;
        }

        $menuCategory = $request->input('menu_category');
        if ($menuCategory === 'pork' || $menuCategory === 'beef') {
            // Find the MenuSelection ID for the chosen category
            $menuSelection = MenuSelection::where('menu_category', $menuCategory)->first();
            if ($menuSelection) {
                $reservation->pork_beef_menu_selection_id = $menuSelection->id;
            }
        }

        $menuCategoryPorkBeef = $request->input('menu_category');
        $selectedMenuId = $request->input('menu_id');

        if ($menuCategoryPorkBeef === 'pork') {
            $reservation->pork_beef_menu_id = Menu::where('menu_selection_id', 1)->find($selectedMenuId)->id;
        } elseif ($menuCategoryPorkBeef === 'beef') {
            $reservation->pork_beef_menu_id = Menu::where('menu_selection_id', 2)->find($selectedMenuId)->id;
        }

        
        $menuCategory = $request->input('menu_category_cfs');
        if ($menuCategory === 'chicken' || $menuCategory === 'fish' || $menuCategory === 'seafood') {
            // Find the MenuSelection ID for Chicken/Fish/Seafood
            $menuSelectionCFS = MenuSelection::where('menu_category', $menuCategory)->first();
            if ($menuSelectionCFS) {
                $reservation->chicken_fish_seafood_menu_selection_id = $menuSelectionCFS->id;
            }
        }

        $selectedMenuIdChicken = $request->input('menu_id_cfs');
        $menuCategoryChicken = $request->input('menu_category_cfs');

        if ($menuCategoryChicken === 'chicken') {
            $reservation->chicken_fish_seafood_menu_id = Menu::where('menu_selection_id', 3)->find($selectedMenuIdChicken)->id;
        } elseif ($menuCategoryChicken === 'fish') {
            $reservation->chicken_fish_seafood_menu_id = Menu::where('menu_selection_id', 4)->find($selectedMenuIdChicken)->id;
        } elseif ($menuCategoryChicken === 'seafood') {
            $reservation->chicken_fish_seafood_menu_id = Menu::where('menu_selection_id', 5)->find($selectedMenuIdChicken)->id;
        }

        $selectedMenuIdPasta = $request->input('menu_id_pasta');
        $selectedMenuIdVeg = $request->input('menu_id_veg');
        $selectedMenuIdDrink = $request->input('menu_id_drink');
        $selectedMenuIdDessert = $request->input('menu_id_dessert');

        $reservation->vegetable_menu_id = $selectedMenuIdVeg;
        $reservation->pasta_menu_id = $selectedMenuIdPasta;
        $reservation->dessert_menu_id = $selectedMenuIdDessert;
        $reservation->drink_menu_id = $selectedMenuIdDrink;

        
            $reservation->save();
            return view('user.premade.summary', compact('reservation'));
        } elseif ($termsAndConditions === 'decline') {
            return redirect()->back()->with('error', 'You declined the terms and conditions.');
        }
    
        // Redirect back to the form if the terms and conditions weren't selected
        return redirect()->back()->with('error', 'Please select your decision on the terms and conditions.');
    }

    public function showSummary()
    {
        $categoryName = ServiceSelection::where('services_category', $serviceCategory)->first()->services_category;
        $category = ServiceSelection::where('services_category', $serviceCategory)->firstOrFail(); 
        $promo = ServicePromo::where('id', $servicePromo)->firstOrFail(); 
        
        $user = Auth::user();

        // Retrieve the most recent reservation for the authenticated user
        $reservation = $user->reservations()->latest()->with([
            'porkBeefMenu',
            'chickenFishSeafoodMenu',
            'vegetableMenu',
            'pastaMenu',
            'dessertMenu',
            'drinkMenu'
        ])->first();

        if (!$reservation) {
            return redirect()->route('reservation.index')->with('error', 'Reservation not found.');
        }

        return view('summary', compact('reservation'));
    }

}
