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
            <h2>Create post </h2>
            <form method="POST" action="{{ route('post.store') }}" class="text-left">
                @csrf
                <div class="form-group">
                    <label for="title">title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="detail">detail</label>
                    <textarea class="form-control" id="detail" rows="3" name="detail"></textarea>
                </div>
                <div class="form-group">
                    <label for="choosePet">Choose your pet</label>
                    <select id="choosePet" class="form-control" name="choosePet">
                        @foreach($pets as $pet)
                            <option value="{{ $pet->id }}">{{ $pet->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="chooseDoc">Choose Doctor</label>
                    <div class="row">
                        <div class="col-10">
                            <select id="chooseDoc" class="form-control" name="chooseDoc">
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <a href="{{ url('doctorLists') }}" target="_blank" class="btn btn-info col-2"
                           style="background-color: #EB984E; color: white">doctor list</a>
                    </div>

                </div>
                <h5 style="margin-top: 50px" class="text-left">Pet Symptom</h5>
                <table class="table text-left">
                    @foreach( $formsQuestion as $formQuestion )
                        <tr>
                            <td>{{ $formQuestion->question }}</td>
                            <td>
                                <div class="text-left">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="yes{{ $loop->index }}"
                                               name="customRadio[{{ $loop->index }}]"
                                               class="custom-control-input">
                                        <label class="custom-control-label"
                                               for="yes{{ $loop->index }}">yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="no{{ $loop->index }}"
                                               name="customRadio[{{ $loop->index }}]"
                                               class="custom-control-input"
                                        >
                                        <label class="custom-control-label"
                                               for="no{{ $loop->index }}">no</label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <button type="submit" class="btn btn-primary">Post</button>
            </form>
        </div>
    </div>

    @can('viewOnlyUseAndDoctor', App\User::class)
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" style="background-color: #D7DBDD; height: 250px; ">
                <div class="carousel-item active">

                </div>
                <div class="carousel-item">

                </div>
                <div class="carousel-item">

                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    @endcan

    <div class="" style="margin: 50px">
        @can('viewAny', App\User::class)
            <div class="row">
                <div class="col-4">
                    <div class="card border-light text-center" >
                        <div class="card-header text-center">
                            <h4>My Profile</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless text-left">
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
                </div>
                <div class="col-7" style=" margin-left: 30px;">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" style="background-color: #D7DBDD; height: 325px; ">
                            <div class="carousel-item active">

                            </div>
                            <div class="carousel-item">

                            </div>
                            <div class="carousel-item">

                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>


        @endcan
        @can('create', \App\Post::class)
            <button type="button" class="btn btn-warning btn-lg btn-block" style="cursor:pointer; margin-top: 20px"
                    onclick="openNav()">Create question
            </button>
        @endcan
        @foreach($posts as $post)
            <div class="card post-card border-light" style="margin-top: 10px">
                <a href="{{ route('post.show', ['post' => $post->id]) }}"
                   style="text-decoration: none; color: #1b1e21">
                    <div class="card-body">
                        <p class="card-text"><small class="text-muted"
                                                    style="font-size: 15px">{{ $post->user->name }}</small></p>
                        <p style="font-size: 25px"><i class="fas fa-question"
                                                      style="margin-right: 9px"></i> {{ $post->question }}</p>
                        <p style="font-size: 18px">{{ $post->detail }}</p>
                    </div>
                </a>
            </div>
        @endforeach
        <a href="" class="card" style="margin-top: 30px; text-decoration: none">
            <p class="text-center" style="margin: 15px; font-size: 20px">Read more</p>
        </a>
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
