
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
    @foreach(\App\Models\User::ListOfUsers() as $user)
        <div class="pb-5"><a href="/profile/{{$user->id}}"> <h3>{{$user->name}}</h3></a> <h3>on this app since : {{$user->created_at}}</h3></div>
        <br>

    @endforeach
    </div>
</div>
@endsection
