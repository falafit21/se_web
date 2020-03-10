@extends('layouts.master')

@section('style')
@endsection
@section('content')
    <div style="margin: 50px">
        <div class="row">
            <div class="col-4">
                <div class="card bg-light">
                    <div class="card-header text-center">
                        <h4>Create post<i class="far fa-user"></i></h4>
                    </div>
                    <div class="card-body text-right">
                        <form action="" method="post" class="text-left">
                            <div class="form-group">
                                <label for="title">title</label>
                                <input type="text" class="form-control" id="title">
                            </div>
                            <div class="form-group">
                                <label for="detail">detail</label>
                                <textarea class="form-control" id="detail" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="choosePet">Choose your pet</label>
                                <select id="choosePet" class="form-control">
                                    <option value="0">dog</option>
                                    <option value="1">cat</option>
                                    <option value="2" selected="selected">giraffe</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="choosePet">Choose Doctor</label>
                                <select id="choosePet" class="form-control">
                                    <option value="0">Dr. A</option>
                                    <option value="1">Dr. B</option>
                                    <option value="2" selected="selected">Dr. C</option>
                                </select>
                                <a href="{{ url('doctorLists') }}" class="btn btn-info">doctor list</a>

                            </div>
                        </form>

                        <h5 style="margin-top: 50px" class="text-left">Pet Symptom</h5>
                        <table class="table text-left">
                            @foreach( $formsQuestion as $formQuestion )
                                <tr>
                                    <td>{{ $formQuestion->question }}</td>
                                    <td>
                                        <div class="text-left">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="yes1" name="customRadio"
                                                       class="custom-control-input">
                                                <label class="custom-control-label" for="yes1">yes</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="no1" name="customRadio"
                                                       class="custom-control-input">
                                                <label class="custom-control-label" for="no1">no</label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        <a href="#" class="btn btn-primary">Post</a>
                    </div>
                </div>

            </div>
            <div class="col-8">
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

        </div>
    </div>




@endsection
