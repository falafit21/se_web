<?php

namespace App\Http\Controllers;

use App\Comment;
use App\DoctorInfo;
use App\Form;
use App\PetTip;
use App\Post;
use App\PostImage;
use App\QuestionForm;
use App\User;
use App\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
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
            'user' => $user,
            'petTips' => $petTips
        ]);
    }

    public function create()
    {

    }

    public function storeImg(Request $request)
    {
        $request->validate([
            'chooseDoc' => ['required'],
            'title' => ['required'],
            'detail' => ['required'],
            'choosePet' => ['required'],
//            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $post = new Post();
        $post->user_id = Auth::id();
        $post->request_ans_user_id = $request->input('chooseDoc');
        $post->question = $request->input('title');
        $post->detail = $request->input('detail');
        $post->pet_id = $request->input('choosePet');
        $recentPost_id = 0;
        if ($post->save()) {
            $recentPost_id = $post->latest()->first()->id;
            $questionCount = DB::table('question_forms')->max('id');
            foreach (range(1, $questionCount) as $questionOrder) {
                $form = new Form();
                $form->post_id = $recentPost_id;
                $form->question_form_id = $questionOrder;
                $form->answer = $request->input($questionOrder);
                $form->save();
            }
        }
        $images = $request->file('image');
        foreach ($images as $image) {
            $post_img = new PostImage();
            $post_img->post_id = $recentPost_id;
            $post_img->image = $image->store('public/posts');
            $post_img->save();
        }

        return redirect()->route('post.index');
    }

    public function commentStore(Request $request, $post_id)
    {
        $use_post_id = Post::findOrFail($post_id);
        $use_user_id = Auth::id();

        $request->validate([
            'answer' => ['required', 'min:1']
        ]);
        $image = $request->file('image');
        $comment = new Comment;
        $comment->post_id = $use_post_id->id;
        $comment->user_id = $use_user_id;
        $comment->comment = $request->input('answer');
        $comment->image = $image->store('public/comments');
        $comment->save();

        $post = Post::find($post_id);
        $post->created_at = \Illuminate\Support\Carbon::now();
        if ($use_user_id == $post->request_ans_user_id) {
            $post->doc_already_ans = 1;
            $post->save();
        } else {
            $post->save();
        }
        return redirect()->route('post.show', ['post' => $use_post_id->id]);
    }

    public function commentStoreNew(Request $request, $post_id)
    {
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

        $post = Post::find($post_id);
        if ($use_user_id == $post->request_ans_user_id) {
            $post->doc_already_ans = 1;
            $post->save();
        }

        $user = Auth::user();
        $doctor = DoctorInfo::find($user->doctor_info_id);
        $posts = Post::all();
        $requestQuestion = Post::where('doc_already_ans', ' = ', null)->get();
        $answeredPost = Post::where('doc_already_ans', ' = ', 1)->get();
        return view('doctors.profile', [
            'user' => $user,
            'doctor' => $doctor,
            'requestQuestion' => $requestQuestion,
            'answeredPost' => $answeredPost
        ]);
    }

    public function show($id)
    {
        $post = Post::find($id);
        $forms = Form::all();
        $user = Auth::user();
        $images = PostImage::where('post_id', "=", $id)->get();
        return view('posts.show', [
            'post' => $post,
            'forms' => $forms,
            'user' => $user,
            'images' => $images
        ]);
    }

    public function edit($id)
    {
        return view('posts.edit');
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $validatedData = $request->validate([
            'question' => 'required',
            'detail' => 'required',

        ]);
        $post->question = $request->input('question');
        $post->detail = $request->input('detail');

        $post->save();
        return redirect()->route('post.show', ['post' => $post]);
    }


    public function commentUpdate(Request $request, $post_id)
    {
        $post = Post::findOrFail($post_id);
        $validatedData = $request->validate([
            'comment' => 'required'
        ]);
        $comment = Comment::findOrFail($request->input('id'));
        $comment->comment = $request->input('comment');
        $comment->save();
        return redirect()->route('post.show', ['post' => $post]);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('post.index');
    }

    public function destroyComment($comment_id)
    {
        $comment = Comment::findOrFail($comment_id);
        $comment->delete();
        return redirect()->back();
    }

}
