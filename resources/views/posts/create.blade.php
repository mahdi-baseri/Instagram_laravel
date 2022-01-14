@extends('layouts.app')

@section('content')
    <div class="container">

        <h3 class="text-center mb-3">Add new post</h3>
        <form action="/p" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row mb-3">
                <label for="caption" class="col-md-4 col-form-label text-md-end">Post caption</label>

                <div class="col-md-6">
                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" autocomplete="caption" autofocus>

                    @error('caption')
                    <span class="invalid-feedback" role="alert" dir="rtl">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="img" class="col-form-label"></label>
                <input type="file" class="form-control" name="img" id="img">

                @error('img')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>

            <button class="btn btn-primary col-md-2 offset-6">Add</button>
        </form>
    </div>
@endsection
