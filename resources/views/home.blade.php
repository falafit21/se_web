@extends('layouts.master')

@section('content')
@section('style')
<style>
    h1 {
        color: brown;
   
    }

    #carousel-food {
        margin-bottom: 50px;
        margin-top: 30px;
    }

    .card {
        margin: auto;
        margin-bottom: 50px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
    }
    .body{
        background-color: #FFF9F0;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 23, 83, 0.671);
    }

    .active {

        color: white;
    }
</style>
@endsection



@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
@endsection



@endsection