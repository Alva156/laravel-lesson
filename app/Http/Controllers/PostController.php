<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Carbon;

class PostController extends Controller
{
    //
    public function index(){
        $posts = Post::all();
        
        return view ('posts.post',compact('posts'));
    }
    public function storepost(Request $request){
        $validated = $request->validate([
         
         'title' => 'required|unique:posts',
         'content' => 'required',
        
    
        ],[
             
             'title.required' => 'Please provide a title for this field. It cannot be empty.',
             'title.unique' => 'Title already exists',
             'content.required' => 'Please provide a content for this field. It cannot be empty.',

             
        ]);
     
        Post::insert([
         'title' => $request->title,
         'content' => $request->content,
         'user_id' => Auth::user()->id,
         'created_at' => Carbon::now()
        ]);
     
        return Redirect()->back()->with('success', 'Post created successfully!');
     
     }
}