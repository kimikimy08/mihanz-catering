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
        $categoryName = ServiceSelection::where('services_category', $serviceCategory)->first()->services_category;
        $category = ServiceSelection::where('services_category', $serviceCategory)->firstOrFail(); 
        $promo = ServicePromo::where('id', $servicePromo)->firstOrFail(); 
        $promos = ServicePromo::whereHas('serviceSelection', function ($query) use ($serviceCategory) {
            $query->where('services_category', $serviceCategory);
        })->get();         


        if ($promo->service_selection_id !== $category->id) {
            abort(404); 
        }



        

        return view('guest.servicePromoPic', compact('promo', 'category', 'categoryName', 'promos'));
    }


    public function adminindex () {
        $services = ServiceSelection::all();
        foreach ($services as $service) {
            $service->services_image = asset("images/services/service_selection/".rawurlencode($service->services_image));
        }
        return view('admin.services.index', compact('services'));
    }

    public function admin_theme_index()
    {
        $themes = ThemeSelection::with('serviceSelection')->get();

        foreach ($themes as $theme) {
            $theme->theme_image = asset("images/themes/" . rawurlencode($theme->theme_image));
        }

        return view('admin.themes.index', compact('themes'));
    }

    public function admin_theme_create()
    {
        $serviceSelections = ServiceSelection::pluck('services_category', 'id');
        return view('admin.themes.create', compact('serviceSelections'));
    }

    public function admin_theme_store(Request $request)
    {
        $request->validate([
            'theme_name' => 'required|unique:theme_selections',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'service_selection_id' => 'required|exists:service_selections,id',
        ]);

        $theme = new ThemeSelection([
            'theme_name' => $request->input('theme_name'),
        ]);
    
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = 'images/themes/';
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path($imagePath), $imageName);

            $theme->theme_image = $imageName;
        }
    
        $theme->serviceSelection()->associate(ServiceSelection::find($request->input('service_selection_id')));
    
        $theme->save();
    
        return redirect()->route('admin.themes.index')->with('success', 'Theme added successfully.');
    }
    




    public function admin_theme_edit($id)
    {
        $theme = ThemeSelection::findOrFail($id);
        $serviceSelections = ServiceSelection::pluck('services_category', 'id');
        $theme->theme_image = asset("images/themes/" . rawurlencode($theme->theme_image));
        return view('admin.themes.edit', compact('theme', 'serviceSelections'));
    }

    public function admin_theme_update(Request $request, $id)
    {
        $request->validate([
            'theme_name' => 'required|unique:theme_selections,theme_name,' . $id,
            'service_selection_id' => 'required|exists:service_selections,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $theme = ThemeSelection::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = 'images/themes/';
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path($imagePath), $imageName);

            $theme->theme_image = $imageName;
        }

 
        $theme->theme_name = $request->input('theme_name');
        $theme->serviceSelection()->associate(ServiceSelection::find($request->input('service_selection_id')));

  
        $theme->save();

        return redirect()->route('admin.themes.index')->with('success', 'Theme updated successfully.');
    }


    public function admin_theme_destroy($id)
    {
        $theme = ThemeSelection::find($id);

        if (!$theme) {
            return redirect()->route('admin.themes.index')->with('error', 'Theme not found.');
        }
        
        $theme->delete();

        return redirect()->route('admin.themes.index')->with('success', 'Theme deleted successfully.');
    }




    public function admincreate()
    {
        return view('admin.services.create');
    }

    public function adminstore(Request $request)
    {
        $request->validate([
            'services_category' => 'required|string|unique:service_selections',
            'services_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/services/service_selection'), $imagePath);
        }


        ServiceSelection::create([
            'services_category' => $request->input('services_category'),
            'services_image' => $imagePath,
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Service added successfully.');
    }


    public function adminedit($id)
    {
        $service = ServiceSelection::findOrFail($id);
        $service->services_image = asset("images/services/service_selection/" . rawurlencode($service->services_image));
        return view('admin.services.edit', compact('service'));
    }

    public function adminupdate(Request $request, $id)
    {
        $request->validate([
            'services_category' => 'required|string|unique:service_selections,services_category,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $service = ServiceSelection::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = 'images/services/service_selection/';
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path($imagePath), $imageName);

            $service->services_image = $imageName;
        }

 
        $service->services_category = $request->input('services_category');

  
        $service->save();

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }



    public function adminview($id)
    {

        $service = ServiceSelection::findOrFail($id);
 
        $packages = ServicePromo::where('service_selection_id', $service->id)->get();

        foreach ($packages as $package) {
            $package->service_promo_image = asset("images/services/packages/".rawurlencode($package->service_promo_image));
        }
    
        return view('admin.services.view', compact('service', 'packages'));
    }

    public function admindestroy($id)
    {
        $service = ServiceSelection::find($id);

        if (!$service) {
            return redirect()->route('admin.services.index')->with('error', 'Service not found.');
        }

        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }

    public function pckgcreate($id)
    {

        $serviceSelection = ServiceSelection::findOrFail($id);

        return view('admin.packages.create', ['serviceSelection' => $serviceSelection]);
    }

    public function pckgstore(Request $request, $id)
    {

        $service = ServiceSelection::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'service_promo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 

        ]);

        // Create a new service promo
        $servicePromo = new ServicePromo();
        $servicePromo->name = $validatedData['name'];
        $servicePromo->description = $validatedData['description'];
        $servicePromo->service_selection_id = $id; 

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = 'images/services/packages/';
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path($imagePath), $imageName);

            $servicePromo->service_promo_image = $imageName;
        }

        $servicePromo->save();

        return redirect()->route('admin.services.view', ['id' => $servicePromo->service_selection_id]);

    }

    public function pckgedit($serviceId, $packageId)
    {
        $servicePromo = ServicePromo::findOrFail($packageId);
        $servicePromo->service_promo_image = asset("images/services/packages/" . rawurlencode($servicePromo->service_promo_image));

        return view('admin.packages.edit', ['servicePromo' => $servicePromo]);
    }

    public function pckgupdate(Request $request, $serviceId, $packageId)
    {
        $service = ServiceSelection::findOrFail($serviceId);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'service_promo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Load the service promo for updating
        $servicePromo = ServicePromo::findOrFail($packageId);
        $servicePromo->name = $validatedData['name'];
        $servicePromo->description = $validatedData['description'];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = 'images/services/packages/';
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path($imagePath), $imageName);

            $servicePromo->service_promo_image = $imageName;
        }

        $servicePromo->save();

        return redirect()->route('admin.services.view', ['id' => $servicePromo->service_selection_id]);


    }

    public function pckgdestroy($id, $p_id)
    {
        $package = ServicePromo::find($p_id);

        if (!$package) {
            // Handle case where the package doesn't exist.
            return redirect()->back()->with('error', 'Package not found.');
        }

        $package->delete();

        // Redirect to the desired page with a success message.
        return redirect()->route('admin.services.view', ['id' => $id])
            ->with('success', 'Package deleted successfully.');
    }

    private function storeUniqueThemesPic($file, $userId)
    {
        $uniqueFilename = 'themes_' . time() . '.' . $file->getClientOriginalExtension();

        $file->storeAs('public/images/themes', $uniqueFilename);

        return 'themes/' . $uniqueFilename;
    }
}
