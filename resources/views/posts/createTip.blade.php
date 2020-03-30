@extends('layouts.master')
@section('style')
    <style>
        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>

@section('content')
    <div class="container" style="margin-top: 20px; color:dimgrey">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home">Text</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu1">Image</a>
            </li>

        </ul>
        <div class="tab-content">
            <div id="home" class="container tab-pane active"><br>
{{--                <div class="container">--}}
                    <div class="card" style="margin-right: 250px; margin-left: 250px; margin-bottom: 50px; background-color: #D5D8DC">
                        <div class="card-body" style="color: black">
                            <h4 style="">Create Tip</h4>
                            <form method="post" action="{{ route('petTip.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="title">title</label>
                                    <input class="form-control @error('title') is-invalid @enderror" id="title" name="title">
                                    @error('title')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="detail">detail</label>
                                    <textarea class="form-control @error('detail') is-invalid @enderror" id="detail" rows="3" name="detail"></textarea>
                                    @error('detail')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                    {{-- <small id="fileHelp" class="form-text text-muted"> Please answer in Kilograms Unit</small>--}}
                                </div>
                                <div class="form-group text-right">
                                    {{-- <div class="offset-sm-11">--}}
                                    <button type="submit" class="btn btn-primary">Create</button>
                                    {{-- </div>--}}
                                </div>
                            </form>
                        </div>
                    </div>


{{--                </div>--}}
            </div>
            <div id="menu1" class="container tab-pane fade"><br>
{{--                <div class="container">--}}
                    <div class="card" style="margin-right: 250px; margin-left: 250px; margin-bottom: 50px; background-color: #D5D8DC">
                        <div class="card-body" style="color: black">
                            <h4 style="">Create Tip</h4>
                            <form method="post" enctype="multipart/form-data" action="{{ route('petTip.image') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="img_path">Image</label>
                                    <input type="file" class="form-control @error('img_path') is-invalid @enderror" id="img_path" name="img_path">
                                    <small class="text-muted" style="font-size: 15px">Image size should be 824x500</small>
                                    @error('img_path')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group text-right">
                                    {{-- <div class="offset-sm-11">--}}
                                    <button type="submit" class="btn btn-primary">Create</button>
                                    {{-- </div>--}}
                                </div>
                            </form>
                        </div>
                </div>

{{--            </div>--}}
        </div>


    </div>
{{--<div style="margin-right: 200px; margin-left: 200px; margin-top: 50px">--}}
{{--    <div class="card" style="margin-right: 250px; margin-left: 250px; margin-bottom: 50px; background-color: #D5D8DC">--}}
{{--        <div class="card-body" style="color: black">--}}
{{--            <h4 style="">Create Tip</h4>--}}
{{--            <form method="post" action="{{ route('petTip.store') }}">--}}
{{--                @csrf--}}
{{--                <div class="form-group">--}}
{{--                    <label for="title">title</label>--}}
{{--                    <input class="form-control @error('title') is-invalid @enderror" id="title" name="title">--}}
{{--                    @error('title')--}}
{{--                    <div class="alert alert-danger">{{$message}}</div>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="detail">detail</label>--}}
{{--                    <textarea class="form-control @error('detail') is-invalid @enderror" id="detail" rows="3" name="detail"></textarea>--}}
{{--                    @error('detail')--}}
{{--                    <div class="alert alert-danger">{{$message}}</div>--}}
{{--                    @enderror--}}
{{--                    --}}{{-- <small id="fileHelp" class="form-text text-muted"> Please answer in Kilograms Unit</small>--}}
{{--                </div>--}}
{{--                <div class="form-group text-right">--}}
{{--                    --}}{{-- <div class="offset-sm-11">--}}
{{--                    <button type="submit" class="btn btn-primary">Create</button>--}}
{{--                    --}}{{-- </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}


    @foreach($tips as $tip)
    <div class="card" style="margin-bottom: 10px">
        <div class="card-body">
            {{-- <p class="card-text"><small class="text-muted" style="font-size: 15px">{{ $post->user->name }}</small></p>--}}
            @if($tip->img_path == null)
            <div class="row">
                <p class="col-11" style="font-size: 25px;">
                    <i class="far fa-sticky-note"></i> {{ $tip->title }}
                </p>
                <form id="deleteForm" onsubmit="return confirm('Are you sure to delete this post?')" action="{{ route('petTip.destroy', ['petTip' => $tip->id]) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="row" style="margin-top: 10px;">
                        <button class="far fa-edit" style="background-color: Transparent;border:none; color: #F5B041; font-size: 20px;" type="button" data-id="{{$tip->id}}" data-toggle="modal" data-target="#edit-{{ $tip->id }}" data-placement="top" title="edit comment">

                        </button>
                        <button class="fas fa-trash-alt" type="submit" style="background-color: Transparent;border:none; color: #E74C3C; font-size: 20px" type="button" data-toggle="tooltip" data-placement="top" title="delete tip">
                        </button>

                    </div>
                </form>
            </div>
            <p style="font-size: 18px; margin-bottom: 20px">{{ $tip->detail }}</p>
                @else
                <div class="row">

                    <p class="col-11" style="font-size: 25px;">


                        <i class="far fa-file-image"></i>  Banner Image
                    </p>
                    <form id="deleteForm" onsubmit="return confirm('Are you sure to delete this post?')" action="{{ route('petTip.destroy', ['petTip' => $tip->id]) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="row" style="margin-top: 10px;padding-left: 40px">
                            <button class="fas fa-trash-alt" type="submit" style="background-color: Transparent;border:none; color: #E74C3C; font-size: 20px" type="button" data-toggle="tooltip" data-placement="top" title="delete tip">
                            </button>

                        </div>
                    </form>
                </div>
                <img src="{{Storage::url($tip->img_path)}}" alt="" width="600" height="305" srcset="">
            @endif
        </div>
    </div>

    @endforeach


    @foreach($tips as $tip)
    <div class="modal fade" id="edit-{{ $tip->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('petTip.update',['petTip'=>$tip->id])}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-borderless">
                            <tbody style="color: black">
                                <tr>
                                    <th>Title</th>
                                    <td>
                                        <input type="title" class="form-control {{ $errors->has('title') ? ' has-error' : '' }}" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter title" value="{{$tip->title}}" required>
                                        @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Detail</th>
                                    <td><textarea type="text" class="form-control {{ $errors->has('detail') ? ' has-error' : '' }}" id="detail" name="detail" aria-describedby="emailHelp" placeholder="Tips Detail" required>{{$tip->detail}}</textarea>
                                        @if ($errors->has('detail'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('detail') }}</strong>
                                        </span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    @endforeach

    @endsection
