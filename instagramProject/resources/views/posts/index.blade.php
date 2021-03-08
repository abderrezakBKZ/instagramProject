
@extends('layouts.app')

@section('content')
    <div class="container pl-4 d-flex justify-content-md-between">
        <a href="/profile/{{auth()->user()->id}}">Go to my profile</a>
        <a href="/profile/users">Present on this App</a>
    </div>

<div class="container">
   @foreach($posts as $post)
        <div class="row">
            <div class="col-6 offset-3">
               <a href="/profile/{{$post->user->id}}">
                   <img src="/storage/{{$post->image}}"  alt="" class="w-100">
               </a>
            </div>
        </div>

        <div class="row pt-2 pb-4">
            <div class="col-6 offset-3">
               <div>
                   <p>
                       <span class="font-weight-bold">
                           <a href="/profile/{{$post->user->id}}">
                               <span class="text-dark"> {{$post->user->name}}</span>
                           </a>
                       </span> {{$post->caption}}
                   </p>
               </div>
            </div>

        </div>

    @endforeach



</div>


@endsection
