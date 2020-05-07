<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostEditRequest;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::has('tags')->get();
        $posts = Post::latest()->get();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        $category = Category::all();
        return view('admin.posts.create',compact('post','category'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request, Post $post)
    {

        $input = $request->validated();

        if($file = $request->file('photo_id')){


            $name = time() . $file->getClientOriginalName();


            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);


            $input['photo_id'] = $photo->id;

        }

        auth()->user()->posts()->create($input);

        return redirect(route('posts.index'))->with('message','Posts created succesfully');

        // dd(Auth::user());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.view',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // dd($post->category->name);
        $category = Category::all();
        return view('admin.posts.edit',compact('post','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostEditRequest $request, Post $post)
    {
        // dd($request->validated());
        $input = $request->validated(); //request->all() dangerous for security reason

        if($file = $request->file('photo_id')){


            $name = time() . $file->getClientOriginalName();


            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);


            $input['photo_id'] = $photo->id;

        }
        // $input['user_id'] = Auth::user()->id;

        $post->update($input);

        return redirect(route('posts.index'))->with('message','Posts created succesfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // dd($post->category()->count());
        $post->delete();
        return redirect()->back()->with('message','deleted successfully');
    }
}
