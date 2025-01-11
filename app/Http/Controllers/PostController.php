<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function ourfilestore(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'age'     => 'required|integer|min:0',
            'address' => 'required|string|max:255',
            'disease' => 'required|string|max:255',
            'image'   => 'nullable|mimes:jpeg,png,jpg|max:2048', // Optional image upload
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $post = new Post();
        $post->name    = $request->name;
        $post->age     = $request->age;
        $post->address = $request->address;
        $post->disease = $request->disease;
        $post->image   = $imageName;
        $post->save();

        return redirect()->route('home')->with('success', 'Patient information has been submitted successfully.');
    }

    public function editData($id)
    {
        $post = Post::findOrFail($id);
        return view('edit', ['ourPost' => $post]);
    }

    public function updateData($id, Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'age'     => 'required|integer|min:0',
            'address' => 'required|string|max:255',
            'disease' => 'required|string|max:255',
            'image'   => 'nullable|mimes:jpeg,png,jpg|max:2048', // Optional image upload
        ]);

        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('home')->with('error', 'Post not found.');
        }

        // Update post properties
        $post->name    = $request->name;
        $post->age     = $request->age;
        $post->address = $request->address;
        $post->disease = $request->disease;

        // Handle image upload if it exists
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }

        $post->save();

        return redirect()->route('home')->with('success', 'Patient information has been updated successfully.');
    }

    public function deleteData($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('home')->with('success', 'Patient information has been deleted successfully.');
    }
}
