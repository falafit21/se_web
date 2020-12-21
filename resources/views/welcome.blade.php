@extends('layouts.master')
@section('style')

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<!-- Styles -->
<style>
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
<body>
    <div id="app">
    <example-component></example-component>
    </div>
</body>


@endsection
@section('script')
<script >
    $('a[href=#top]').click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 600);
        return false;
    });
    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
            $('.totop a').fadeIn();
        } else {
            $('.totop a').fadeOut();
        }
    });
    function openNav() {
        document.getElementById("mySidenav").style.width = "700px";
        document.getElementById("main").style.marginLeft = "700px";
        document.body.style.backgroundColor = "rgba(0,0,0,0)";
        document.getElementById("upload").reset();
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0px";
        document.getElementById("main").style.marginLeft = "0px";
        document.body.style.backgroundColor = "white";
    }
    $(document).ready(function() {
        $('#image').on('change', function() { //on file input change

            let data = $(this)[0].files; //this file data
            $.each(data, function(index, file) { //loop though each file
                if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                    let fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file) { //trigger function on successful read
                        return function(e) {
                            let img = $('<img/>').addClass('img-thumbnail').attr('src', e.target.result).attr('width', '200px').attr('height', '200px'); //create image element
                            $('#previewImg').append(img); //append image to output element
                        };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });
        });
    });

    let form = document.getElementById('upload');
    let request = new XMLHttpRequest();
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(form);
        request.open('post', '/uploadPostImg');
        request.addEventListener("load", transferComplete);
        request.send(formData);
    });

    function transferComplete(data) {
        console.log(data.currentTarget.response);
        closeNav();
    }
</script>

@endsection