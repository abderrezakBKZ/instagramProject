@extends('layouts.app')

@section('content')
 <div class="container">
    <div class="row">
        <div class="col-3 p-5">
        <img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100 "
        >
        </div>

        <div class="col-9 pt-5">
        <div class="d-flex justify-content-between  align-items-baseline">

        <div class="d-flex align-items-center pb-3">
                <div class="h4"> <h2>{{$user->name}}</h2> </div>
                <follow-button user-id = " {{$user->id}}"></follow-button>
        </div>
            @can ('update', $user->profile)
            <a href="/p/create"> add a new post</a>
            @endcan
        </div>

           @can ('update', $user->profile)
           <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
           @endcan

        <div class="d-flex">
            <div class="pr-5"><strong>{{$user->posts->count()}} </strong> Posts</div>
            <div class="pr-5"><strong>{{$user->profile->followers->count()}} </strong> Followers</div>
            <div class="pr-5"><strong>{{$user->following->count()}} </strong> Followings</div>
        </div>
        <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
        <div>{{$user->profile->description}} </div>
        <div><a href="#" style="color: black;"> <strong>{{$user->profile->url ?? 'N/A'}}</strong> </a></div>



    </div>

    <div class="row pt-4 pb-4">

            @foreach($user->posts as $post )
            <div class="col-4 pb-4">
                <a href="/p/{{$post->id}}">
                <img src="/storage/{{$post->image }} " class ="w-100"></a>
            </div>
            @endforeach
        </div>
</div>


@endsection
