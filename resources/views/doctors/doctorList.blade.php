@extends('layouts.master')
@section('style')
    <style>
        /*.card {*/
        /*    padding-top: 20px;*/
        /*    margin: 10px 0 20px 0;*/
        /*    background-color: rgba(214, 224, 226, 0.2);*/
        /*    border-top-width: 0;*/
        /*    border-bottom-width: 2px;*/
        /*    -webkit-border-radius: 3px;*/
        /*    -moz-border-radius: 3px;*/
        /*    border-radius: 3px;*/
        /*    -webkit-box-shadow: none;*/
        /*    -moz-box-shadow: none;*/
        /*    box-shadow: none;*/
        /*    -webkit-box-sizing: border-box;*/
        /*    -moz-box-sizing: border-box;*/
        /*    box-sizing: border-box;*/
        /*}*/

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

        .desc{
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



    </style>
@endsection

@section('content')
    <div style="margin: 50px">
        <div style="color:darkgrey; margin-top:2em; font-weight: bolder; text-align: center; margin-bottom: 30px;">
            <h1>Doctors lists</h1>
        </div>
        <div class="row">
            @for ($i = 0; $i < 10; $i++)
                <div class="col-lg-4">
                    <div class="card hovercard text-center" style="margin-bottom: 20px">
                        <div class="card-header text-center">
                            <h4>Suvicha narongchai</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless text-left">
                                <tbody style="color: black">
                                <tr>
                                    <th scope="row">PHONE NUMBER</th>
                                    <td>084 5858267</td>
                                </tr>
                                <tr>
                                    <th scope="row">EMAIL</th>
                                    <td>kitpavin@gmail.com</td>
                                </tr>
                                <tr>
                                    <th scope="row">GRADUATED FROM</th>
                                    <td>Kasetart University</td>
                                </tr>
                                <tr>
                                    <th scope="row">LICENSE NUMBER</th>
                                    <td>1264597846</td>
                                </tr>
                                <tr>
                                    <th scope="row">WORK AT</th>
                                    <td>Kasetsart Unversity</td>
                                </tr>
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-primary" style="margin: 20px">view Doctor profile</button>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>

@endsection
