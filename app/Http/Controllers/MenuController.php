<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuSelection;

class MenuController extends Controller
{
    public function index()
    {
        $menuItems = MenuSelection::all();
        foreach ($menuItems as $menuItem) {
            $menuItem->menu_image = asset("images/menu/menu_selection/".rawurlencode($menuItem->menu_image));
        }
        return view('guest.menu', compact('menuItems'));
    }
}
