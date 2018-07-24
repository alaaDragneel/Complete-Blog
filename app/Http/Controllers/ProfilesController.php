<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function index()
    {
        return view('admin.users.profile', ['user' => auth()->user()]);
    }

    public function update(Request $request)
    {
        request()->validate([
            'name'      => 'required',
            'email'     => ['required', 'email', Rule::unique('users', 'email')->ignore(auth()->id())],
            'facebook'  => 'sometimes|nullable|url',
            'youtube'   => 'sometimes|nullable|url',
            'avatar'    => 'sometimes|nullable|image',
        ]);

        $userDataSnippet = ['name', 'email', 'password'];
        
        $updatedData = request(['name', 'email', 'facebook', 'youtube', 'about']);
            
        if (request()->has('password') && !! request('password')) {
            $updatedData['password'] = bcrypt(request('password'));
        }

        if (request()->hasFile('avatar')) {
            $this->deleteOldImage(auth()->user(), request());

            $updatedData['avatar'] = request()->file('avatar')->store('avatars', 'public');
        }

        $userData = array_only($updatedData, $userDataSnippet);

        $userProfileData = array_except($updatedData, $userDataSnippet);

        auth()->user()->update($userData);

        auth()->user()->profile()->update($userProfileData);

        flash('Profile Updated Successfully')->success()->important();

        return redirect()->route('admin.users.profile');
    }

    protected function deleteOldImage($user, $request)
    {
        $imagePath = public_path(str_after($user->profile->avatar, $request->server('HTTP_ORIGIN')));
        
        $fileExits = File::exists($imagePath);
        $isValidFile = File::isFile($imagePath);
        
        if ($fileExits && $isValidFile) {
            File::delete($imagePath);
        }
    }
}
