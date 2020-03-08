@extends('layouts.master')
{{--@section('style')--}}
{{--<style>--}}
{{--    .card {--}}
{{--        margin: auto;--}}
{{--        margin-bottom: 10px;--}}
{{--        margin-right: 30px;--}}
{{--        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);--}}
{{--        transition: 0.3s;--}}
{{--    }--}}
{{--    img {--}}
{{--        display: block;--}}
{{--        margin-left: auto;--}}
{{--        margin-right: auto;--}}
{{--    }--}}
{{--    .active {--}}
{{--        color: white;--}}
{{--    }--}}
{{--</style>--}}
{{--@endsection--}}

@section('content')
    <div style="margin: 50px">
        <div class="row">
            <div class="col-4">
                <div class="card hovercard text-center" style="margin-bottom: 20px">
                    <div class="card-header text-center">
                        <h4>My Profile</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless text-left">
                            <tbody style="color: black">
                            <tr>
                                <th scope="row">NAME</th>
                                <td>Fish Shukishi</td>
                            </tr>
                            <tr>
                                <th scope="row">EMAIL</th>
                                <td>Fish@shukishi.com</td>
                            </tr>
                            <tr>
                                <th scope="row">STATUS</th>
                                <td>Normal</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-warning">edit profile</button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-primary">change password</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card hovercard text-center" style="margin-bottom: 20px">
                    <div class="card-header text-center">
                        <h4>Create your pet</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Pet 1's name</li>
                            <li class="list-group-item">Pet 2's name</li>
                            <li class="list-group-item">Pet 3's name</li>

                        </ul>
                    <div class="card">
                        <a href="{{ route('pets.create') }}" style=""><button class="btn btn-info btn-block">create</button></a>
                    </div>

                    </div>
                </div>
            </div>
            <div class="col-8">
            {{--            <h2>My Pets</h2>--}}
            {{--            <!-- Pet -->--}}
            {{--            <div class="row">--}}
            {{--                <a href="{{ route('pets.index') }}">--}}
            {{--                    <span class="card pet-card" style="margin-right: 25px; ">--}}
            {{--                        <span class="card-body">--}}
            {{--                            <img width="140" height="140" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Creative-Tail-Animal-dog.svg/1024px-Creative-Tail-Animal-dog.svg.png" alt="">--}}
            {{--                        </span>--}}
            {{--                    </span>--}}
            {{--                </a>--}}
            {{--                <a href="{{ route('pets.index') }}">--}}
            {{--                    <span class="card pet-card" style="margin-right: 25px; ">--}}
            {{--                        <span class="card-body">--}}
            {{--                            <img width="140" height="140" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Creative-Tail-Animal-dog.svg/1024px-Creative-Tail-Animal-dog.svg.png" alt="">--}}
            {{--                        </span>--}}
            {{--                    </span>--}}
            {{--                </a>--}}
            {{--                <a href="{{ route('pets.index') }}">--}}
            {{--                    <span class="card pet-card" style="margin-right: 25px; ">--}}
            {{--                        <span class="card-body">--}}
            {{--                            <img width="140" height="140" src="https://image.flaticon.com/icons/png/512/141/141782.png" alt="">--}}
            {{--                        </span>--}}
            {{--                    </span>--}}
            {{--                </a>--}}
            {{--                <a href="{{ route('pets.create') }}">--}}
            {{--                    <span class="card pet-card" style="margin-right: 25px; ">--}}
            {{--                        <span class="card-body">--}}
            {{--                            <img width="140" height="140" src="https://static.vecteezy.com/system/resources/previews/000/363/962/non_2x/vector-plus-sign-line-black-icon.jpg" alt="">--}}
            {{--                        </span>--}}
            {{--                    </span>--}}
            {{--                </a>--}}
            {{--            </div>--}}

            <!-- Post -->
                <h2>My Posts</h2>
                <div class="card post-card" style="margin-bottom: 10px">
                    <div class="card-body row">
                        <div class="col-11">
                            <h5>My post1</h5>
                            <div>post detail</div>
                        </div>
                        <div class="col-1" style="display: flex; justify-content: center; align-items: center;">
                            <button class="btn btn-warning">edit</button>
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
