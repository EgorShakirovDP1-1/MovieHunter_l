<?php

namespace App\Http\Controllers;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // public function showProfile()
    // {
    //     return Inertia::render('Profile');
    // }


    // public function updateProfile(UserUpdateRequest $request)
    // {
    //     $user = User::find(auth()->user()->id);
    //     $user->name = $request->name;
    //     $user->phone_number = $request->phone_number;
    //     $user->email = $request->email;
    //     $user->password = Hash::make($request->password);
    //     if ($request->hasFile('profile_picture')) {
    //         $path = $request->file('profile_picture')->store('profile_pictures');
    //         $user->profile_picture = $path;
    //     }
    //     $user->save();
    //     return redirect()->route('profile')->with('message', 'Profile updated successfully!');
    // }


    // public function deleteProfile()
    // {
    //     $user = User::find(auth()->user()->id);
    //     Storage::delete($user->profile_picture);
    //     $user->delete();
    //     return redirect()->route('home')->with('message', 'Profile deleted successfully!');
    // }


    public function showUser($id)
    {
        if (!$user) {
            return redirect()->route('users.index')->with('error', 'user not found');
            
        }
        $user = User::find($id);
        return Inertia::render('User', ['user' => $user]);
    }
    public function updateUser(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures');
            $user->profile_picture = $path;
        }
        $user->save();
        return redirect()->route('users')->with('message', 'User updated successfully!');
    }
    public function deleteUser($id)
    {
        $user = User::find($id);
        Storage::delete($user->profile_picture);
        $user->delete();
        return redirect()->route('users')->with('message', 'User deleted successfully!');
    }
    public function logout(){
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('home')->with('message', 'Loged Out successfully!');
    }

    
}
