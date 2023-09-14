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
        return view('guest.menus', compact('menuItems'));
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
    
        return view('admin.menu.index', compact('menuCategory', 'menuItems', 'menuCategories'));
    }

    public function menucreate()
    {
        $menuSelections = MenuSelection::pluck('menu_category', 'id');
        return view('admin.menu.create', compact('menuSelections'));
    }

    public function menustore(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:menus',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'menu_selection_id' => 'required|exists:menu_selections,id',
            'description' => 'required|string',
            'price' => 'required|numeric|between:0,9999999999.99',
            'status' => 'required|string',
        ], [
            'menu_selection_id.exists' => 'The selected menu category is invalid.',
        ]);

        $menu = new Menu([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'status' => $request->input('status'),
        ]);
    
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = 'images/menu/';
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path($imagePath), $imageName);

            $menu->menus_image = $imageName;
        }
    
        $menu->menuSelection()->associate(MenuSelection::find($request->input('menu_selection_id')));
    
        $menu->save();
    
        return redirect()->route('admin.menu.index')->with('success', 'Menu added successfully.');
    }

    public function menuview($id)
    {
 
        $menu = Menu::findOrFail($id);
        $menuSelection = MenuSelection::pluck('menu_category', 'id');
        $menu->menus_image = asset("images/menu/" . rawurlencode($menu->menus_image));
        return view('admin.menu.view', compact('menu', 'menuSelection'));

    }
    

    public function menuedit($id)
    {
        $menu = Menu::findOrFail($id);
        $menuSelection = MenuSelection::pluck('menu_category', 'id');
        $menu->menus_image = asset("images/menu/" . rawurlencode($menu->menus_image));
        return view('admin.menu.edit', compact('menu', 'menuSelection'));
    }

    public function menuupdate(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:menus,name,' . $menu->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'menu_selection_id' => 'required|exists:menu_selections,id',
            'description' => 'required|string',
            'price' => 'required|numeric|between:0,9999999999.99',
            'status' => 'required|string',
        ], [
            'menu_selection_id.exists' => 'The selected menu category is invalid.',
        ]);
       

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = 'images/menu/';
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path($imagePath), $imageName);

            $menu->menus_image = $imageName;
        }
 
        $menu->name = $request->input('name');
        $menu->price = $request->input('price');
        $menu->description = $request->input('description');
        $menu->status = $request->input('status');
        $menu->menuSelection()->associate(MenuSelection::find($request->input('menu_selection_id')));

  
        $menu->save();

        return redirect()->route('admin.menu.index')->with('success', 'Menu updated successfully.');
    }


    public function menudestroy($id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return redirect()->route('admin.menu.index')->with('error', 'Menu not found.');
        }
        
        $menu->delete();

        return redirect()->route('admin.menu.index')->with('success', 'Menu deleted successfully.');
    }

    public function specificmenuindex($category = null)
    {
        $categoryName = MenuSelection::where('menu_category', $category)->firstOrFail()->menu_category;
        $menus = Menu::whereHas('menuSelection', function ($query) use ($category) {
            $query->where('menu_category', $category);
        })->get();

        return view('guest.specific_menu', compact('menus', 'categoryName'));
    }

}
