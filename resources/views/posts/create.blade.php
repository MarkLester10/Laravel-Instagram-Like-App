@extends('layouts.app')



@section('content')
<div class="container">
        <div class="col-6 offset-3">
            <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data" class="p-5 border">
                @csrf
            <div class="row">
                <h1>Add New Post</h1>
            </div>
    
    
            <div class="form-group row">
                <label for="caption">Post Caption</label>
                <input type="text" id="caption" name="caption" class="form-control @error('caption') is-invalid @enderror" value="{{old('caption')}}" autocomplete="caption" autofocus>
    
                @error('caption')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
            </div>
    
            <div class="form-group row">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control-file">
    
                @error('image')
                    <strong style="color:red; font-size:12px;">{{ $message }}</strong>
                 @enderror
            </div>
    
            <div class="row pt-4">
                <button type="submit" class="btn btn-success btn-md">Submit</button>
            </div>
        </form>
        </div>
</div>
@endsection
