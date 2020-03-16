@extends('layouts.master')
@section('content')
    <div style="margin-right: 200px; margin-left: 200px; margin-top: 50px">
        <h4 style="color: white">Create Tip</h4>
        <form method="post" action="{{ route('petTip.store') }}">
            @csrf
            <div class="form-group">
                <label for="title" style="color: white">title</label>
                <input class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="detail" style="color: white">detail</label>
                <textarea class="form-control" id="detail" rows="3" name="detail"></textarea>
                {{--                    <small id="fileHelp" class="form-text text-muted"> Please answer in Kilograms Unit</small>--}}
            </div>
            <div class="form-group row">
                <div class="offset-sm-11">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>


        @foreach($tips as $tip)
            <div class="card" style="margin-bottom: 10px">
                <div class="card-body">
{{--                    <p class="card-text"><small class="text-muted" style="font-size: 15px">{{ $post->user->name }}</small></p>--}}
                    <div class="row">
                        <p class="col-10" style="font-size: 25px;">
                            <i class="far fa-sticky-note"></i> {{ $tip->title }}
                        </p>
                        <div class="col-2 text-right col-2" style="margin-top: 10px">
{{--                            @can('update', $post->user)--}}
                                <i class="far fa-edit" style="color: #F5B041; font-size: 20px"
                                   type="button" data-toggle="tooltip" data-placement="top" title="edit post"
                                ></i>
{{--                            @endcan--}}
{{--                            @can('delete', $post->user)--}}
                                <i class="fas fa-trash-alt" style="color: #E74C3C; font-size: 20px"
                                   type="button" data-toggle="tooltip" data-placement="top" title="delete post"
                                ></i>
{{--                            @endcan--}}
                        </div>
                    </div>
                    <p style="font-size: 18px; margin-bottom: 20px">{{ $tip->detail }}</p>
                </div>
            </div>
        @endforeach

    </div>
@endsection
