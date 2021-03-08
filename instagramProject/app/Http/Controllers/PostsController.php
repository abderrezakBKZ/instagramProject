<?php


namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
// import the Intervention Image Manager Class
use Imagick;
use Intervention\Image\ImageManagerStatic as Image;

// configure with favored image driver (gd by default)
Image::configure(array('driver' => 'imagick'));





class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index () {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->get() ;
        return view ('posts.index', compact('posts'));
    }


    public function create () {
        return view('posts.create');
    }

    public function store () {

        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required','image']
            ]);

            $imagepath = request('image')->store('uploads','public');

           $image = image::make(public_path("storage/{$imagepath}"))->fit(1200,1200) ;
            $image->save();



            auth()->user()->posts()->create([
                'caption'=> $data['caption'],
                'image' => $imagepath,
            ]);


            return redirect('/profile/' . auth()->user()->id) ;

    }

    public function show (Post $post) {

        return view ('posts.show',compact('post'));
    }

    public function showUsers () {
        return view('posts.users');
    }

}
