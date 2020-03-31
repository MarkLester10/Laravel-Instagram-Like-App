@extends('layouts.app')

@section('content')
<div class="container">
   @foreach ($postsInfo as $postInfo)
   <div class="row">
    <div class="col-md-6 offset-3">
        <div class="d-flex align-items-center">
            <div class="pr-2 pl-2 pb-1">
                <a href="{{url('/profile/' . $postInfo->user->id)}}"><img src="/storage/{{$postInfo->user->profile->image}}" alt="" class="rounded-circle" style="width:35px;"></a> 
            </div>
            <div>
                 <a href="{{url('/profile/' . $postInfo->user->id)}}"><span class="text-dark font-weight-bold" style="font-size: 14px;">{{$postInfo->user->username}}</span></a>
            </div>
            <div class="ml-auto">
                <small>{{$postInfo->created_at->format('F d, Y - h:i A D')}}</small>
            </div>
        </div>
        <a href="{{route('posts.show',$postInfo->id)}}"><img src="/storage/{{$postInfo->image}}" alt="" class="w-100"></a>
    </div>
    </div>

    <div class="row pt-2 mb-3">
        <div class="col-md-6 offset-3">
            <p class="ml-3"><span class="font-weight-bold pr-2"><a href="{{url('/profile/' . $postInfo->user->id)}}"><span class="text-dark">{{$postInfo->user->username}}</span></a></span>{{$postInfo->caption}}</p>
            <hr>
        </div>
    </div>
   @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{$postsInfo->links()}}
        </div>
    </div>
</div>
@endsection
