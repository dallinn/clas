<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Auth;

class PostController extends Controller
{
    public function getIndex()
    {
        // $posts = Post::all();
        $posts = Post::orderBy('id', 'desc')->take(3)->get();
        return view ('pages.welcome', ['posts' => $posts]);
    }

    public function getAll()
    {
        // $posts = Post::all();
        $posts = Post::orderBy('id', 'desc')->paginate(12);
        return view ('pages.all', ['posts' => $posts]);      
    }

    public function getCreate()
    {
        return view ('pages.create');
    }

    public function getMyListings()
    {
        $user_id = Auth::user()->id;        
        $posts = Post::orderBy('id', 'desc')->where('user_id', '=', $user_id)->paginate(5);
        return view ('pages.mylistings', ['posts' => $posts]);    	
    }

    public function getByID($id)
    {
        $post = Post::where('id', $id)->first();
        return view ('pages.byid', ['post' => $post]);      

    }

    public function getByCategory($category)
    {
        $posts = Post::where('category', $category)->paginate(12);
        return view ('pages.category', ['posts' => $posts]);      

    }

    public function edit($id)
    {
        $post = Post::where('id', $id)->first();
        return view ('pages.edit', ['post' => $post]);  

    }

    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)->first();

        $this->validate($request, array(
                'title' => 'required|max:255',
                'category'  => 'required',
                'price' => 'required',
                'body'  => 'required'
        ));

        $post->title = $request->title;
        $post->category = $request->category;
        $post->price = $request->price;
        $post->body = $request->body;

        $post->save();

        return redirect('mylistings');
    }

    public function create(Request $request)
    {   
        $this->validate($request, array(
            'title' => 'required|max:255',
            'category' => 'required',
            'price'  => 'required',
            'body'  => 'required|max:1000'
            ));

        $post = new Post;

        $post->title = $request->title;
        $post->category = $request->category;
        $post->price = $request->price;
        $post->body = $request->body;
        $post->user_id = Auth::user()->id;

        $post->save();

        return redirect('mylistings');
    }

    public function delete($id)
    {
        $post = Post::where('id', $id)->first();
        $post->delete();

        return redirect()->back();
    }
}