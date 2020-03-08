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
                                <td>Suvicha narongchai</td>
                            </tr>
                            <tr>
                                <th scope="row">PHONE NUMBER</th>
                                <td>084 5858267</td>
                            </tr>
                            <tr>
                                <th scope="row">EMAIL</th>
                                <td>kitpavin@gmail.com</td>
                            </tr>
                            <tr>
                                <th scope="row">GRADUATED FROM</th>
                                <td>Kasetart University</td>
                            </tr>
                            <tr>
                                <th scope="row">LICENSE NUMBER</th>
                                <td>1264597846</td>
                            </tr>
                            <tr>
                                <th scope="row">WORK AT</th>
                                <td>Kasetsart Unversity</td>
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
                </div>

                <h2 style="margin-top: 50px">All Questions</h2>
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
            </div>
        </div>
    </div>
@endsection
