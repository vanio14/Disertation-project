<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }
    public function index()
    {                                                             //also we we perform oe query to pull in all the data we need and we mapped it for a single of these
        $posts= Post::latest()->with(['user', 'likes'])->paginate(3);      //sorts out all to look good the posts with a pages of all the posts

        
        //$posts= Post::get();         //it will return all the posts in natural order

        return view('posts.index', [
            'posts'=> $posts   //we want all the posts from our application to be send down to the post.index view
        ]);
    }

    public function show(Post $post)          
    {
        return view('posts.show',[
            'post'=>$post
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->posts()->create([
            'body'=> $request->body
        ]); 

        return back();
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }
}
