<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $postsInfo = Post::whereIn('user_id', $users)->latest()->simplePaginate(3);

        return view('posts.index', compact('postsInfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $post = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);
        $imagepath = request('image')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagepath}"))->resize(1500, 1000);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $post['caption'],
            'image' => $imagepath,
        ]);

        return redirect('/profile/' . auth()->user()->id)->with('success', 'New Post Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postInfo = Post::findOrfail($id);
        return view('posts.show', compact('postInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $pid)
    {
        $delete = Post::findOrfail($pid->postId);
        dd($delete);
        $delete->delete();
        return redirect()->route('posts.settings')->with('success', 'Post Deleted Successfully');
    }

    public function settings()
    {
        $user = User::findOrfail(auth()->user()->id);
        return view('posts.settings', compact('user'));
    }
}