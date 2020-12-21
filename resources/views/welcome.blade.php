@extends('layouts.master')
@section('style')

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<!-- Styles -->
<style>
    html,
    body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links>a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
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