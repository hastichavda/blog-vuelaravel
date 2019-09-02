<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->get();
        return view('admin.adminhome',compact('posts'));
    }

    public function create()
    {
     
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required|min:2'
        ]);
        $PostData= new Post;
        $PostData->title = $request->title;
        $PostData->description = $request->description;
        $PostData->category_id = $request->category_id;
        $PostData->save();
        $PostData->category;
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
        $post = Post::find($id);
        $category = Category::find($id);
        return view('admin.edit', compact('post','category'));
    }

    public function update(Request $request, $id)
    {
        $PostData = Post::find($id);
        $category = Category::find($id);
        $PostData->title = $request->title;
        $PostData->description = $request->description;
        $PostData->category_id = $request->category_id;
        $PostData->update();
        return response()->json([
            'PostData' => $PostData,
            'category'=> $category
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
        $posts = Post::with('category')->where('category_id', $id)->get();
        return view('admin.showPost',compact('posts'));
    }
 
    public function readMore($id)
    {
        $posts = Post::where('id',$id)->get();
        return view('admin.displayPost', compact('posts'));
    }
}
