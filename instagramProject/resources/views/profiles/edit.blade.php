@extends('layouts.app')

@section('content')
<div class="container">

<div class="row">
    <div class="col-8 offset-2">
    <h2>Edit Profile</h2>
    </div>
</div>
<form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">

    @csrf


    <div class="row">
        <div class="col-8 offset-2">
            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label "><h4>Title</h4></label>
                <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror"  value="{{ old('name') ?? $user->profile->title }}"  autocomplete="title" autofocus>

                @error('title')
            
                <strong>{{ $message }}</strong>
            
                @enderror 
         </div>                      
        </div>
    </div>
        
    <div class="row">
        <div class="col-8 offset-2">
            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label "><h4>description</h4></label>
                <input id="description" name="description" type="text" class="form-control @error('description') is-invalid @enderror"  value="{{ old('description') ?? $user->profile->description }}"  autocomplete="descrption" autofocus>

                @error('description')
            
                <strong>{{ $message }}</strong>
            
                @enderror
                    
            </div>                      
        </div>
    </div>
        


    <div class="row">
        <div class="col-8 offset-2">
            <div class="form-group row">
                <label for="url" class="col-md-4 col-form-label "><h4>URL</h4></label>
                <input id="url" name="url" type="text" class="form-control @error('url') is-invalid @enderror"  value="{{ old('url') ?? $user->profile->url }}"  autocomplete="url" autofocus>

                @error('url')
            
                <strong>{{ $message }}</strong>
            
                @enderror
                    
            </div>                      
        </div>
    </div>    
    
    <div class="row">
        <div class="col-8 offset-2">
            <div class="form-group row">
                <label for="url" class="col-md-4 col-form-label "><h4>Profile Picture</h4></label>
                    <input type="file" class="form-control-file pb-5 " id="image" name="image" accept="image/x-png,image/jpeg">

                        @error('image')
                            
                                <strong>{{ $message }}</strong>
                        
                        @enderror
                             
            </div>                      
        </div>
    </div>    

        <div class="row">
            <div class="col-8 offset-2">
                <button class="btn btn-primary pl-10 " type="submit" >Upload</button>
            </div>
        </div>

</form>
    
 
@endsection
