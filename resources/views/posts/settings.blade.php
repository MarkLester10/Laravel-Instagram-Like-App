@extends('layouts.app')



@section('content')
<div class="container">
    @if (session('success'))
    <div class="row">
        <div class="col-6 offset-3 text-center">
            <div class="alert alert-success fade show">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
                {{session('success')}}
            </div>
        </div> 
    </div>
    @endif
    <div class="row">
        @if (count($user->posts) > 0)
        @foreach ($user->posts as $post)
        <div class="col-md-3 p-2">
            <div class="card w-100 m-auto h-100" >
                <img class="card-img-top img-fluid" src="/storage/{{$post->image}}" alt="">
                <div class="card-body">
                    <a href="#" class="btn btn-outline-success btn-sm">Edit</a>
                    <a href="#" data-id="{{$post->id}}" type="button" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm">Delete</a>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>

    @include('modals.delete')
</div>
@endsection