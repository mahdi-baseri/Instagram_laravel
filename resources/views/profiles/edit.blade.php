@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
            @method('PATCH')
            @csrf
            <div class="row mb-3">
                <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title}}" autocomplete="title" autofocus>

                    @error('title')
                    <span class="invalid-feedback" role="alert" dir="rtl">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-md-4 col-form-label text-md-end">Description</label>

                <div class="col-md-6">
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->profile->description }}" autocomplete="description" autofocus>

                    @error('description')
                    <span class="invalid-feedback" role="alert" dir="rtl">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="url" class="col-md-4 col-form-label text-md-end">URL</label>

                <div class="col-md-6">
                    <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url}}" autocomplete="url" autofocus>

                    @error('url')
                    <span class="invalid-feedback" role="alert" dir="rtl">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="img" class="col-form-label  col-md-4">Profile image</label>
                <div class="col-md-6">
                    <input type="file" class="form-control" name="img" id="img">

                    @error('img')
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror

                </div>
            </div>

            <button class="btn btn-primary col-md-2 offset-6">Save</button>
        </form>
    </div>
@endsection
