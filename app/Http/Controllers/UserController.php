<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use File;

class UserController extends Controller
{
    public function updateUser(Request $request)
    {
        $validated = $request->validate([
            'image'         => 'nullable|image|file|max:5000',
        ]);
        $user = User::findOrFail(auth()->user()->id);
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->birthdate = $request->birthdate;
        $user->brgy = $request->brgy;
        $user->street = $request->street;
        $user->purok = $request->purok;
        $user->email = $request->email;
        if($request->hasFile('image'))
        {
            $location = 'public/users_image/'.$user->image;
            if(File::exists($location))
            {
                File::delete($location);
            }
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->move('public/users_image/',$fileNameToStore);
            $user->image = $fileNameToStore;
        }
        $user->update();
        
        return back()->with('message','User profile updated successfully!');
    }
}
