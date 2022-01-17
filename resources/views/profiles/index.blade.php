@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100" alt="logo" style="max-width: 200px">
        </div>
        <div class="col-9">
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-md-center">
                    <h1>{{ $user->username }}</h1>
                    <div class="mx-4"><follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button></div>
                </div>
                @can('update' , $user->profile)
                    <a href="/p/create" style="text-decoration: none">Add new post</a>
                @endcan
            </div>
            @can('update' , $user->profile)
                <a href="/profile/{{$user->id}}/edit" style="text-decoration: none">Edit profile</a>
            @endcan
            <div class="d-flex">
                <div class="p-3"><strong>{{$user->posts->count()}}</strong> posts</div>
                <div class="p-3"><strong>{{$user->profile->followers->count()}}</strong> followers</div>
                <div class="p-3"><strong>{{$user->following->count()}}</strong> following</div>
            </div>
            <div>{{ $user->profile->title }}</div>
            <div>{{$user->profile->description}}</div>
            <div><a href="{{$user->profile->url}}" target="_blank">{{$user->profile->url}}</a></div>
        </div>
    </div>
    <div class="row pt-5" dir="rtl">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{$post->id}}">
                    <img src="/storage/{{$post->img}}" class="w-100" alt="">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
