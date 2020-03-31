@extends('layouts.app')

@section('content')

<div class="container">
        <div class="col-8 offset-2">
            <form action="{{route('profile.update', $userProf->id)}}" method="POST" enctype="multipart/form-data" class="p-5 border">
                @csrf
                @method('PATCH')
            <div class="row">
                <a class="btn btn-default btn-sm" href="{{url('/profile/' . auth()->user()->id) }}"><i class="fas fa-long-arrow-alt-left"></i> Go Back</a>
            </div>
            <div class="row">
                <h1>Edit Profile</h1>
            </div>
    
            <div class="form-group row">
                <label for="title">Profile Title</label>
                <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')??$userProf->profile->title}}" autocomplete="title" autofocus>
    
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
            </div>

            <div class="form-group row">
                <label for="description">Tell us a little about yourself</label>
                <textarea id="description" cols="30" rows="5" name="description" class="form-control @error('description') is-invalid @enderror" autocomplete="description" autofocus>{{old('description') ?? $userProf->profile->description}}</textarea>
    
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
            </div>

            <div class="form-group row">
                <label for="url">URL / Website</label>
                <input type="text" id="url" name="url" class="form-control @error('url') is-invalid @enderror" value="{{old('url') ?? $userProf->profile->url}}" autocomplete="url" autofocus>
    
                @error('url')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
            </div>
    
            <div class="form-group row">
                <label for="image">Profile Image</label>
                <input type="file" id="image" name="image" class="form-control-file">
    
                @error('image')
                    <strong style="color:red; font-size:12px;">{{ $message }}</strong>
                 @enderror
            </div>
    
            <div class="row pt-4">
                <button type="submit" class="btn btn-success btn-md">Update Profile</button>
            </div>
        </form>
        </div>
</div>
@endsection
