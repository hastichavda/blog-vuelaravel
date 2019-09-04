<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('categories')->get();
        return view('admin.adminhome',compact('posts','categories'));
    }

    public function create()
    {
     
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);
        $PostData= new Post;
        $PostData->title = $request->title;
        $PostData->description = $request->description;
        $PostData->save();
        $PostData->categories()->attach($request->categories);
        $PostData->categories;
        return response()->json([
            'PostData' => $PostData
        ]);
    }

    public function show(Post $post)
    {
        //
    }

   
    public function edit($id)
    {
        $post = Post::with('categories')->findOrFail($id);
        // $category = Category::find($id);
        return view('admin.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $PostData = Post::with('categories')->findOrFail($id);
        $PostData->title = $request->title;
        $PostData->description = $request->description;
        $PostData->save();
        $PostData->categories()->sync($request->categories);
        return response()->json([
            'PostData' => $PostData,
        ]); 
    }

    public function destroy($id)
    {
        $PostData = Post::findOrFail($id);
        $PostData->delete();
        return response()->json([
            'status' => 'Deleted'
        ]);
    }
     
    public function getPosts()
    {   
        $posts= Post::all();
        $categories= Category::all();
        $posts = Post::orderBy('id','DESC')->get();
        return view('welcome', compact('posts', 'categories'));
    }

    public function filterPosts($id) {
        $category = Category::find($id);
        $posts = $category->posts;
        return view('admin.showPost',compact('posts','category'));
    }
 
    public function readMore($id)
    {
        $posts = Post::where('id',$id)->get();
        return view('admin.displayPost', compact('posts'));
    }
}
