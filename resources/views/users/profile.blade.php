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
</style>
@endsection

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

{{-- create pet--}}
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div style="margin-left: 40px; margin-right: 40px; margin-top: 10px; margin-bottom: 50px;">
        <h2>Create pet </h2>
        <form method="POST" action="{{ route('pet.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control {{ $errors->has('name') ? ' has-error' : '' }}" id="name" name="name" required>
                @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="type">Genre</label>
                <select id="type" class="form-control {{ $errors->has('type') ? ' has-error' : '' }}" name="type" required>
                    @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->type }}</option>
                    @endforeach
                </select>
                @if ($errors->has('type'))
                <span class="help-block">
                    <strong>{{ $errors->first('type') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="gene">Genes</label>
                <select id="gene" class="form-control {{ $errors->has('gene') ? ' has-error' : '' }}" name="gene" required>
                    <optgroup label="Dog gene">
                        @foreach($genes as $gene)
                        @if($gene->pet_type_id == 1)
                        <option value="{{ $gene->id }}">{{ $gene->gene }}</option>
                        @endif
                        @endforeach
                    </optgroup>
                    <optgroup label="Cat gene">
                        @foreach($genes as $gene)
                        @if($gene->pet_type_id == 2)
                        <option value="{{ $gene->id }}">{{ $gene->gene }}</option>
                        @endif
                        @endforeach
                    </optgroup>
                    <optgroup label="Rabbit gene">
                        @foreach($genes as $gene)
                        @if($gene->pet_type_id == 3)
                        <option value="{{ $gene->id }}">{{ $gene->gene }}</option>
                        @endif
                        @endforeach
                    </optgroup>

                </select>
                @if ($errors->has('gene'))
                <span class="help-block">
                    <strong>{{ $errors->first('gene') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="birth-date-input">BirthDate</label>
                <div>
                    <input class="form-control {{ $errors->has('birth-date-input') ? ' has-error' : '' }}" type="date" value="2011-08-19" id="birth-date-input" name="birth-date-input" required>
                    <small id="fileHelp" class="form-text text-muted"></small>
                    @if ($errors->has('birth-date-input'))
                    <span class="help-block">
                        <strong>{{ $errors->first('birth-date-input') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="weight">Weight</label>
                <div>
                    <input type="text" class="form-control {{ $errors->has('weight') ? ' has-error' : '' }}" id="weight" name="weight" required>
                    <small id="fileHelp"> Please answer in Kilograms Unit</small>
                    @if ($errors->has('weight'))
                    <span class="help-block">
                        <strong>{{ $errors->first('weight') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-10">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>
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
                                <td><a href=" " data-toggle="modal" data-target="#changePassword" style="font-size: 18px; color: #F5B041" data-toggle="tooltip" data-placement="top" title="change Password">change password</a></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class=" text-right">
                        <i class="far fa-edit" data-toggle="modal" data-target="#editModal" style="font-size: 18px; color: #F5B041" data-toggle="tooltip" data-placement="top" title="edit profile"></i>
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
                                    @elseif( $pet->petType->type == 'rabbit' )
                                    <img width="80" height="75" src="https://cdn.pixabay.com/photo/2018/12/28/16/27/rabbit-3899900_1280.jpg">
                                    @endif
                                    <h8 style="text-align: center; margin-top:20px">{{$pet->name}}</h8>
                                </span>
                            </span>
                        </a>
                        @endforeach
                    </div>

                    <div class="card" {{ $user->status ? "" : "hidden" }}>
                        <a onclick="openNav()">
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
                <div class="card post-card border-light" style="margin-bottom: 10px">
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

    <!--change Password-->
    <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
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
                                            <td><input id="current-password" type="password" class="form-control" name="current-password" required>

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
                                            <td><input id="new-password" type="password" class="form-control" name="new-password" required>
                                                @if ($errors->has('new-password'))
                                                <span class="help-block"><strong>{{ $errors->first('new-password') }}</strong></span>
                                                @endif</td>
                                        </div>
                                    </tr>
                                    <tr>
                                        <th><label for="new-password-confirm">Confirm New Password</label></th>
                                        <td><input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required></td>
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
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label text-left">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control {{ $errors->has('name') ? ' has-error' : '' }}" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter Name" value="{{$user->name}}" required>
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label text-left">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control {{ $errors->has('email') ? ' has-error' : '' }}" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{$user->email}}" required>
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

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