@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <img src="/storage/{{$postInfo->image}}" alt="" class="w-100">
        </div>
        <div class="col-md-4">
            <div class="d-flex align-items-center">
                <div class="p-3">
                    <a href="{{url('/profile/' . $postInfo->user->id)}}"><img src="/storage/{{$postInfo->user->profile->image}}" alt="" class="rounded-circle" style="width:50px;"></a> 
                </div>
                <div>
                    <h5 class="font-weight-bold">
                        <a href="{{url('/profile/' . $postInfo->user->id)}}"><span class="text-dark">{{$postInfo->user->username}}</span></a>
                    </h5>
                </div>
            </div>
            <hr>
            <p><span class="font-weight-bold pr-2"><a href="{{url('/profile/' . $postInfo->user->id)}}"><span class="text-dark">{{$postInfo->user->username}}</span></a></span>{{$postInfo->caption}}</p>
            <small><strong>{{$postInfo->created_at->format('F d, Y - h:i A l')}}</strong></small>
        </div>
    </div>
</div>
@endsection
