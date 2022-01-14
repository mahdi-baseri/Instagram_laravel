<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = \request()->validate([
            'caption' => 'required',
            'img' => ['required','image']
        ]);
        $imgpath = \request('img')->store('uploads' , 'public');
        $img = Image::make(public_path("storage/{$imgpath}"))->fit(1200,1200);
        $img->save();
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'img' => $imgpath,
        ]);
        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(Post $post)
    {
        return view('posts.show' , compact('post'));
    }


}

