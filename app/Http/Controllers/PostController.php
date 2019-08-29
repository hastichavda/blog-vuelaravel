<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.adminhome',compact('posts'));
       
    }
    
    public function getPosts()
    {
        $posts = Post::all();
        return view('admin.showallpost', compact('posts'));
    }

  
    public function create()
    {
     
    }

  
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required|min:500'
        ]);
        $PostData= new Post;
        $PostData->title = $request->title;
        $PostData->description = $request->description;
        $PostData->category_id = $request->category_id;
        $PostData->save();
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

        return view('admin.edit', compact('post'));
    }


    public function update(Request $request, $id)
    {
        $PostData = Post::find($id);
        $PostData->title = $request->title;
        $PostData->description = $request->description;
        $PostData->update();

        return response()->json([
            'PostData' => $PostData
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
}
