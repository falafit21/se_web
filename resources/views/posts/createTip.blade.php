@extends('layouts.master')
@section('content')
    <div style="margin-right: 200px; margin-left: 200px; margin-top: 50px">
        <h4>Create Tip</h4>
        <form method="POST">
            @csrf
            <div class="form-group">
                <label for="title">title</label>
                <input class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="detail">detail</label>
                <input type="text" class="form-control" id="detail" name="detail">
                {{--                    <small id="fileHelp" class="form-text text-muted"> Please answer in Kilograms Unit</small>--}}
            </div>
            <div class="form-group row">
                <div class="offset-sm-10">
                    <button type="submit" class="btn btn-primary">Create tip</button>
                </div>
            </div>
        </form>

    </div>
@endsection
