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

        #loadMore:hover {
            background-color: #fff;
            color: #33739E;
        }

        #loadMore {
            text-align: center;
            background-color: #33739E;
            color: #fff;
            transition: all 600ms ease-in-out;
            -webkit-transition: all 600ms ease-in-out;
            -moz-transition: all 600ms ease-in-out;
            -o-transition: all 600ms ease-in-out;
        }
        .bg {


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

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner bg" style="height: 325px;background-color: #818182">
            <div class="carousel-item active" id="couBg">
{{--                <img src="/images/petTipsBg1.png" style="max-height: 325px;width: 1000px"/>--}}
            </div>
            @foreach( $petTips as $tip )
                <div class="carousel-item ">
                    <div class="container"
                         style=" padding-top:2em;color: #ffffff;margin-left: 2rem;padding-right:6em;">
                        <div>
                            <h3 style="text-align: center;margin-top: 2.5em">{{$tip->title}}</h3>
                        </div>
                        <div>
                            <h4 style="text-align: center;">{{$tip->detail}}</h4>
                        </div>
                    </div>
                </div>
            @endforeach

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
    {{--    @endcan--}}

    <div class="" style="margin: 50px">
        @can('viewAny', App\User::class, App\PetTip::class)
        @endcan

        @can('create', \App\Post::class)
            <button type="button" class="btn btn-warning btn-lg btn-block" style="cursor:pointer; margin-top: 20px"
                    onclick="openNav()">Create question
            </button>
        @endcan
        @foreach($posts as $post)
            <div class="card post-card border-light abc" style="margin-top: 10px">
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
        <a href="" class="card" id="loadMore" style="margin-top: 30px; text-decoration: none">
            <p class="text-center" style="margin: 15px; font-size: 20px">Read more</p>
        </a>

        <p class="totop" style="text-align: right">
            <a href="#top">Back to top</a>
        </p>
    </div>
@endsection

@section('script')

    <script>

        $('a[href=#top]').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 600);
            return false;
        });

        $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('.totop a').fadeIn();
            } else {
                $('.totop a').fadeOut();
            }
        });
    </script>
@endsection

