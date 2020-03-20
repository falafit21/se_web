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
                        <button type="button" class="btn btn-primary text-left" style="margin: 20px">edit pet profile
                        </button>
                        <button type="button" class="btn btn-primary text-right" style="margin: 20px">change password
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-8">
                <h2>Request Question</h2>
                @foreach($posts as $post)
                    @if($post->requestDoctor->role == 'doctor' && $post->requestDoctor->id == $doctor->user->id)
                        <a href="{{ route('post.show', ['post' => $post->id]) }}"
                           style="text-decoration: none; color: #1b1e21">
                            <div class="card post-card border-light" style="margin-bottom: 10px">
                                <div class="card-body">
                                    <p class="card-text">
                                        <small class="text-muted" style="font-size: 15px">
                                            {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                        </small>
                                    </p>
                                    <p style="font-size: 22px"><i class="fas fa-question"
                                                                  style="margin-right: 9px"></i> {{ $post->question }}
                                    </p>
                                    <p style="font-size: 15px">{{ $post->detail }}</p>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
@endsection
