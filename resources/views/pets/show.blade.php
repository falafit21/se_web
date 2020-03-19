@extends('layouts.master')
@section('content')
    <div style="margin: 50px">
        <div class="row">
            <div class="col-3">
                <div class="card bg-light">
                    <div class="card-header text-center">
                        <h4>{{$pet->name}} profile</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless text-left">
                            <tbody style="color: black">
                            <tr>
                                <th scope="row">NAME</th>
                                <td>{{$pet->name}}</td>
                            </tr>
                            <tr>
                                <th scope="row">TYPE</th>
{{--                                <td class="">{{$pet->petType->type}}</td>--}}
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
                                </td>
                            </tr>
                            <tr>
                                <th>GENE</th>
{{--                                <td>{{$pet->petGene->gene}}</td>--}}
                            </tr>
                            <tr>
                                <th>STATUS</th>
                                <td>-----------------</td>
                            </tr>
                            </tbody>
                        </table>
{{--                        <a href="{{action('PetsController@edit', $pet['id'])}}">--}}
                            <div class=" text-right">
                                <i class="far fa-edit" data-toggle="modal" data-target="#editProfile"
                                   style="font-size: 18px; color: #F5B041" type="button" data-toggle="tooltip"
                                   data-placement="top" title="edit profile"></i>
                            </div>
{{--                        </a>--}}
                    </div>
                </div>
            </div>
            <div class="col-9" style="color: white">
                <h2>vaccines Schedule</h2>
                <div class="card  bg-light text-center">
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody style="color: black">
                            <tr class="text-center" style="font-size: 19px">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add"
                                            style="margin-left: 1rem;">add vaccine <i class="fas fa-plus"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="text-center" style="font-size: 19px">
                                <td class="text-left">vaccines name</td>
                                <td>Received Date</td>
                                <td>Expire Date</td>
                                <td class="text-center">manage</td>
                            </tr>

                            @foreach($recieve_vaccines as $recieve_vaccine)
                                <tr>
                                    @if($recieve_vaccine->pet->petType->type == 'dog' and $recieve_vaccine->vaccine->pet_type_id == 1)
                                        <td scope="row" class="text-left">
                                            <b>{{ $recieve_vaccine->vaccine->name }}</b>
                                            <div style="font-size: 12px;">
                                                activate {{ $recieve_vaccine->vaccine->activate_range }} months
                                            </div>
                                        </td>
                                        <td>
                                            {{ $recieve_vaccine->received_at }}
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($recieve_vaccine->received_at)->addMonth($recieve_vaccine->vaccine->activate_range)->toDateString() }}
                                        </td>
                                        <td style="font-size: 20px" class="row-center">
                                            <i class="fas fa-stethoscope col-2" type="button"></i>
                                            <i class="fas fa-pen col-2" style="color: #F5B041" type="button"
                                               data-toggle="modal"
                                               data-target="#edit-{{ $recieve_vaccine->vaccine->id }}"></i>
                                            <i class="fas fa-trash-alt col-2" style="color: #E74C3C"
                                               type="button"></i>
                                        </td>
                                    @elseif($recieve_vaccine->pet->petType->type == 'cat' and $recieve_vaccine->vaccine->pet_type_id == 2)
                                        <td scope="row" class="text-left">
                                            <b>{{ $recieve_vaccine->vaccine->name }}</b>
                                            <div style="font-size: 12px;">
                                                activate {{ $recieve_vaccine->vaccine->activate_range }} months
                                            </div>
                                        </td>
                                        <td>
                                            {{ $recieve_vaccine->received_at }}
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($recieve_vaccine->received_at)->addMonth($recieve_vaccine->vaccine->activate_range)->toDateString() }}
                                        </td>
                                        <td style="font-size: 20px" class="row-center">
                                            <i class="fas fa-stethoscope col-2" type="button"></i>
                                            <i class="fas fa-pen col-2" style="color: #F5B041" type="button"
                                               data-toggle="modal"
                                               data-target="#edit-{{ $recieve_vaccine->vaccine->id }}"></i>
                                            <i class="fas fa-trash-alt col-2" style="color: #E74C3C"
                                               type="button"></i>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

