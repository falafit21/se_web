@extends('layouts.master')

@section('style')
@endsection
@section('content')
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-5">
                <div class="card">
                    <form action="" method="post"></form>
                    <div>
                        <label for="title">Title</label>
                        <input type="text" name="title" id="">
                    </div>
                    <div>
                        <label for="detail">Detail</label>
                        <textarea name="detail" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div>
                        <label for="choose your pet">Choose your pet</label>
                        <select name="number">
                            <option text="0">dog</option>
                            <option value="1">cat</option>
                            <option value="2" selected="selected">giraffe</option>
                        </select>

                    </div>
                    <div>
                        <label for="choose your pet">Choose Doctor</label>
                        <select name="number">
                            <option text="0">Dr. A</option>
                            <option value="1">Dr. B</option>
                            <option value="2" selected="selected">Dr. C</option>
                        </select>

                    </div>



                </div>


            </div>

        </div>
    </div>




@endsection
