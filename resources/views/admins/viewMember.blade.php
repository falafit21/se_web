@extends('layouts.master')
@section('content')
    <div style="margin-left: 200px; margin-right: 200px; margin-top: 50px; color: white;">
        <div class="card border-light text-center" style=" margin-left: 250px; margin-right: 250px; margin-top: 50px;">
            <div class="card-header text-center" style="color: black">
                <h4>My Profile </h4>
            </div>
            <div class="card-body">
                <table class="table table-borderless text-center">
                    <tbody style="color: black">
                    <tr>
                        <th scope="row">NAME</th>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">EMAIL</th>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <th scope="row">STATUS</th>
                        @if($user->status==1)
                            <td>Normal</td>
                        @else
                            <td>Banned</td>
                        @endif
                    </tr>
                    <tr>
                        <th scope="row">PASSWORD</th>
                        <td><a href="" data-toggle="modal" data-target="#changePassword"
                               style="font-size: 18px;"
                               type="button" data-toggle="tooltip" data-placement="top" title="edit password">change password</a></td>
                    </tr>
                    </tbody>
                </table>
                <div class=" text-right">
                    <i class="far fa-edit" data-toggle="modal" data-target="#editProfile" style="font-size: 18px; color: #F5B041" type="button" data-toggle="tooltip" data-placement="top" title="edit profile"></i>
                </div>
            </div>
        </div>

{{--        edit profile--}}

        <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('user.update',['user'=>$user->id])}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label text-left">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"
                                           placeholder="Enter Name" value="{{$user->name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label text-left">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email"
                                           aria-describedby="emailHelp" placeholder="Enter email" value="{{$user->email}}">
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




        <h4>All Users profile</h4>
        <table class="table table-light">
            <thead class="thead-light">
            <tr>
                <th scope="col" style="font-size: 20px">Name</th>
                <th scope="col" style="font-size: 20px">Email</th>
                <th scope="col" style="font-size: 20px">create_at</th>
                <th scope="col" style="font-size: 20px"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td class="text-right">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="block">
                            <label class="custom-control-label" for="block">block</label>
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
