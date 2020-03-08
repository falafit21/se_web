<?php

namespace App\Http\Controllers;

use App\Post;
use App\QuestionForm;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $formsQuestion = QuestionForm::all();
        return view('posts.index', [
            'posts' => $posts,
            'formsQuestion' => $formsQuestion
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
