@extends('layouts.master')
    <style>

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            border-radius: 50%;
        }
    </style>
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
    <div style="margin: 50px; color: white">
        <div class="row">
            <div class="col-4">
                <div class="card bg-light">
                    <h4 class="card-header text-center" style="color: black">
                        Doctor profile
                    </h4>
                    <div class="card-body">
                        <img src="{{ Storage::url($user->img_path) }}" class="center" alt="" width="120"
                             height="120"
                             style="margin-bottom: 10px">
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
                            <tr>
                                <th scope="row">ANSWERED QUESTION</th>
                                <td>
                                    <a type="button" class="btn btn-info btn-block" data-toggle="modal"
                                       data-target="#answeredQuestion">
                                        detail
                                        {{-- <span class="badge badge-light">{{ count($answeredPost) }}</span>--}}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">PASSWORD</th>
                                <td><a href=" " data-toggle="modal" data-target="#changePassword"
                                       style="font-size: 18px; color: #F5B041" data-toggle="tooltip"
                                       data-placement="top" title="change Password">change password</a></td>

                            </tr>
                            </tbody>
                        </table>
                        <div class=" text-right">
                            <i class="far fa-edit" data-toggle="modal" data-target="#editProfile"
                               style="font-size: 18px; color: #F5B041" data-toggle="tooltip" data-placement="top"
                               title="edit profile"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <h2>Question Request
                </h2>
                @foreach($requestQuestion as $post)
                    @if($post->requestDoctor->role == 'doctor' && $post->requestDoctor->id == $doctor->user->id )
                        <div class="card border-light post-card" style="margin-bottom: 10px">
                            <div class="card-body">
                                <a href="{{ route('post.show', ['post' => $post->id]) }}"
                                   style="text-decoration: none; color: #1b1e21; margin-top: 10px"
                                   class="container">
                                    <div>Question :</div>
                                    <div class="row">
                                        <div class="col-8" style="font-size: 25px;">
                                            {{ $post->question }}
                                        </div>
                                        <p class="text-muted text-right col-4" style="font-size: 15px;">
                                            <i class="fas fa-user" style="margin-right: 6px"></i>
                                            {{ $post->user->name }}
                                            <i class="fas fa-dog"
                                               style="margin-right: 5px; margin-left: 4px"></i>
                                            {{ $post->pet->name }}
                                        </p>
                                    </div>
                                    <p style="font-size: 18px">{{ $post->detail }}</p>
                                </a>
                                <form
                                    action="{{  route('post.comment.store.new', ['post_id' => $post->id]) }}"
                                    method="POST" {{ $user->status ? "" : "hidden" }} class="container"
                                    style="margin-bottom: 10px;">
                                    @csrf
                                    <div class="row">
                                        <div class="col-10">
                                            <label for="answer" style="color: black">Answers : </label>
                                            <textarea name="answer" id="answer"
                                                      style="width: 100%; background-color: #EAECEE"
                                                      rows="2"
                                                      class="form-control @error('answer') is-invalid @enderror">{{ old('answer') }}</textarea>
                                            @error('answer')
                                            <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="col-2 text-right"
                                             style="display: flex; justify-content: center; align-items: center;">
                                            <button class="btn btn-warning" type="submit">answer</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    @endif
                @endforeach

            </div>
        </div>


    </div>
    <!-- Modal edit Profile -->
    <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('user.update.doctor',['doctor_id'=>$doctor->id])}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <table class="table table-borderless">
                            <tbody style="color: black">
                            <tr>
                                <th>Name</th>
                                <td>
                                    <input type="name"
                                           class="form-control {{ $errors->has('name') ? ' has-error' : '' }}" id="name"
                                           name="name" aria-describedby="emailHelp" placeholder="Enter Name"
                                           value="{{$doctor->user->name}}"
                                           oninvalid="this.setCustomValidity('Please enter your name')"
                                           oninput="setCustomValidity('')" required>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>E-mail</th>
                                <td><input type="email"
                                           class="form-control {{ $errors->has('email') ? ' has-error' : '' }}"
                                           id="email" name="email" aria-describedby="emailHelp"
                                           placeholder="Enter email" value="{{$doctor->user->email}}"
                                           oninvalid="this.setCustomValidity('Please enter your email')"
                                           oninput="setCustomValidity('')" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td><input type="text"
                                           class="form-control {{ $errors->has('phone_number') ? ' has-error' : '' }}"
                                           id="phone_number" name="phone_number" aria-describedby="emailHelp"
                                           placeholder="Enter your phone number" value="{{$doctor->phone_number}}"
                                           oninvalid="this.setCustomValidity('Please enter your phone number')"
                                           oninput="setCustomValidity('')" required>

                                    @if ($errors->has('phone_number'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Work at</th>
                                <td><input type="text"
                                           class="form-control {{ $errors->has('work_at') ? ' has-error' : '' }}"
                                           id="work_at" name="work_at" aria-describedby="emailHelp"
                                           placeholder="Enter your work place" value="{{$doctor->work_at}}"
                                           oninvalid="this.setCustomValidity('Please enter your work place')"
                                           oninput="setCustomValidity('')" required>
                                    @if ($errors->has('work_at'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('work_at') }}</strong>
                                    </span>
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!--change Password-->
    <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
         aria-hidden="true">
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
                                        <td><input id="current-password" type="password" class="form-control"
                                                   name="current-password"
                                                   oninvalid="this.setCustomValidity('Please enter your current password')"
                                                   oninput="setCustomValidity('')" required>
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
                                        <td><input id="new-password" type="password" class="form-control"
                                                   name="new-password"
                                                   oninvalid="this.setCustomValidity('Please enter your new password')"
                                                   oninput="setCustomValidity('')" required>
                                            @if ($errors->has('new-password'))
                                                <span
                                                    class="help-block"><strong>{{ $errors->first('new-password') }}</strong></span>
                                            @endif</td>
                                    </div>
                                </tr>
                                <tr>
                                    <th><label for="new-password-confirm">Confirm New Password</label></th>
                                    <td><input id="new-password-confirm" type="password" class="form-control"
                                               name="new-password_confirmation"
                                               oninvalid="this.setCustomValidity('Please confirm your new password')"
                                               oninput="setCustomValidity('')" required></td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- answeres question model--}}
    <div class="modal fade bd-example-modal-xl" id="answeredQuestion" tabindex="-1" role="dialog"
         aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Answered question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="model-body container" style="margin-top: 10px">
                    @foreach($answeredPost as $post)
                        @if($post->requestDoctor->role == 'doctor' && $post->requestDoctor->id == $doctor->user->id)
                            <a href="{{ route('post.show', ['post' => $post->id]) }}"
                               style="text-decoration: none; color: #1b1e21;" target="_blank">
                                <div class="card post-card" style="margin-bottom: 10px ;">
                                    <div class="card-body">
                                        <div class="row">
                                            <p class="col-9" style="font-size: 25px;">
                                                {{ $post->question }}
                                            </p>
                                            <p class="text-muted text-right col-3" style="font-size: 15px;">
                                                <i class="fas fa-user" style="margin-right: 6px"></i>
                                                {{ $post->user->name }}
                                                <br>
                                                <i class="fas fa-dog" style="margin-right: 6px"></i>
                                                {{ $post->pet->name }}
                                            </p>
                                        </div>
                                        <div style="font-size: 18px">{{ $post->detail }}</div>
                                        <a onclick="myFunction({{$post->id}})" style="margin-top: 20px;"
                                           type="button">
                                            <i style="font-size: 20px; margin-right: 5px; margin-bottom: 20px"
                                               class="far fa-comment"></i> My answer
                                        </a>
                                        <div id="dots-{{$post->id}}"></div>
                                        <div id="more-{{$post->id}}" style="display: none; margin-top: 20px">
                                            <ul class="list-group list-group-flush">
                                                @foreach($post->comments as $comment)
                                                    @if($comment->user_id == $user->id)
                                                        <li class="list-group-item"
                                                            style="background-color: #EAECEE">
                                                            {{--                                                            <h6>--}}
                                                            {{--                                                                <i class="fas fa-stethoscope"--}}
                                                            {{--                                                                   style="margin-right: 10px; font-size: 20px"></i>{{ $comment->user->name }}--}}
                                                            {{--                                                            </h6>--}}
                                                            <div class="row">
                                                                <h4 style="margin-left: 18px; margin-top: 10px">{{ $comment->comment }}</h4>

                                                            </div>
                                                            {{ $comment->created_at->diffForHumans() }}
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>
        function myFunction($i) {
            var dots = document.getElementById("dots-" + $i);
            var moreText = document.getElementById("more-" + $i);
            // var btnText = document.getElementById("myBtn-"  . $i);
            if (dots.style.display === "none") {
                dots.style.display = "inline";
                // btnText.innerHTML = "Read more";
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                // btnText.innerHTML = "Read less";
                moreText.style.display = "inline";
            }
        }
    </script>
@endsection
