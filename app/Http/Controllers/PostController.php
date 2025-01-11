<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        return view('create');
    }

    public function ourfilestore(Request $request){
        
        $post = new Post;

        $post->name = $request->name;
        $post->age = $request->age;
        $post->address = $request->address;
        $post->disease = $request->disease;
        $post->image = $request->image;
        $post->save();
        
    }
}
