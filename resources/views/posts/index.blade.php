@extends('layouts.master')

@section('style')
    <style>

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
            <h2>Create post</h2>
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
                    <select id="chooseDoc" class="form-control" name="chooseDoc">
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                        @endforeach
                    </select>
                    <a href="{{ url('doctorLists') }}" target="_blank" class="btn btn-info">doctor list</a>
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
                                               class="custom-control-input">
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

    <div class="container" style="margin-top: 50px">
        @can('create', \App\Post::class)
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Create post</span>
        @endcan
        <h2>Tips</h2>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" style="background-color: #636b6f; height: 250px; ">
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

        <h2 style="margin-top: 50px">All Questions</h2>

        @foreach($posts as $post)
            <div class="card post-card" style="margin-top: 10px">
                <a href="{{ route('post.show', ['post' => $post->id]) }}">
                    <h4 class="card-header">
                        {{ $post->question }}
                    </h4>
                    <div class="card-body">

                        <p>{{ $post->detail }}</p>
                    </div>
                </a>
                <div class="card-footer text-muted text-right">
                    {{ $post->user->name }}
                </div>
            </div>
        @endforeach
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
