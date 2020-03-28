@extends('layouts.master')
@section('content')
    <div class="panel-body">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div style="margin: 50px; color: white">
        <div class="row">
            <div class="col-4">
                <div class="card bg-light">
                    <h4 class="card-header text-center" style="color: black">
                        Doctor profile
                    </h4>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody style="color: black">
                            <tr>
                                <th scope="row">NAME</th>
                                <td>{{$doctor->user->name}}</td>
                            </tr>
                            <tr>
                                <th scope="row">PHONE NUMBER</th>
                                <td>{{$doctor->phone_number}}</td>
                            </tr>
                            <tr>
                                <th scope="row">EMAIL</th>
                                <td>{{$doctor->user->email}}</td>
                            </tr>
                            <tr>
                                <th scope="row">GRADUATED FROM</th>
                                <td>{{$doctor->graduated}}</td>
                            </tr>
                            <tr>
                                <th scope="row">LICENSE NUMBER</th>
                                <td>{{$doctor->license_number}}</td>
                            </tr>
                            <tr>
                                <th scope="row">WORK AT</th>
                                <td>{{$doctor->work_at}}</td>
                            </tr>
                            <tr>
                                <th scope="row">ANSWERED QUESTION</th>
                                <td>
                                    <a type="button" class="btn btn-info btn-block"
                                       data-toggle="modal" data-target="#answeredQuestion">
                                        detail
{{--                                        <span class="badge badge-light">{{ count($answeredPost) }}</span>--}}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">PASSWORD</th>
                                <td><a href=" " data-toggle="modal" data-target="#changePassword"
                                       style="font-size: 18px; color: #F5B041" data-toggle="tooltip"
                                       data-placement="top" title="change Password">change password</a></td>

                            </tr>
                            </tbody>
                        </table>
                        <div class=" text-right">
                            <i class="far fa-edit" data-toggle="modal" data-target="#editProfile"
                               style="font-size: 18px; color: #F5B041" data-toggle="tooltip" data-placement="top"
                               title="edit profile"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <h2>Request Question
{{--                    <span class="badge badge-light">{{ count($requestQuestion) }}</span>--}}
                </h2>
                @foreach($requestQuestion as $post)
                    @if($post->requestDoctor->role == 'doctor' && $post->requestDoctor->id == $doctor->user->id)
                        <a href="{{ route('post.show', ['post' => $post->id]) }}"
                           style="text-decoration: none; color: #1b1e21">
                            <div class="card post-card border-light" style="margin-bottom: 10px">
                                <div class="card-body">
                                    <div class="row">
                                        <p class="col-9" style="font-size: 25px;">
                                            {{ $post->question }}
                                        </p>
                                        <p class="text-muted text-right col-3" style="font-size: 15px;">
                                            <i class="fas fa-user" style="margin-right: 6px"></i>
                                            {{ $post->user->name }}
                                            <br>
                                            <i class="fas fa-dog" style="margin-right: 6px"></i>
                                            {{ $post->pet->name }}
                                        </p>
                                    </div>
                                    <p style="font-size: 18px">{{ $post->detail }}</p>
                                    <small class="text-muted" style="font-size: 13px">
                                        {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                    </small>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach

            </div>
        </div>


    </div>
    <!-- Modal edit Profile -->
    <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('user.update.doctor',['doctor_id'=>$doctor->id])}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <table class="table table-borderless">
                            <tbody style="color: black">
                            <tr>
                                <th>Name</th>
                                <td>
                                    <input type="name"
                                           class="form-control {{ $errors->has('name') ? ' has-error' : '' }}" id="name"
                                           name="name" aria-describedby="emailHelp" placeholder="Enter Name"
                                           value="{{$doctor->user->name}}" required>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>E-mail</th>
                                <td><input type="email"
                                           class="form-control {{ $errors->has('email') ? ' has-error' : '' }}"
                                           id="email" name="email" aria-describedby="emailHelp"
                                           placeholder="Enter email" value="{{$doctor->user->email}}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td><input type="text"
                                           class="form-control {{ $errors->has('phone_number') ? ' has-error' : '' }}"
                                           id="phone_number" name="phone_number" aria-describedby="emailHelp"
                                           placeholder="Enter your phone number" value="{{$doctor->phone_number}}"
                                           required>

                                    @if ($errors->has('phone_number'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Work at</th>
                                <td><input type="text"
                                           class="form-control {{ $errors->has('work_at') ? ' has-error' : '' }}"
                                           id="work_at" name="work_at" aria-describedby="emailHelp"
                                           placeholder="Enter your work place" value="{{$doctor->work_at}}" required>

                                    @if ($errors->has('work_at'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('work_at') }}</strong>
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

    <!--change Password-->
    <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('users.changePassword',['user'=>$user->id]) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Change Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tbody style="color: black">
                                <tr>
                                    <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                        <td><label for="new-password">Current Password</label></td>
                                        <td><input id="current-password" type="password" class="form-control"
                                                   name="current-password" required>

                                            @if ($errors->has('current-password'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('current-password') }}</strong>
                                            </span>
                                            @endif</td>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                        <th><label for="new-password">New Password</label></th>
                                        <td><input id="new-password" type="password" class="form-control"
                                                   name="new-password" required>
                                            @if ($errors->has('new-password'))
                                                <span
                                                    class="help-block"><strong>{{ $errors->first('new-password') }}</strong></span>
                                            @endif</td>
                                    </div>
                                </tr>
                                <tr>
                                    <th><label for="new-password-confirm">Confirm New Password</label></th>
                                    <td><input id="new-password-confirm" type="password" class="form-control"
                                               name="new-password_confirmation" required></td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{--    answeres question model--}}
    <div class="modal fade bd-example-modal-xl" id="answeredQuestion" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Answered question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="model-body container" style="margin-top: 10px">
                    @foreach($answeredPost as $post)
                        @if($post->requestDoctor->role == 'doctor' && $post->requestDoctor->id == $doctor->user->id)
                            <a href="{{ route('post.show', ['post' => $post->id]) }}"
                               style="text-decoration: none; color: #1b1e21" target="_blank">
                                <div class="card post-card border-light" style="margin-bottom: 10px; background-color: #D5D8DC">
                                    <div class="card-body">
                                        <div class="row">
                                            <p class="col-9" style="font-size: 25px;">
                                                {{ $post->question }}
                                            </p>
                                            <p class="text-muted text-right col-3" style="font-size: 15px;">
                                                <i class="fas fa-user" style="margin-right: 6px"></i>
                                                {{ $post->user->name }}
                                                <br>
                                                <i class="fas fa-dog" style="margin-right: 6px"></i>
                                                {{ $post->pet->name }}
                                            </p>
                                        </div>
                                        <p style="font-size: 18px">{{ $post->detail }}</p>
                                        <small class="text-muted" style="font-size: 13px">
                                            {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                        </small>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
