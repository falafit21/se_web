<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Form;
use App\PetTip;
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
        $posts = Post::orderBy('id', 'desc')->get();
        $petTips = PetTip::all();
        $pets = Pet::where('user_id', '=', Auth::id())->get();
        $doctors = User::where('role', '=', 'doctor')->get();
        $formsQuestion = QuestionForm::all();
        $user = Auth::user();

        return view('posts.index', [
            'posts' => $posts,
            'pets' => $pets,
            'doctors' => $doctors,
            'formsQuestion' => $formsQuestion,
            'user'=>$user,
            'petTips'=>$petTips
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'chooseDoc' => ['required'],
            'title' => ['required'],
            'detail' => ['required'],
            'choosePet' => ['required'],
        ]);
        $post = new Post();
        $post->user_id = Auth::id();
        $post->request_ans_user_id = $request->input('chooseDoc');
        $post->question = $request->input('title');
        $post->detail = $request->input('detail');
        $post->pet_id = $request->input('choosePet');

        if($post->save()){
            $recentPost_id = $post->latest()->first()->id;

            $form = new Form();
            $form->post_id = $recentPost_id;
            $form->question_form_id = 1;
            $form->answer = $request->input('yes1');
            $form->save();
        }

        return redirect()->route('post.index');
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
        $post = Post::findOrFail($id);
        $post->question = $request->input('question');
        $post->detail = $request->input('detail');
        $post->save();
        return redirect()->route('post.show',['post'=>$post]);
    }

    public function destroy($id)
    {
        $petTips = PetTip::findOrFail($id);
        $petTips = delete();
        return redirect()->route('posts.createTip',['petTips'=>$petTips->id]);


    }
}
