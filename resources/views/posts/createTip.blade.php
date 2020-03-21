@extends('layouts.master')
@section('content')
    <div style="margin-right: 200px; margin-left: 200px; margin-top: 50px">
        <div class="card" style="margin-right: 250px; margin-left: 250px; margin-bottom: 50px; background-color: #D5D8DC" >
            <div class="card-body" style="color: black">
                <h4 style="">Create Tip</h4>
                <form method="post" action="{{ route('petTip.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="title">title</label>
                        <input class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="detail">detail</label>
                        <textarea class="form-control" id="detail" rows="3" name="detail"></textarea>
                        {{--                    <small id="fileHelp" class="form-text text-muted"> Please answer in Kilograms Unit</small>--}}
                    </div>
                    <div class="form-group text-right">
{{--                        <div class="offset-sm-11">--}}
                            <button type="submit" class="btn btn-primary">Create</button>
{{--                        </div>--}}
                    </div>
                </form>
            </div>
        </div>


        @foreach($tips as $tip)
            <div class="card" style="margin-bottom: 10px">
                <div class="card-body">
                    {{--                    <p class="card-text"><small class="text-muted" style="font-size: 15px">{{ $post->user->name }}</small></p>--}}
                    <div class="row">
                        <p class="col-11" style="font-size: 25px;">
                            <i class="far fa-sticky-note"></i> {{ $tip->title }}
                        </p>
                        <form id="deleteForm" onsubmit="return confirm('Are you sure to delete this post?')"
                              action="{{ route('petTip.destroy', ['petTip' => $tip->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <div class="row" style="margin-top: 10px;">
                                <button class="far fa-edit"
                                        style="background-color: Transparent;border:none; color: #F5B041; font-size: 20px;"
                                        type="button" data-toggle="tooltip" data-placement="top" title="edit tip"
                                ></button>
                                <button class="fas fa-trash-alt"
                                        type="submit"
                                        style="background-color: Transparent;border:none; color: #E74C3C; font-size: 20px"
                                        type="button" data-toggle="tooltip" data-placement="top" title="delete tip"
                                >
                                </button>

                            </div>
                        </form>
                    </div>
                    <p style="font-size: 18px; margin-bottom: 20px">{{ $tip->detail }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
