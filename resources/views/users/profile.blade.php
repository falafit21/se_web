@extends('layouts.master')
@section('style')
    <style>
        /* .card {
                margin: auto;
                margin-bottom: 10px;
                margin-right: 30px;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                transition: 0.3s;
            } */
        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .active {
            color: white;
        }
    </style>
@endsection

@section('content')
    <div style="margin: 50px">
        <div class="row">
            <div class="col-4">
                <!-- Profile -->
                <div class="card border-light text-center" style="margin-bottom: 20px">
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
                                <td><a href="" data-target="#changePW" data-toggle="modal" type="button" data-toggle="tooltip" data-placement="top" title="edit Password">change password</a></td>
                            </tr>
                            </tbody>
                        </table>
                        <div class=" text-right">
                            <i class="far fa-edit" data-toggle="modal" data-target="#editModal" style="font-size: 18px; color: #F5B041" type="button" data-toggle="tooltip" data-placement="top" title="edit profile"></i>
                        </div>
                    </div>
                </div>



                <!-- Pet -->
                @can('viewOnlyUser', App\User::class)
                    <div class="card border-light text-center" style="margin-bottom: 20px">
                        <div class="card-header text-center">
                            <h4 class="">My Pets</h4>
                        </div>
                        <div class="card-body ">
                            <div class="row row-cols-1 row-cols-md-3">
                                @foreach($user->pets as $pet)
                                    <a href="{{ route('pet.show', ['pet'=>$pet->id]) }}" style="text-decoration: none; color: #1b1e21">
                            <span class=" pet-card">
                                <span class="card-body">
                                    @if( $pet->petType->type == 'dog' )
                                        <img width="80" height="75" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Creative-Tail-Animal-dog.svg/1024px-Creative-Tail-Animal-dog.svg.png">
                                    @elseif( $pet->petType->type == 'cat' )
                                        <img width="80" height="75" src="https://image.flaticon.com/icons/png/512/141/141782.png">
                                    @endif
                                    <h8 style="text-align: center; margin-top:20px">{{$pet->name}}</h8>
                                </span>
                            </span>
                                    </a>
                                @endforeach
                            </div>

                            <div class="card">
                                <a href="{{ route('pet.create') }}" style="">
                                    <button class="btn btn-info btn-block">create</button>
                                </a>
                            </div>

                        </div>
                    </div>
                @endcan
            </div>
            <div class="col-8">
                <h2 style="color: white">My Posts</h2>
                @foreach($user->posts as $post)
                    <a href="{{ route('post.show', ['post' => $post->id]) }}" style="text-decoration: none; color: #1b1e21">
                        <div class="card post-card border-light" style="margin-bottom: 5px">
                            <div class="card-body">
                                <p class="card-text">
                                    <small class="text-muted" style="font-size: 15px">
                                        {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}

                                    </small>
                                </p>
                                <p style="font-size: 22px"><i class="fas fa-question" style="margin-right: 9px"></i> {{ $post->question }}</p>
                                <p style="font-size: 15px">{{ $post->detail }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        <!--Edit Password-->
        <div class="modal fade" id="changePW" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="form-horizontal" method="POST" action="{{ route('user.changePassword',['user'=>$user->id])}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">Current Password</label>

                            <div class="col-md-6">
                                <input id="current-password" type="password" class="form-control" name="current-password" required>

                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 control-label">New Password</label>

                            <div class="col-md-6">
                                <input id="new-password" type="password" class="form-control" name="new-password" required>

                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>

                            <div class="col-md-6">
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Change Password
                                </button>
                            </div>
                        </div>
                    </form>



{{--                    <form action="{{ route('user.update',['user'=>$user->id])}}" method="post">--}}
{{--                        @method('PUT')--}}
{{--                        @csrf--}}
{{--                        <div class="modal-header">--}}
{{--                            <h5 class="modal-title" id="editModalLabel">Change Password</h5>--}}
{{--                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                <span aria-hidden="true">&times;</span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                        <div class="modal-body">--}}
{{--                            <div class="form-group row">--}}
{{--                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--                                    @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="modal-footer">--}}
{{--                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>--}}
{{--                            <button type="submit" class="btn btn-primary">Save changes</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}

                </div>
            </div>
        </div>


        <!-- Modal edit -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('user.update',['user'=>$user->id])}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="name" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter Name" value="{{$user->name}}">
                            <br>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{$user->email}}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
@endsection
