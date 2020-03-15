@extends('layouts.master')

@section('style')
@endsection

@section('content')
    <div class="container" style="margin-top: 30px">
        <div class="card">
            <div class="card-body">
                <p class="card-text"><small class="text-muted" style="font-size: 15px">{{ $post->user->name }}</small>
                </p>
                <div class="row">
                    <p class="col-10" style="font-size: 25px;">
                        <i class="fas fa-question" style="margin-right: 9px"></i> {{ $post->question }}
                    </p>
                    <div class="col-2 text-right col-2" style="margin-top: 10px">
                        @can('update', $post->user)
                            <i class="far fa-edit" style="color: #F5B041; font-size: 20px"
                                type="button" data-toggle="tooltip" data-placement="top" title="edit post"
                            ></i>
                        @endcan
                        @can('delete', $post->user)
                            <i class="fas fa-trash-alt" style="color: #E74C3C; font-size: 20px"
                               type="button" data-toggle="tooltip" data-placement="top" title="delete post"
                            ></i>
                        @endcan
                    </div>
                </div>
                <p style="font-size: 18px">{{ $post->detail }}</p>
            </div>
        </div>
        @can('view', $post->user)
            <form action="{{  route("post.comment.store", [
                'post_id' => $post->id
            ]) }}" style="margin-top: 30px;" method="POST">

                @csrf
                <div class="row">
                    <div class="col-10">
                        <label for="answer">Answers : </label>
                        <textarea name="answer" id="answer" style="width: 100%" rows="3"
                                  class="form-control @error('answer') is-invalid @enderror"
                        >{{ old('answer') }}</textarea>
                        @error('answer')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-2 text-right" style="display: flex; justify-content: center; align-items: center;">
                        <button class="btn btn-info" type="submit">comment</button>
                    </div>
                </div>

            </form>
        @endcan
        <hr>
        <!-- comment -->
        <ul class="list-group list-group-flush">
            @foreach($post->comments as $comment)
                <li class="list-group-item">
                    <h6>{{ $comment->user->name }}</h6>
                    <div class="row">
                        <h4 class="col-10">{{ $comment->comment }}</h4>
                        <div class="col-2 text-right">
                            @can('update', $comment->user)
                                <i class="far fa-edit" style="color: #F5B041; font-size: 20px"
                                   type="button" data-toggle="tooltip" data-placement="top" title="edit comment"
                                ></i>
                            @endcan
                            @can('delete', $comment->user)
                                <i class="fas fa-trash-alt" style="color: #E74C3C; font-size: 20px"
                                   type="button" data-toggle="tooltip" data-placement="top" title="delete comment"
                                ></i>
                            @endcan
                        </div>
                    </div>
                    {{ $comment->created_at->diffForHumans() }}
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
