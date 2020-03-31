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
    <div class="row" >
        <div class="col-3 p-5 d-flex justify-content-center align-items-center">
            <img src="{{$user->profile->profileImage()}}" style="width: 100%;" class="rounded-circle" alt="">
        </div>
        <div class="col-9 p-5">

            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-4">
                    <h1>{{$user->name}}</h1>
                    <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
                </div>  
                @can('update', $user->profile)  
                <a href="{{route('posts.create')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i> Add Post</a>
                @endcan
            </div>


            @can('update', $user->profile)
            <a href="{{route('profile.edit',$user->id)}}"><i class="far fa-edit"></i> Edit profile</a>
            @endcan


            <div class="d-flex pt-3">
                <div class="pr-5"><strong>{{$user->posts->count()}}</strong> Posts</div>
                <div class="pr-5"><strong>{{$user->profile->followers->count()}}</strong> Followers</div>
                <div class="pr-5"><strong>{{$user->following->count()}}</strong> Following</div>
            </div>

        <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
        <div>{{$user->profile->description}}</div>
        <div class="pt-3"><a href="#">{{$user->profile->url}}</a></div>

        </div>
    </div>


    <div class="row">
        @if (count($user->posts) > 0)
        @foreach ($user->posts as $post)
        <div class="col-md-4 p-2">
           <a href="{{route('posts.show',$post->id)}}">
            <img class="w-100" src="/storage/{{$post->image}}" alt=""></a>
        </div>
        @endforeach
        @else
        <div class="col p-2 text-center">
            <i class="fas fa-camera-retro p-4" style="font-size:100px; opacity:.3;"></i>
            <h3>Oh snap! No Posts has been added yet.</h3>
        </div>
        @endif
    </div>


</div>
@endsection
