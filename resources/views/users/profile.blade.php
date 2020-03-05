@extends('layouts.master')


@section('style')
<style>
    .card {
        margin: auto;
        margin-bottom: 10px;
        margin-right: 30px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;

    }

    .post-card:hover {
        box-shadow: 0 8px 5px 0 rgb(170, 172, 247);
    }

    #btn-edit,
    #btn-upload {
        margin-top: 20px;
    }

    #user-pic {
        margin-top: 10px;
        margin-bottom: 30px;
    }

    img {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .pet-card:hover {
        box-shadow: 0 8px 16px 0 rgb(245, 245, 156);

    }

    .pet-card {
        margin-bottom: 50px;
    }

    .active {

        color: white;
    }
</style>
@endsection

@section('content')
<div class="container" style="margin-top: 50px">
    <div class="row">
        <div class="col-5">
            <!-- Profile -->
            <div class="card">
                <div class="card-header">
                <h1 style="text-align: center">Profile</h1>
                </div>
                <div class="card-body">
                    <div class="">
                        <div><img id="user-pic" src="https://static.raccweb.com/images/no_image.png" alt=""></div>
                        <h3>Name :</h3>
                        <h3>Email :</h3>
                        <h3>Tel :</h3>
                        <button id="btn-upload" class="btn btn-outline-info">UPLOAD PICTURE</button>
                        <button id="btn-edit" class="btn btn-outline-info" style="margin-left:50px;">EDIT PROFILE</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-7">
            <h2>My Pets</h2>
            <!-- Pet -->
            <div class="row">
                <a href="">
                    <span class="card pet-card" style="width: 11.5rem; ">
                        <span class="card-body">
                            <img width="140" height="140" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Creative-Tail-Animal-dog.svg/1024px-Creative-Tail-Animal-dog.svg.png" alt="">
                        </span>
                    </span>
                </a>
                <a href="">
                    <span class="card pet-card" style="width: 11.5rem;">
                        <span class="card-body">
                            <img width="140" height="140" src="https://image.flaticon.com/icons/png/512/141/141782.png" alt="">
                        </span>
                    </span>
                </a>
                <a href="">
                    <span class="card pet-card" style="width: 11.5rem;">
                        <span class="card-body">
                            <img width="140" height="140" src="https://static.vecteezy.com/system/resources/previews/000/363/962/non_2x/vector-plus-sign-line-black-icon.jpg" alt="">
                        </span>
                    </span>
                </a>
            </div>

            <!-- Post -->
            <h2>My Posts</h2>
            <div class="card post-card">
                <div class="card-body">
                    <h5>Title</h5>
                    <p>This is some text within a card body.</p>
                </div>
            </div>
            <div class="card post-card">
                <div class="card-body">
                    <h5>Title</h5>
                    <p>This is some text within a card body.</p>
                </div>
            </div>
            <div class="card post-card">
                <div class="card-body">
                    <h5>Title</h5>
                    <p>This is some text within a card body.</p>
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