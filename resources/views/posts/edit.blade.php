@extends('layouts.master')

@section('content')
    <div style="margin-top: 50px; margin-left: 250px; margin-right: 250px">
        <div class="card bg-light">
            <div class="card-header text-center">
                <h4>Question<i class="far fa-user"></i></h4>
            </div>
            <div class="card-body text-right">
                <form action="" method="post" class="text-left">
                    <div class="form-group">
                        <label for="title">title</label>
                        <input type="text" class="form-control" id="title">
                    </div>
                    <div class="form-group">
                        <label for="detail">detail</label>
                        <textarea class="form-control" id="detail" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="choosePet">Choose your pet</label>
                        <select id="choosePet" class="form-control">
                            <option value="0">dog</option>
                            <option value="1">cat</option>
                            <option value="2" selected="selected">giraffe</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="choosePet">Choose Doctor</label>
                        <select id="choosePet" class="form-control">
                            <option value="0">Dr. A</option>
                            <option value="1">Dr. B</option>
                            <option value="2" selected="selected">Dr. C</option>
                        </select>
                    </div>
                </form>

                <h5 style="margin-top: 50px" class="text-left">Pet Symptom</h5>
                <table class="table text-left">
                    <tr>
                        <td>Does your pet Vomiting and Diarrhoea?</td>
                        <td>
                            <div class="text-left">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="yes1" name="customRadio"
                                           class="custom-control-input">
                                    <label class="custom-control-label" for="yes1">yes</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="no1" name="customRadio"
                                           class="custom-control-input">
                                    <label class="custom-control-label" for="no1">no</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Does your pet Vomiting and Lumps or bumps?</td>
                        <td>
                            <div class="text-left">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="yes2" name="customRadio"
                                           class="custom-control-input">
                                    <label class="custom-control-label" for="yes2">yes</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="no2" name="customRadio"
                                           class="custom-control-input">
                                    <label class="custom-control-label" for="no2">no</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Does your pet Limping?</td>
                        <td>
                            <div class="text-left">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="yes3" name="customRadio"
                                           class="custom-control-input">
                                    <label class="custom-control-label" for="yes3">yes</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="no3" name="customRadio"
                                           class="custom-control-input">
                                    <label class="custom-control-label" for="no3">no</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>


                {{--                        <div style="padding-bottom: 1.5rem;">--}}
                {{--                            <div>Does your pet Bad Breath?</div>--}}
                {{--                            <div style="text-align: center;">--}}

                {{--                                <input type="checkbox" value="1" checked id="yes" name="yes">--}}
                {{--                                <label for="yes">Yes</label>--}}
                {{--                                <input type="checkbox" value="1" checked id="No" name="No">--}}
                {{--                                <label for="No">No</label>--}}
                {{--                            </div>--}}

                {{--                        </div>--}}
                {{--                        <div style="padding-bottom: 1.5rem;">--}}
                {{--                            <div>Does your pet Coughing?</div>--}}
                {{--                            <div style="text-align: center;">--}}

                {{--                                <input type="checkbox" value="1" checked id="yes" name="yes">--}}
                {{--                                <label for="yes">Yes</label>--}}
                {{--                                <input type="checkbox" value="1" checked id="No" name="No">--}}
                {{--                                <label for="No">No</label>--}}
                {{--                            </div>--}}

                {{--                        </div>--}}
                {{--                        <div style="padding-bottom: 1.5rem;">--}}
                {{--                            <div>Does your pet Appetite or drinking changes?</div>--}}
                {{--                            <div style="text-align: center;">--}}

                {{--                                <input type="checkbox" value="1" checked id="yes" name="yes">--}}
                {{--                                <label for="yes">Yes</label>--}}
                {{--                                <input type="checkbox" value="1" checked id="No" name="No">--}}
                {{--                                <label for="No">No</label>--}}
                {{--                            </div>--}}

                {{--                        </div>--}}
                {{--                        <div style="padding-bottom: 1.5rem;">--}}
                {{--                            <div>Does your pet Urine or defaecation changes?</div>--}}
                {{--                            <div style="text-align: center;">--}}

                {{--                                <input type="checkbox" value="1" checked id="yes" name="yes">--}}
                {{--                                <label for="yes">Yes</label>--}}
                {{--                                <input type="checkbox" value="1" checked id="No" name="No">--}}
                {{--                                <label for="No">No</label>--}}
                {{--                            </div>--}}

                {{--                        </div>--}}
                {{--                        <div style="padding-bottom: 1.5rem;">--}}
                {{--                            <div>Does your pet Eye/ Ear problems?</div>--}}
                {{--                            <div style="text-align: center;">--}}

                {{--                                <input type="checkbox" value="1" checked id="yes" name="yes">--}}
                {{--                                <label for="yes">Yes</label>--}}
                {{--                                <input type="checkbox" value="1" checked id="No" name="No">--}}
                {{--                                <label for="No">No</label>--}}
                {{--                            </div>--}}

                {{--                        </div>--}}
                {{--                        <div style="padding-bottom: 1.5rem;">--}}
                {{--                            <div>Does your pet Itching/ skin irritation?</div>--}}
                {{--                            <div style="text-align: center;">--}}

                {{--                                <input type="checkbox" value="1" checked id="yes" name="yes">--}}
                {{--                                <label for="yes">Yes</label>--}}
                {{--                                <input type="checkbox" value="1" checked id="No" name="No">--}}
                {{--                                <label for="No">No</label>--}}
                {{--                            </div>--}}

                {{--                        </div>--}}
                {{--                        <div style="padding-bottom: 1.5rem;">--}}
                {{--                            <div>Does your pet Lethargy/ change in demeanour or activity levels?</div>--}}
                {{--                            <div style="text-align: center;">--}}

                {{--                                <input type="checkbox" value="1" checked id="yes" name="yes">--}}
                {{--                                <label for="yes">Yes</label>--}}
                {{--                                <input type="checkbox" value="1" checked id="No" name="No">--}}
                {{--                                <label for="No">No</label>--}}
                {{--                            </div>--}}

                {{--                        </div>--}}
                <a href="#" class="btn btn-primary">Edit</a>
            </div>

        </div>
    </div>
@endsection
