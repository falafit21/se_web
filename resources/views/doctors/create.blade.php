@extends('layouts.master')

@section('style')
<style>
    a {
        text-decoration: none;
    }
    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: white;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }
    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }
    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }
        .sidenav a {
            font-size: 18px;
        }
    }
</style>
@endsection

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

{{-- change password model--}}
<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
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
                                        <td><input id="current-password" type="password" class="form-control" name="current-password" oninvalid="this.setCustomValidity('Please enter your current password')" oninput="setCustomValidity('')" required>

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
                                        <td><input id="new-password" type="password" class="form-control" name="new-password" oninvalid="this.setCustomValidity('Please enter your new password')" oninput="setCustomValidity('')" required>
                                            @if ($errors->has('new-password'))
                                            <span class="help-block"><strong>{{ $errors->first('new-password') }}</strong></span>
                                            @endif</td>
                                    </div>
                                </tr>
                                <tr>
                                    <th><label for="new-password-confirm">Confirm New Password</label></th>
                                    <td><input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" oninvalid="this.setCustomValidity('Please confirm your new password')" oninput="setCustomValidity('')" required></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>

        </div>

    </div>
</div>


{{--create doc section--}}
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div style="margin-left: 40px; margin-right: 40px; margin-top: 10px; margin-bottom: 50px;">
        <h3>Create doctor</h3>
        <form method="POST" enctype="multipart/form-data" action="{{ route('doctorLists.store') }}">
            @csrf
            <h5 style="margin-top: 50px">Step 1 : Basic info</h5>

            <div class="form-group">
                <label for="name">name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" oninvalid="this.setCustomValidity('Please enter doctor name')" oninput="setCustomValidity('')" required>
                @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" oninvalid="this.setCustomValidity('Please enter doctor email')" oninput="setCustomValidity('')" required>
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                <label for="password">password</label>
                <input type="password" class="form-control {{ $errors->has('password') ? ' has-error' : '' }}" id="password" name="password" oninvalid="this.setCustomValidity('Please enter password')" oninput="setCustomValidity('')"  required>
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="confirmPassword">confirm password</label>
                <input type="password" class="form-control {{ $errors->has('confirmPassword') ? ' has-error' : '' }}" id="confirmPassword" name="confirmPassword" oninvalid="this.setCustomValidity('Please confirm password')" oninput="setCustomValidity('')" required>
                @if ($errors->has('confirmPassword'))
                <span class="help-block">
                    <strong>{{ $errors->first('confirmPassword') }}</strong>
                </span>
                @endif
            </div>

            <h5 style="margin-top: 50px">Step 2 : Advance info</h5>
            <div class="form-group">
                <label for="phoneNumber">phone number</label>
                <input type="text" class="form-control {{ $errors->has('phoneNumber') ? ' has-error' : '' }}" id="phoneNumber" name="phoneNumber" oninvalid="this.setCustomValidity('Please enter doctor phone number')" oninput="setCustomValidity('')" required>
                @if ($errors->has('phoneNumber'))
                <span class="help-block">
                    <strong>{{ $errors->first('phoneNumber') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="graduatedFrom">graduated from</label>
                <input type="text" class="form-control {{ $errors->has('graduatedFrom') ? ' has-error' : '' }}" id="graduatedFrom" name="graduatedFrom" oninvalid="this.setCustomValidity('Please enter doctor graduated from')" oninput="setCustomValidity('')" required>
                @if ($errors->has('graduatedFrom'))
                <span class="help-block">
                    <strong>{{ $errors->first('graduatedFrom') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="licenseNumber">license number</label>
                <input type="text" class="form-control {{ $errors->has('licenseNumber') ? ' has-error' : '' }}" id="licenseNumber" name="licenseNumber" oninvalid="this.setCustomValidity('Please enter doctor license number')" oninput="setCustomValidity('')" required>
                @if ($errors->has('licenseNumber'))
                <span class="help-block">
                    <strong>{{ $errors->first('licenseNumber') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="workAt">work at</label>
                <input type="text" class="form-control {{ $errors->has('workAt') ? ' has-error' : '' }}" id="workAt" name="workAt" oninvalid="this.setCustomValidity('Please enter doctor work place')" oninput="setCustomValidity('')" required>
                @if ($errors->has('workAt'))
                <span class="help-block">
                    <strong>{{ $errors->first('workAt') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="img_path">Image</label>
                <input type="file" class="form-control {{ $errors->has('img_path') ? ' has-error' : '' }}" id="img_path" name="img_path" required>
                @if ($errors->has('img_path'))
                <span class="help-block">
                    <strong>{{ $errors->first('img_path') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</div>

<div class="row" style="margin: 40px; color: white;">
    <div class="col-3">
        <div class="card border-light text-center">
            <div class="card-header text-center" style="color: black">
                <h4>My Profile</h4>
            </div>
            <div class="card-body">
                <table class="table table-borderless text-center">
                    <tbody style="color: black">
                        <tr>
                            <th scope="row" class="text-left">NAME</th>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-left">EMAIL</th>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-left">PASSWORD</th>
                            <td><a href="" data-toggle="modal" data-target="#changePassword" style="font-size: 15px;" data-toggle="tooltip" data-placement="top" title="edit password">change
                                    password</a></td>
                        </tr>
                    </tbody>
                </table>
                <div class=" text-right">
                    <i class="far fa-edit" data-toggle="modal" data-target="#editProfile" style="font-size: 18px; color: #F5B041" data-toggle="tooltip" data-placement="top" title="edit profile"></i>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-warning btn-lg btn-block" style="cursor:pointer; margin-top: 20px" onclick="openNav()">Create doctor
        </button>
    </div>

    {{-- edit profile--}}
    <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('user.update',['user'=>$user->id])}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel" style="color: #1b1e21">Edit Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label text-left" style="color: #1b1e21">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control {{ $errors->has('name') ? ' has-error' : '' }}" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter Name" value="{{$user->name}}" oninvalid="this.setCustomValidity('Please enter your name')" oninput="setCustomValidity('')" required>
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label text-left" style="color: #1b1e21">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control {{ $errors->has('email') ? ' has-error' : '' }}" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{$user->email}}" oninvalid="this.setCustomValidity('Please enter your email')" oninput="setCustomValidity('')" required>
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
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

    <div class="col-4">
        <h5>All Doctors</h5>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th scope="col" style="font-size: 18px">Name</th>
                    <th scope="col" style="font-size: 18px">Email</th>
                    <th scope="col" class=" text-center" style="font-size: 18px">manage</th>
                </tr>
            </thead>
            <tbody>
                @foreach($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->email }}</td>
                    <td class="text-center">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="{{ $doctor->id }}" {{ $doctor->status == 0 ? 'checked' : '' }}>
                            <label class="custom-control-label" for="{{ $doctor->id }}">block</label>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div class="col-5">
        <h5>All member</h5>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th scope="col" style="font-size: 18px">Name</th>
                    <th scope="col" style="font-size: 18px">Email</th>
                    <th scope="col" class="text-center" style="font-size: 18px">manage</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-center">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="{{ $user->id }}" {{ $user->status == 0 ? 'checked' : '' }}>
                            <label class="custom-control-label" for="{{ $user->id }}">block</label>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>


@endsection

@section('script')
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "700px";
        document.getElementById("main").style.marginLeft = "700px";
        document.body.style.backgroundColor = "rgba(0,0,0,0)";
    }
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0px";
        document.getElementById("main").style.marginLeft = "0px";
        document.body.style.backgroundColor = "white";
    }
    let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    elems.forEach(function(html) {
        let switchery = new Switchery(html, {
            size: 'small'
        });
    });
    $(document).ready(function() {
        $('.custom-control-input').change(function() {
            let status = $(this).prop('checked') === true ? 0 : 1;
            let userId = $(this).attr("id");
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('user.update.status') }}',
                data: {
                    'status': status,
                    'user_id': userId
                },
                success: function(data) {
                    console.log(data.message);
                }
            });
        });
    });
</script>
@endsection
