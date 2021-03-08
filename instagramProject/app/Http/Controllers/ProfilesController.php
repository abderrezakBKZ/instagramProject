<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Imagick;
use Intervention\Image\ImageManagerStatic as Image;
Image::configure(array('driver' => 'imagick'));

class ProfilesController extends Controller
{
    public function index( $user)
    {
        $user = User::findOrFail($user);
        $follows = (auth()->user())? auth()->user()->following->contains($user->id) :false ;
//        dd($follows);
//        return view('profiles.index', ['user' => $user, ]);
        return view ('profiles.index',compact('user','follows'));
    }

    public function edit (User  $user)
    {

        $this->authorize('update', $user->profile);


        return view('profiles.edit', compact('user'));
    }

     public function update (User $user)
    {
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            'title'=> 'required',
            'description'=> 'required',
            'url'=> 'url',
            'image' => '',
        ]);

        if (request('image')) {
            $imagepath = request('image')->store('profile','public');
            $image = image::make(public_path("storage/{$imagepath}"))->fit(1000,1000);
            $image->save();


//            $data['image']= $imagepath;

//            $imagepath = request('image')->store('profile','public');
//
//            $image = image::make(public_path("profile/{$imagepath}"))->fit(1000,1000) ;
//            $image->save();



        }



            $user->profile->update(array_merge(
                $data,
                ['image'=>$imagepath]
            ));

            return redirect("/profile/{$user->id}");

    }
}
