@extends('layouts.master')
@section('content')
    <div style="margin: 50px">
        <div class="row">
            <div class="col-4">
                <div class="card bg-light">
                    <div class="card-header text-center">
                        <h4>Doctor profile<i class="far fa-user" style="margin-left: 10px"></i></h4>
                    </div>
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
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary text-left" style="margin: 20px" data-toggle="modal" data-target="#editProfile"
                            style="font-size: 18px; color: #F5B041" type="button" data-toggle="tooltip"
                            data-placement="top" title="edit profile">Edit profile</button>
                    <button type="button" class="btn btn-primary text-right" style="margin: 20px"  data-target="#changePassword" data-toggle="modal" type="button" data-toggle="tooltip" data-placement="top" title="change Password">change password</button>
                </div>
            </div>

        </div>
            <!-- Modal edit Profile -->
            <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('user.update.doctor',['doctor_id' => $doctor->id])}}" method="post">
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
                                        <th>Name</th>
                                        <td>
                                            <input type="name" class="form-control" id="name" name="name" aria-describedby="emailHelp"
                                                   placeholder="Enter Name" value="{{$user->name}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>E-mail</th>
                                        <td><input type="email" class="form-control" id="email" name="email"
                                                   aria-describedby="emailHelp" placeholder="Enter email" value="{{$user->email}}"></td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number</th>
                                        <td><input type="text" class="form-control" id="email" name="email"
                                                   aria-describedby="emailHelp" placeholder="Enter email" value="{{$doctor->phone_number}}"></td>
                                    </tr>
                                    <tr>
                                        <th>Work at</th>
                                        <td><input type="text" class="form-control" id="email" name="email"
                                                   aria-describedby="emailHelp" placeholder="Enter email" value="{{$doctor->work_at}}"></td>
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
        <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

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
                            <div class="card-body" >
                                <table class="table table-borderless">
                                    <tbody style="color: black">
                                    <tr>
                                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                            <td><label for="new-password" >Current Password</label></td>
                                            <td><input id="current-password" type="password" class="form-control" name="current-password" required>

                                                @if ($errors->has('current-password'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('current-password') }}</strong>
                                        </span>
                                                @endif</td>
                                        </div>
                                    </tr>
                                    <tr>
                                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                            <th><label for="new-password" >New Password</label></th>
                                            <td><input id="new-password" type="password" class="form-control" name="new-password" required>
                                                @if ($errors->has('new-password'))
                                                    <span class="help-block"><strong>{{ $errors->first('new-password') }}</strong></span>
                                                @endif</td>
                                        </div>
                                    </tr>
                                    <tr>
                                        <th><label for="new-password-confirm">Confirm New Password</label></th>
                                        <td><input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required></td>
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
    </div>



            <div class="col-8">
                <h2>Request Question</h2>
                @foreach($posts as $post)
                    @if($post->requestDoctor->role == 'doctor' && $post->requestDoctor->id == $doctor->user->id)
                        <a href="{{ route('post.show', ['post' => $post->id]) }}"
                           style="text-decoration: none; color: #1b1e21">
                            <div class="card post-card border-light" style="margin-bottom: 10px">
                                <div class="card-body">
                                    <p class="card-text">
                                        <small class="text-muted" style="font-size: 15px">
                                            {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                        </small>
                                    </p>
                                    <p style="font-size: 22px"><i class="fas fa-question"
                                                                  style="margin-right: 9px"></i> {{ $post->question }}
                                    </p>
                                    <p style="font-size: 15px">{{ $post->detail }}</p>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
@endsection
