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
                <div class="row" >
                    <h5 class="col-11">
                        {{ $post->detail }}
                    </h5>
                    <div class="col-1" style="display: flex; justify-content: center; align-items: center;">
                        <a href="{{ route('posts.edit', ['post' => 2]) }}">
                            <button class="btn btn-warning">edit</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                {{ $post->user->name }}
            </div>
        </div>

        <form action="" style="margin-top: 30px;">
            <div class="row">
                <div class="col-10">
                    <textarea name="" style="width: 100%" rows="4" placeholder=" Answer..."></textarea>
                </div>
                <div class="col-2 text-center" style="display: flex; justify-content: center; align-items: center;">
                    <button class="btn btn-info">comment</button>
                </div>
            </div>

        </form>
<hr>
        <!-- comment -->
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="row" >
                    <div class="col-11">
                        <h4>name</h4>
                        <div>comment</div>
                    </div>
                    <div class="col-1" style="display: flex; justify-content: center; align-items: center;">
                        <button class="btn btn-warning">edit</button>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row" >
                    <div class="col-11">
                        <h4>name</h4>
                        <div>comment</div>
                    </div>
                    <div class="col-1" style="display: flex; justify-content: center; align-items: center;">
                        <button class="btn btn-warning">edit</button>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row" >
                    <div class="col-11">
                        <h4>name</h4>
                        <div>comment</div>
                    </div>
                    <div class="col-1" style="display: flex; justify-content: center; align-items: center;">
                        <button class="btn btn-warning">edit</button>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row" >
                    <div class="col-11">
                        <h4>name</h4>
                        <div>comment</div>
                    </div>
                    <div class="col-1" style="display: flex; justify-content: center; align-items: center;">
                        <button class="btn btn-warning">edit</button>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row" >
                    <div class="col-11">
                        <h4>name</h4>
                        <div>comment</div>
                    </div>
                    <div class="col-1" style="display: flex; justify-content: center; align-items: center;">
                        <button class="btn btn-warning">edit</button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
@endsection