{{--                        // edit profile--}}
                        <div class="modal fade" id="editProfile" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form method="POST" action="{{route('pet.update',[$pet['id']])}}" >
                                                @method('PUT')
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel" style="color: #1b1e21">Edit Profile</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-borderless text-center">
                                                        <tbody style="color: black">
                                                        <tr>
                                                            <th scope="row"><label for="name">Name</label></th>
                                                            <td><input class="form-control" id="name" name="name" value="{{old('name',$pet->name)}}"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row"><label for="type">Genre</label></th>
                                                            <td><select id="type" class="form-control" name="type">
                                                                    @foreach($types as $type)
                                                                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                                                                    @endforeach
                                                                </select></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row"><label for="gene">Genes</label></th>
                                                            <td><select id="gene" class="form-control" name="gene">
                                                                    {{--                                                            @foreach($genes as $gene)--}}
                                                                    {{--                                                               <option value="{{ $gene->id }}">{{ $gene->gene }}</option>--}}
                                                                    {{--                                                            @endforeach--}}
                                                                </select></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row"><label for="birth-date-input">BirthDate</label></th>
                                                            <td><input class="form-control" type="date" value="{{$pet->birth_date}}" id="birth-date-input" name="birth-date-input">
                                                                <small id="fileHelp" class="form-text text-muted"></small></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row"><label for="weight">Weight</label></th>
                                                            <td><input type="text" class="form-control" id="weight" name="weight" value="{{old('weight',$pet->weight)}}">
                                                                <small id="fileHelp" class="form-text text-muted"> Please answer in Kilograms Unit</small></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>


                                            </form>

                                        </div>
                                    </div>
                        </div>

                        // add modal
                        <div id="add" class="modal fade" role="dialog" style="color: black">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add Vaccine</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('pet.vaccine.store',[
                                                'pet' => $pet->id
                                            ])}}">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="vaccineName" class="col-sm-4 col-form-label text-left">Vaccine
                                                    Name</label>
                                                <div class="col-sm-8">
                                                    <datalist id="vaccineName">
                                                        @if ($pet->petType->id = 1)
                                                            @foreach($vaccinesInCurrentType as $vaccineInCurrentType)
                                                                <option value="{{ $vaccineInCurrentType->name }}">
                                                            @endforeach
                                                        @endif
                                                    </datalist>
                                                    <input type="search" class="form-control" id="vaccineName"
                                                           name="vaccineName" list="vaccineName">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="PreventSymptom"
                                                       class="col-sm-4 col-form-label text-left">Prevent
                                                    symptom</label>
                                                <div class="col-sm-8">
                                                        <textarea type="text" class="form-control" name="PreventSymptom"
                                                                  id="PreventSymptom">
                                                        </textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="activateRange"
                                                       class="col-sm-4 col-form-label text-left">Activate
                                                    range</label>
                                                <div class="col-sm-6">
                                                    <input type="number" class="form-control" id="activateRange"
                                                           name="activateRange">
                                                </div>
                                                <div class="col-sm-2 col-form-label">months</div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="receivedDate"
                                                       class="col-sm-4 col-form-label text-left">Received
                                                    Date</label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control"
                                                           id="receivedDate" name="receivedDate">
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary"
                                                        style="margin-top: 20px">Add
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        // edit modal
                        @foreach($recieve_vaccines as $recieve_vaccine)
                            <div id="edit-{{ $recieve_vaccine->vaccine->id }}" class="modal fade" role="dialog"
                                 style="color: black">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit {{ $recieve_vaccine->vaccine->name }}
                                                received</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="receivedDate"
                                                           class="col-sm-4 col-form-label text-left">Received
                                                        Date</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" class="form-control"
                                                               value="{{ $recieve_vaccine->received_at }}"
                                                               id="receivedDate" name="receivedDate">
                                                    </div>
                                                </div>
                                                <p>activate {{ $recieve_vaccine->vaccine->activate_range }} months</p>
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-primary"
                                                            style="margin-top: 20px">edit date
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>

        $('.datepicker').pickadate();
        createEditableSelect(document.forms[0].myText);
    </script>
@endsection
