@extends('layouts.master')

@section('style')
<style>
    #more {
        display: none;
    }
</style>
@endsection

@section('content')
<div class="container" style="margin-top: 30px">
    <!-- Post -->
    <div class="card">
        <div class="card-body">
            <p class="card-text"><small class="text-muted" style="font-size: 15px; margin-left: 33px">{{ $post->user->name }}</small>
            </p>
            <div class="row">
                <p class="col-11" style="font-size: 25px;">
                    <i class="fas fa-question" style="margin-right: 9px"></i> {{ $post->question }}
                </p>
                <div class="col-1 text-right row" style="margin-top: 10px;">
                    @can('update', $post->user)
                    <i class="far fa-edit" style="color: #F5B041; font-size: 20px" type="button" data-toggle="modal" data-target="#editPostModal" data-placement="top" title="edit post"></i>
                    @endcan

                    @can('delete', $post->user)
                    <form id="deleteForm" onsubmit="return confirm('Are you sure to delete this post?')" action="{{ route('post.destroy', ['post' => $post->id]) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" style="background-color: Transparent;border:none; color: #E74C3C; font-size: 20px" class="fas fa-trash-alt" data-toggle="tooltip" data-placement="top" title="delete post">
                        </button>
                    </form>
                    @endcan
                </div>
            </div>
            <p style="font-size: 18px; margin-bottom: 20px; margin-left: 33px">{{ $post->detail }}</p>

            <a onclick="myFunction()" style="margin-right: 20px; margin-bottom: 20px; margin-left: 33px" type="button">
                <i style="font-size: 20px; margin-right: 8px" class="fab fa-wpforms"></i> Pet Symptom
            </a>
            <div>
                <div id="dots"></div>
                <table class="table table-borderless" id="more" style="margin-left: 33px">
                    <tbody>
                        @foreach($forms as $form)
                        @if($form->post_id == $post->id)
                        <tr>
                            <th style="background-color: #D5D8DC">{{ $form->questionForm->question}}</th>
                            <td style="">{{ $form->answer }}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @can('view', $post->user)
    <form action="{{  route('post.comment.store', ['post_id' => $post->id]) }}" style="margin-top: 30px;" method="POST" {{ $user->status ? "" : "hidden" }}>
        @csrf
        <div class="row">
            <div class="col-10">
                <label for="answer" style="color: white">Answers : </label>
                <textarea name="answer" id="answer" style="width: 100%" rows="3" class="form-control @error('answer') is-invalid @enderror">{{ old('answer') }}</textarea>
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
    <p style="margin-bottom: 30px"></p>

    <!-- comment -->
    <ul class="list-group list-group-flush">
        @foreach($post->comments as $comment)
        @if($comment->user->role == 'doctor')
        <li class="list-group-item" style="background-color: #FDEBD0">
            <h6>
                <i class="fas fa-stethoscope" style="margin-right: 10px; font-size: 20px"></i>{{ $comment->user->name }}
            </h6>
            <div class="row">
                <h4 class="col-11" style="margin-top: 10px">{{ $comment->comment }}</h4>
                <div class="col-1 text-right row" style="font-size: 20px">

                    @can('update', $comment->user)
                    <i class="far fa-edit" style="color: #F5B041; font-size: 20px" type="button" data-id="{{$comment->id}}" data-comment="{{$comment->comment}}" data-toggle="modal" data-target="#editCommentModal" data-placement="top" title="edit comment"></i>
                    @endcan
                    <form id="deleteForm" onsubmit="return confirm('Are you sure to delete this comment ?')" action="{{route('post.comment.destroy', ['comment_id' => $comment->id]) }}" method="post" class="">
                        @method('DELETE')
                        @csrf
                        @can('delete', $comment->user)
                        <button class="fas fa-trash-alt" style="color: #E74C3C; background-color: transparent; border:none" type="submit" data-toggle="tooltip" data-placement="top" title="delete post">
                        </button>
                        @endcan
                    </form>
                </div>
            </div>
            {{ $comment->created_at->diffForHumans() }}
        </li>
        @else
        <li class="list-group-item">
            <h6>{{ $comment->user->name }}</h6>
            <div class="row">
                <h4 class="col-11" style="margin-top: 10px">{{ $comment->comment }}</h4>
                <div class="col-1 text-right row" style="font-size: 20px">
                    <form id="deleteForm" onsubmit="return confirm('Are you sure to delete this comment ?')" action="{{route('post.comment.destroy', ['comment_id' => $comment->id]) }}" method="post" class="">
                        @method('DELETE')
                        @csrf
                        @can('update', $comment->user)
                        <i class="far fa-edit" style="color: #F5B041;" type="button" data-id="{{$comment->id}}" data-comment="{{$comment->comment}}" data-toggle="modal" data-target="#editCommentModal" data-placement="top" title="edit comment"></i>
                        @endcan
                        @can('delete', $comment->user)
                        <button class="fas fa-trash-alt" style="color: #E74C3C; background-color: transparent; border:none" type="submit" data-toggle="tooltip" data-placement="top" title="delete post">
                        </button>
                        @endcan
                    </form>
                </div>
            </div>
            {{ $comment->created_at->diffForHumans() }}
        </li>
        @endif
        @endforeach
    </ul>
</div>
<!-- Modal edit post -->
<div class="modal fade" id="editPostModal" tabindex="-1" role="dialog" aria-labelledby="editPostModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('post.update',['post'=>$post->id])}}" method="post">
                @method('PUT')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editPostModalLabel">Edit Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="question" class="col-sm-3 col-form-label text-left">Post
                            title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="question" name="question" placeholder="Enter Question" value="{{ $post->question }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="detail" class="col-sm-3 col-form-label text-left">Post
                            detail</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" id="detail" name="detail" placeholder="Enter Detail">{{ $post->detail }}</textarea>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal comment -->
<div class="modal fade" id="editCommentModal" tabindex="-1" role="dialog" aria-labelledby="editCommentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('post.comment.update',['post_id' => $post->id])}}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editCommentModalLabel">Edit Comment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <input type="text" class="form-control" id="comment" name="comment" placeholder="Enter comment">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script>
    $('#editCommentModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var comment = button.data('comment');
        var id = button.data('id')
        var modal = $(this);

        modal.find('.modal-body #comment').val(comment);
        modal.find('.modal-body #id').val(id);
    })
    

    function myFunction() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            // btnText.innerHTML = "Read more";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            // btnText.innerHTML = "Read less";
            moreText.style.display = "inline";
        }
    }
</script>
@endsection
