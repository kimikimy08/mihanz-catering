<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        return view('user.dashboard'); 
    }
    
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'email' => 'required|string|email|max:255',
            'profile_pic' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $user = User::findOrFail($id);
    
        $user->name = $request->input('name');
        $user->address = $request->input('address');
        $user->contact_number = $request->input('contact_number');
        $user->email = $request->input('email');
    
        if ($request->hasFile('profile_pic')) {
            $profilePicPath = $this->storeUniqueProfilePic($request->file('profile_pic'), $user->id);
            $user->profile_pic = $profilePicPath;
            $user->save();
        }
    
        $user->save();

        return redirect()->route('user.show', $id)->with('success', 'Profile updated successfully');
    }

    private function storeUniqueProfilePic($file, $userId)
    {
        $uniqueFilename = 'profile_pic_' . $userId . '_' . time() . '.' . $file->getClientOriginalExtension();

        $file->storeAs('public/profile_pics', $uniqueFilename);

        return 'profile_pics/' . $uniqueFilename;
    }

    public function usermanagement()
    {
        $usersItems = User::all();
        foreach ($usersItems as $usersItem) {
            $usersItem->profile_pic = asset("storage/".rawurlencode($usersItem->profile_pic));
        }
        return view('admin.users.index', compact('usersItems'));
    }

    public function usermanagement_show(User $user)
    {
        $user = User::all();
        foreach ($user as $user) {
            $user->profile_pic = asset("storage/".rawurlencode($user->profile_pic));
        }
        return view('admin.users.view', compact('user'));
    }

    public function usermanagement_edit(User $user)
    {
        $user = User::all();
        foreach ($user as $user) {
            $user->profile_pic = asset("storage/".rawurlencode($user->profile_pic));
        }

        return view('admin.users.edit', compact('user'));
    }

    public function usermanagement_update(Request $request, User $user)
    
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'profile_pic' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($request->hasFile('profile_pic')) {
            $profilePicPath = $this->storeUniqueProfilePic($request->file('profile_pic'), $user->id);
            $user->profile_pic = $profilePicPath;
        }



        $user->update($data);

        return redirect()->route('admin.users.view', $user->id)->with('success', 'User details updated successfully.');
    }



        public function usermanagement_destroy(User $user)
        {

            $user->delete();

            return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
        }
    }
