<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\QuestionForm;
use App\User;
use App\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $pets = Pet::all();
        $doctors = User::where('role', '=', 'doctor')->get();
        $formsQuestion = QuestionForm::all();

        return view('posts.index', [
            'posts' => $posts,
            'pets' => $pets,
            'doctors' => $doctors,
            'formsQuestion' => $formsQuestion,

        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
//        $request->validate([
//
//        ]);
//        $post = new Post();
//        $post->user_id = Auth::id();
//        $post->request_ans_user_id = $request->input('chooseDoc');
//        $post->question = $request->input('title');
//        $post->detail = $request->input('detail');

    }

    public function commentStore(Request $request, $post_id){
        $use_post_id = Post::findOrFail($post_id);
        $use_user_id = Auth::id();

        $request->validate([
            'answer' => ['required', 'min:1']
        ]);

        $comment = new Comment;
        $comment->post_id = $use_post_id->id;
        $comment->user_id = $use_user_id;
        $comment->comment = $request->input('answer');
        $comment->save();

        return redirect()->route('post.show', ['post' => $use_post_id->id]);
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);
    }

    public function edit($id)
    {
        return view('posts.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
