<?php

namespace App\Http\Controllers;

use App\User;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index($user)
    {
        $user = User::findOrfail($user);

        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        return view('profiles.index', compact('follows', 'user'));

    }

    public function edit($id)
    {
        $userProf = User::findOrfail($id);
        $this->authorize('update', $userProf->profile);
        return view('profiles.edit', compact('userProf'));
    }

    public function update($id)
    {
        $user = User::findOrfail($id);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => '',
            'url' => 'url',
        ]);

        if (request('image')) {
            $imagepath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagepath}"))->resize(1000, 1000);
            $image->save();
            $imageArray = ['image' => $imagepath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/" . $user->id)->with('success', 'Profile Updated Successfully');
    }
}