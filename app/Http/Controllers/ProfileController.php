<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update' , $user->profile);
        return view('profiles.edit' , compact('user'));
    }
    public function update(User $user)
    {
        $this->authorize('update',$user->profile);
        $data = \request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'img' => 'image',
        ]);
        if (\request('img')){
        $imgpath = \request('img')->store('profile' , 'public');
        $img = Image::make(public_path("storage/{$imgpath}"))->fit(1000,1000);
        $img->save();
        $imgarray = ['img' => $imgpath];
        }
        auth()->user()->profile()->update(array_merge(
            $data,
            $imgarray ?? []
        ));
        return redirect('/profile/' . auth()->user()->id);
    }
}
