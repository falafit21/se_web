@extends('.layouts.master')
@section('style')
    <style>

        .card {
            padding-top: 20px;
            margin: 10px 0 20px 0;
            background-color: rgba(214, 224, 226, 0.2);
            border-top-width: 0;
            border-bottom-width: 2px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

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

    <div class="container">
        <div style="color:darkgrey;margin-top:2em;font-weight: bolder;text-align: center;">
            <h1>Doctors</h1>
        </div>

        <div class="row">

            @for ($i = 0; $i < 10; $i++)
                <div class="col-lg-4">

                    <div class="card hovercard" style="height: 400px">

                        <div class="avatar" style="text-align: center">
                            <img src="{{ url('images/blueBg.png') }}" alt="">
                        </div>
                        <div>
                            <div class="title" style="font-weight: bold;font-size: 26px;text-align: center;">
                                <a target="_blank" href="">Dr.Weerachai  Wutiwong</a>
                            </div>


                            <div  style="color: #737373 ; font-size: 18px;margin-top: 0.5em;margin-left: 4em;">
                                <div>
                                    <span><i class="fa fa-id-card-o" aria-hidden="true"></i></span>
                                    <span class="desc">01-7050/2552</span>
{{--                                    http://www.vetcouncil.or.th/index.php?option=com_content&view=article&id=183--}}
                                </div>

                                <div>
                                    <span>
                                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                    </span>
                                    <span class="desc">Kasetsart U.</span>
                                </div>

                                <div>
                                    <span><i class="fa fa-hospital-o" aria-hidden="true"></i></span>
                                    <span class="desc">Parichart Animal Hospital</span>
                                </div>
                                <div><span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                    <span class="desc">dr.a@gmail.com</span>
                                </div>

                            </div>
                            <div style="text-align: center;">
                                <button type="button" class="btn btn-outline-secondary" style="width: 80px;margin-top: 0.5em;">DBTVM</button>
                            </div>
                        </div>

                    </div>

                </div>
            @endfor

        </div>
    </div>


@endsection
