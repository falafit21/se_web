@extends('layouts.master')
@section('style')

@endsection

@section('content')
<div class="container" style=" margin :0 auto; margin-top: 50px ;">
    <div class="row">
        <div class="col-9">
            <!-- Post -->
            <div class="card " style="width: 52rem;">
                <div class="row">
                    <div class="col-2">
                        <img width="145" height="145" src="https://www.pngitem.com/pimgs/m/24-248226_computer-icons-user-profile-clip-art-login-user.png" alt="">
                        <h5 style="text-align: center">Name</h5>
                    </div>
                    <div class="col">
                        <div class="card-header">Question</div>
                        <div class="card-body">detail</div>

                    </div>
                </div>
            </div>

            <form action="" style="margin-top: 30px;">
                <textarea name="" id="" cols="110" rows="3" placeholder=" Answer..."></textarea>
                <br>
                <button class="btn btn-outline-info">comment</button>
            </form>

            <!-- comment -->
            <div class="card" style="width: 50rem;margin-top: 30px;">
                <div class="row">
                    <div class="col-2">
                        <img width="130" height="130" src="https://www.pngitem.com/pimgs/m/24-248226_computer-icons-user-profile-clip-art-login-user.png" alt="">
                        <h5 style="text-align: center">Name</h5>
                    </div>
                    <div class="col">
                        <div class="card-body">detail</div>

                    </div>
                </div>
            </div>

            <div class="card" style="width: 50rem;margin-top: 30px;">
                <div class="row">
                    <div class="col-2">
                        <img width="130" height="130" src="https://www.pngitem.com/pimgs/m/24-248226_computer-icons-user-profile-clip-art-login-user.png" alt="">
                        <h5 style="text-align: center">Name</h5>
                    </div>
                    <div class="col">
                        <div class="card-body">detail</div>

                    </div>
                </div>
            </div>
            <div class="card" style="width: 50rem;margin-top: 30px;">
                <div class="row">
                    <div class="col-2">
                        <img width="130" height="130" src="https://www.pngitem.com/pimgs/m/24-248226_computer-icons-user-profile-clip-art-login-user.png" alt="">
                        <h5 style="text-align: center">Name</h5>
                    </div>
                    <div class="col">
                        <div class="card-body">detail</div>

                    </div>
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