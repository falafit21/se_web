@extends('layouts.master')

@section('style')
@endsection

@section('content')
    <div class="container" style="margin-top: 30px">
        <div class="card ">
            <div class="card-header"><h4>Question</h4></div>
            <div class="card-body">detail</div>
            <div class="card-footer text-muted text-right">
                by Mr. tommy
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

        <!-- comment -->
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <h4>name</h4>
                <div>comment</div>
            </li>
            <li class="list-group-item">
                <h4>name</h4>
                <div>comment</div>
            </li>
            <li class="list-group-item">
                <h4>name</h4>
                <div>comment</div>
            </li>
            <li class="list-group-item">
                <h4>name</h4>
                <div>comment</div>
            </li>
            <li class="list-group-item">
                <h4>name</h4>
                <div>comment</div>
            </li>
        </ul>
    </div>
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
@endsection
