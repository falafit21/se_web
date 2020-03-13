@extends('layouts.master')

@section('style')
@endsection

@section('content')
    <div class="container" style="margin-top: 30px">
        <div class="card">
            <h4 class="card-header">
                {{ $post->question }}
            </h4>
            <div class="card-body">
                <div class="row">
                    <h5 class="col-11">
                        {{ $post->detail }}
                    </h5>
                    <div class="col-1" style="display: flex; justify-content: center; align-items: center;">
                        <a href="{{ route('post.edit', ['post' => 2]) }}">
                            <button class="btn btn-warning">edit</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                {{ $post->user->name }}
            </div>
        </div>

        <form action="{{  route('post.comment.store', ['post_id' => $post->id ]) }}" style="margin-top: 30px;" method="POST">

            @csrf
            <div class="row">
                <div class="col-10">
                    <label for="answer">Answers : </label>
                    <textarea name="answer" id="answer" style="width: 100%" rows="4"
                              class="form-control @error('answer') is-invalid @enderror"
                    >{{ old('answer') }}</textarea>
                    @error('answer')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-2 text-center" style="display: flex; justify-content: center; align-items: center;">
                    <button class="btn btn-info" type="submit">comment</button>
                </div>
            </div>

        </form>
        <hr>
        <!-- comment -->
        <ul class="list-group list-group-flush">
            @foreach($post->comments as $comment)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-11">
                            <h6>{{ $comment->user->name }}</h6>
                            <h4>{{ $comment->comment }}</h4>
                            {{ $comment->created_at->diffForHumans() }}
                        </div>
                        <div class="col-1" style="display: flex; justify-content: center; align-items: center;">
                            <button class="btn btn-warning">edit</button>
                        </div>
                    </div>
                </li>
            @endforeach

        </ul>
    </div>
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
@endsection
