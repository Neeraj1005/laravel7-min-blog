<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;
use App\Photo;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostEditRequest;

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
        $posts = Post::with('photo')->latest()->get();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {

        return view('admin.posts.create',[

            'category' => Category::all(),
            'tags' => Tag::all(),
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request, Post $post)
    {

        // dd($request->validated());

        $input = $request->validated();

        if($request->hasFile('photo_id')){

            $originalname = $request->photo_id->getClientOriginalName();

            $extension = $request->photo_id->extension();

            $uploadpath = $request->photo_id->storeAs('media', $originalname, 'public');//filepath=>media/filename.png

            $photo = Photo::create(['file'=> $originalname]);

            $input['photo_id'] = $photo->id;

        }

        $post = auth()->user()->posts()->create($input);

        $post->tags()->attach(request('tags'));//for store the tags

        return redirect(route('posts.index'))->with('message','Posts created succesfully');
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
        $post->load('tags');
        $category = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit',compact('post','category','tags'));
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

        if($request->hasFile('photo_id')){

            $originalname = $request->photo_id->getClientOriginalName();

            $extension = $request->photo_id->extension();

            $uploadpath = $request->photo_id->storeAs('media', $originalname, 'public');//filepath=>media/filename.png

            $photo = Photo::create(['file'=> $originalname]);

            $input['photo_id'] = $photo->id;

        }

        // $input['user_id'] = Auth::user()->id;

        $post->update($input);

        $post->tags()->sync(request('tags'));

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
