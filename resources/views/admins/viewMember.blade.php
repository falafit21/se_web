@extends('layouts.master')
@section('content')
    <div style="margin-left: 200px; margin-right: 200px; margin-top: 50px; color: white;">
        <div class="card border-light text-center" style=" margin-left: 250px; margin-right: 250px; margin-top: 50px;">
            <div class="card-header text-center" style="color: black">
                <h4>My Profile</h4>
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
                        <td><a href="">change password</a></td>
                    </tr>
                    </tbody>
                </table>
                <div class=" text-right">
                    <i class="far fa-edit" data-toggle="modal" data-target="#editModal"
                       style="font-size: 18px; color: #F5B041"
                       type="button" data-toggle="tooltip" data-placement="top" title="edit profile"
                    ></i>
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
