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
                    <button type="button" class="btn btn-primary text-left" style="margin: 20px">edit pet profile</button>
                    <button type="button" class="btn btn-primary text-right" style="margin: 20px">change password</button>
                </div>

            </div>

        </div>
        <div class="col-8">
            <h2>Request Question</h2>

           
            
            

            <!-- <h2 style="margin-top: 50px">All Questions</h2>
            <div class="card post-card" style="margin-top: 10px">
                <div class="card-body">
                    <h5>question 1</h5>
                    <p>question detail 1</p>
                </div>
            </div>
            <div class="card post-card" style="margin-top: 10px">
                <div class="card-body">
                    <h5>question 2 </h5>
                    <p>question detail 2</p>
                </div>
            </div>
            <div class="card post-card" style="margin-top: 10px">
                <div class="card-body">
                    <h5>question 3</h5>
                    <p>question detail 3 </p>
                </div>
            </div> -->
        </div>
    </div>
    @endsection