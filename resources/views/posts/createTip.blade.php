@extends('layouts.master')
@section('content')
<div style="margin-right: 200px; margin-left: 200px; margin-top: 50px">
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


    @foreach($tips as $tip)
    <div class="card" style="margin-bottom: 10px">
        <div class="card-body">
            {{-- <p class="card-text"><small class="text-muted" style="font-size: 15px">{{ $post->user->name }}</small></p>--}}
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
                                        <input type="title" class="form-control {{ $errors->has('title') ? ' has-error' : '' }}" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter title" value="{{$tip->title}}" oninvalid="this.setCustomValidity('Please enter title')" oninput="setCustomValidity('')" required>
                                        @if ($errors->has('title'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Detail</th>
                                    <td><textarea type="text" class="form-control {{ $errors->has('detail') ? ' has-error' : '' }}" id="detail" name="detail" aria-describedby="emailHelp" placeholder="Tips Detail" oninvalid="this.setCustomValidity('Please enter detail')" oninput="setCustomValidity('')" required>{{$tip->detail}}</textarea>
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