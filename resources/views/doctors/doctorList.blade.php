@extends('layouts.master')
@section('style')
    <style>

        .card .card-heading.image img {
            display: inline-block;
            width: 46px;
            height: 46px;
            margin-right: 15px;
            vertical-align: top;
            border: 0;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
        }

        .card .card-heading.image .card-heading-header h3 {
            margin: 0;
            font-size: 14px;
            line-height: 16px;
            color: #262626;
        }

        .card .card-heading.image .card-heading-header span {
            font-size: 12px;
            color: #737373;
        }

        .card .card-media img {
            max-width: 100%;
            max-height: 100%;
        }

        .desc {
            margin-left: 12px;

        }

        .card.hovercard {
            position: relative;
            padding-top: 0;
            overflow: hidden;
            /*text-align: center;*/
            background-color: rgba(214, 224, 226, 0.2);
        }

        .card.hovercard .avatar img {
            width: 140px;
            height: 140px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border: 5px solid rgba(255, 255, 255, 0.5);
            margin-top: 1.5em;
        }
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            border-radius: 50%;
        }
    </style>
@endsection

@section('content')
    <div style="margin: 50px">
        <div style="color:white; margin-top:2em; font-weight: bolder; text-align: center; margin-bottom: 30px;">
            <h1>Doctors lists</h1>
        </div>
        <div class="row">
            @foreach($doctors as $doctor)
                <div class="col-lg-4">
                    <div class="card border-light text-center" style="margin-bottom: 20px">
                        <div class="card-header text-center" style="font-size: 20px">
                            {{ $doctor->name }}
                        </div>
                        <div class="card-body">
                            <img src="{{Storage::url($doctor->img_path)}}" class="center" alt="" width="120" height="120" style="margin-bottom: 10px">

                            <table class="table table-borderless text-left">
                                <tbody style="color: black">
                                <tr>
                                    <th scope="row">PHONE NUMBER</th>
                                    <td>{{ $doctor->doctorInfo->phone_number }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">EMAIL</th>
                                    <td>{{ $doctor->email }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">GRADUATED FROM</th>
                                    <td>{{ $doctor->doctorInfo->graduated }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">LICENSE NUMBER</th>
                                    <td>{{ $doctor->doctorInfo->license_number }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">WORK AT</th>
                                    <td>{{ $doctor->doctorInfo->work_at }}</td>
                                </tr>
                                </tbody>
                            </table>
                            {{--                            <a href="{{ url('docProfile') }}" class="btn btn-primary" style="margin: 20px">view Doctor profile</a>--}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
