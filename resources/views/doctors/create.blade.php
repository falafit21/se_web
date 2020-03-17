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
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div style="margin-left: 40px; margin-right: 40px; margin-top: 10px; margin-bottom: 50px;">
            <h3>Create doctor</h3>
            <form method="POST" action="{{ route('doctorLists.store') }}">
                @csrf
                <h5 style="margin-top: 50px">Step 1 : Basic info</h5>
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="email">E-mail address</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="confirmPassword">confirm password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                </div>
{{--                <hr>--}}
                <h5 style="margin-top: 50px">Step 2 : Advance info</h5>
                <div class="form-group">
                    <label for="phoneNumber">phone number</label>
                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber">
                </div>
                <div class="form-group">
                    <label for="graduatedFrom">graduated from</label>
                    <input type="text" class="form-control" id="graduatedFrom" name="graduatedFrom">
                </div>
                <div class="form-group">
                    <label for="licenseNumber">license number</label>
                    <input type="text" class="form-control" id="licenseNumber" name="licenseNumber">
                </div>
                <div class="form-group">
                    <label for="workAt">work at</label>
                    <input type="text" class="form-control" id="workAt" name="workAt">
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>

    <div style="margin-left: 200px; margin-right: 200px; margin-top: 50px; color: white;">
        <button type="button" class="btn btn-warning btn-lg btn-block" style="cursor:pointer; margin-bottom: 50px"
                onclick="openNav()">Create doctor
        </button>
        <h4>All Doctors</h4>
        <table class="table table-light">
            <thead class="thead-light">
            <tr>
                <th scope="col" style="font-size: 20px">Name</th>
                <th scope="col" style="font-size: 20px">Email</th>
                <th scope="col" style="font-size: 20px" class="text-center">create_at</th>
                <th scope="col" style="font-size: 20px"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($doctors as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-center">{{ $user->created_at }}</td>
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
    </script>
@endsection
