@extends('layouts.master')
@section('content')
    <div style="margin: 50px">
        <div class="row">
            <div class="col-4">
                <div class="card bg-light">
                    <div class="card-header text-center">
                        <h4>pet profile <i class="far fa-user" style="margin-left: 10px"></i></h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody style="color: black">
                            <tr>
                                <th scope="row">TYPE</th>
                                <td>{{$pet->petType->type}}</td>
                            </tr>
                            <tr>
                                <th scope="row">NAME</th>
                                <td>{{$pet->name}}</td>
                            </tr>
                            <tr>
                                <th scope="row">BIRTH DATE</th>
                                <td>{{$pet->birth_date}}</td>
                                <!-- <td>15 oct 1997</td> -->
                            </tr>
                            <tr>
                                <th scope="row">WEIGHT</th>
                                <td>
                                    {{$pet->weight}}
{{--                                    <span class="row" style="width: 250px;">--}}

                                        <button type="button" class="btn btn-primary col-4" data-toggle="modal" data-target="#myModal" style="width: 250px; margin-left: 1rem;">Update</button>
                                        <div id="myModal" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
    <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Update your pet weight</h4>
                                                    <a href=""><button type="button" class="close" data-dismiss="modal">&times;</button></a>

                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <form action="">

                                                            <div class="form-group row">
                                                                <label for="weight" class="col-sm-4 col-form-label">Weight</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="weight" value="{{old('weight',$pet->weight)}}">
                                                                </div>
                                                            </div>

                                                        </form>
                                                    </div>



                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Update</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                                </div>
                                            </div>

                                            </div>
                                        </div>
{{--                                    </span>--}}
                                </td>
                            </tr>
                            <tr>
                                <th>STATUS</th>
                                <td>{{$pet->status}}</td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                    <a href="/pet/{{$pet->id}}/edit"><button type="button" class="btn btn-primary col-4" style="margin: 20px">edit pet profile</button></a>
                </div>
            </div>
            <div class="col-8">
                <h2>vaccines Schedule</h2>
                <div class="card  bg-light text-center">
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody style="color: black">

                            <tr class="text-center">
                                <th scope="row"></th>
                                <td>Received Date</td>
                                <td>Expire Date</td>
                            </tr>

                            @foreach($vaccines as $vaccine)
                            <tr>
                                <th scope="row">{{ $vaccine->name }}</th>
                                <td>

                                        <input type="date" class="form-control" placeholder="MM/DD/YYYY">

                                </td>
                                <td><input type="text" class="form-control"></td>
                            </tr>
                            @endforeach


                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary col-4" data-toggle="modal" data-target="#add" style="width: 250px; margin-left: 1rem;">Add Vaccine</button>

                        <div id="add" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add Vaccine</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <form>
                                                <div class="form-group row">
                                                    <label for="vaccineName" class="col-sm-4 col-form-label">Vaccine Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="vaccineName">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="received" class="col-sm-4 col-form-label">Received Date</label>
                                                    <div class="col-sm-8">

                                                            <input type="date" class="form-control"  name="date" placeholder="MM/DD/YYYY" id="receive">

                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <label for="expire" class="col-sm-4 col-form-label">Expire Date</label>
                                                    <div class="col-sm-8">
                                                            <input type="date" class="form-control" name="date" placeholder="MM/DD/YYYY" id="expire">
                                                    </div>
                                                </div>

                                            </form>

                                        </div>



                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Add</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>


        $('.datepicker').pickadate();

    </script>

@endsection
