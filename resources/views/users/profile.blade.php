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
            <div class="card hovercard text-center" style="margin-bottom: 20px">
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
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal">edit profile</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-primary">change password</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pet -->
            <div class="card hovercard text-center" style="margin-bottom: 20px">
                <div class="card-header text-center">
                    <h4>My Pets</h4>
                </div>
                <div class="card-body">
                    @foreach($user->pets as $pet)
                    <a href="{{ route('pet.show',['pet'=>$pet->id]) }}">
                        <span class="card pet-card" style="">
                            <span class="card-body">
                                @if($pet->petType->type == 'dog')
                                <img width="80" height="75" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Creative-Tail-Animal-dog.svg/1024px-Creative-Tail-Animal-dog.svg.png" alt="">
                                @elseif($pet->petType->type == 'cat')
                                <img width="80" height="75" src="https://image.flaticon.com/icons/png/512/141/141782.png" alt="">
                                @endif
                                <h8 style="text-align: center; margin-top:5px">{{$pet->name}}</h8>
                            </span>
                        </span>
                    </a>
                    @endforeach

                    <div class="card">
                        <a href="{{ route('pet.create') }}" style=""><button class="btn btn-info btn-block">create</button></a>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-8">

            <!-- Pet -->
            <!-- <h2>My Pets</h2>
            <div class="row">
                <a href="">
                    <span class="card pet-card" style="margin-right: 25px; ">
                        <span class="card-body">
                            <img width="140" height="140" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Creative-Tail-Animal-dog.svg/1024px-Creative-Tail-Animal-dog.svg.png" alt="">
                        </span>
                    </span>
                </a>
                <a href="">
                    <span class="card pet-card" style="margin-right: 25px; ">
                        <span class="card-body">
                            <img width="140" height="140" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Creative-Tail-Animal-dog.svg/1024px-Creative-Tail-Animal-dog.svg.png" alt="">
                        </span>
                    </span>
                </a>
                <a href="">
                    <span class="card pet-card" style="margin-right: 25px; ">
                        <span class="card-body">
                            <img width="140" height="140" src="https://image.flaticon.com/icons/png/512/141/141782.png" alt="">
                        </span>
                    </span>
                </a>
                <a href="">
                    <span class="card pet-card" style="margin-right: 25px; ">
                        <span class="card-body">
                            <img width="140" height="140" src="https://static.vecteezy.com/system/resources/previews/000/363/962/non_2x/vector-plus-sign-line-black-icon.jpg" alt="">
                        </span>
                    </span>
                </a>
            </div> -->

            <!-- Post -->
            <h2>My Posts</h2>
            @foreach($user->posts as $post)
            <div class="card post-card" style="margin-bottom: 10px">
                <div class="card-body row">
                    <div class="col-11">
                        <h5>$post->question</h5>
                        <div>$post->detail</div>
                    </div>
                    <div class="col-1" style="display: flex; justify-content: center; align-items: center;">
                        <button class="btn btn-warning">edit</button>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Name">
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
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
