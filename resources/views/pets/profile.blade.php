@extends('layouts.master')
@section('content')
    <div style="margin: 50px">
        <div class="row">
            <div class="col-4">
                <div class="card bg-light">
                    <div class="card-header text-center" style="font-size: 20px">
                       pet profile
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody style="color: black">
                            <tr>
                                <th scope="row">TYPE</th>
                                <td>Dog</td>
                            </tr>
                            <tr>
                                <th scope="row">NAME</th>
                                <td>Mashi</td>
                            </tr>
                            <tr>
                                <th scope="row">BIRTH DATE</th>
                                <td>15 oct 1997</td>
                            </tr>
                            <tr>
                                <th scope="row">WEIGHT</th>
                                <td>
                                    <span class="row" style="width: 250px; background-color: #93f8fc">
                                        <input type="text" class="form-control col-8">
                                        <button type="button" class="btn btn-primary col-4">คำนวณ</button>
                                    </span>
                                </td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                    <button type="button" class="btn btn-primary col-4" style="margin: 20px">edit pet profile</button>
                </div>
            </div>
            <div class="col-8">
                <h2>vaccines table</h2>
                <div class="card text-white bg-light text-center">
                    <div class="card-body" >
                        <table class="table table-borderless">
                            <tbody style="color: black">
                            <tr class="text-center">
                                <th scope="row"></th>
                                <td>ได้รับวันที่</td>
                                <td>หมดอายุวันที่</td>
                            </tr>
                            <tr>
                                <th scope="row">vaccines 1</th>
                                <td><div class="input-append date form_datetime">
                                        <input size="16" type="text" value="" readonly>
                                        <span class="add-on"><i class="icon-th"></i></span>
                                    </div></td>
                                <td><input type="text" class="form-control"></td>
                            </tr>
                            <tr>
                                <th scope="row">vaccines 2</th>
                                <td><input type="text" class="form-control"></td>
                                <td><input type="text" class="form-control"></td>
                            </tr>
                            <tr>
                                <th scope="row">vaccines 3</th>
                                <td><input type="text" class="form-control"></td>
                                <td><input class="date form-control" type="text"></td>
                            </tr>

                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary col-4" style="margin: 20px">add vaccines</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(".form_datetime").datetimepicker({
            format: "dd MM yyyy - hh:ii"
        });
    </script>
@endsection
