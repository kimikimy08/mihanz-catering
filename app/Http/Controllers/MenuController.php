<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuSelection;
use App\Models\Menu;

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


    public function menu($category = null)
    {
        $menuCategories = MenuSelection::all();
        $menuItems = [];
    
        if ($category && $category !== 'all') {
            $menuCategory = MenuSelection::where('menu_category', $category)->firstOrFail();

            $menuItems = $menuCategory->menus;
        } else {
         
            $menuCategory = null;
            $menuItems = Menu::all();
            
        }
        foreach ($menuItems as $menuItem) {
            $menuItem->menus_image = asset("images/menu/".rawurlencode($menuItem->menus_image));
        }
    
        return view('admin.menu', compact('menuCategory', 'menuItems', 'menuCategories'));
    }

}
