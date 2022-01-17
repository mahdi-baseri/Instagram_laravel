@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4" style="text-shadow: 3px 3px 8px #ffcdcd">Latest Posts</h1>
        <div class="row">
        @foreach($posts as $post)
            <div class="col-md-6">
                <div class="">
                    <div class="d-flex align-items-center mb-2 border-bottom pb-2">
                        <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle w-100" alt="logo" style="max-width: 50px">
                        <h4 class="mx-2"><a class="text-black" style="text-decoration: none" href="profile/{{$post->user->id}}">{{$post->user->username}}</a></h4>
                    </div>
                    <img src="/storage/{{$post->img}}" class="img-fluid rounded-3 shadow border" alt="">
                    <p>{{$post->caption}}</p>
                </div>
            </div>
        @endforeach
        </div>


            <div class="d-flex justify-content-center">
                {{$posts->links("pagination::bootstrap-4")}}
            </div>

    </div>
@endsection
