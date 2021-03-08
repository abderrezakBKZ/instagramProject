@extends('layouts.app')

    @section('content')
<div class="container">

    <div class="row">
        <div class="col-8 offset-2">
        <h2>Add new post</h2>
        </div>
    </div>
    <form action="/p" enctype="multipart/form-data" method="post">
    
    @csrf
    
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label "><h4>Post Caption</h4></label>
                    <input id="caption" name="caption" type="text" class="form-control @error('Caption') is-invalid @enderror"  value="{{ old('Caption') }}"  autocomplete="Caption" autofocus>

                    @error('caption')
                
                    <strong>{{ $message }}</strong>
                
                    @enderror
                
                

                <input type="file" class="form-control-file pt-5" id="image" name="image" accept="image/x-png,image/jpeg">

                @error('image')
                    
                        <strong>{{ $message }}</strong>
                   
                @enderror
                
            </div>                      
        </div>
        
 

</div>
            <div class="row">
                <div class="col-8 offset-2">
                    <button class="btn btn-primary pl-10" type="submit" >Upload</button>
                </div>
            </div>
    
</form>
 
@endsection
