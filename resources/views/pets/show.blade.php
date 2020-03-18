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
                                <td class="">{{$pet->petType->type}}</td>
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
                                <td>{{$pet->petGene->gene}}</td>
                            </tr>
                            <tr>
                                <th>STATUS</th>
                                <td>-----------------</td>
                            </tr>
                            </tbody>
                        </table>
                        <a href="{{action('PetsController@edit', $pet['id'])}}">
                            <div class=" text-right">
                                <i class="far fa-edit" data-toggle="modal" data-target="#editModal"
                                   style="font-size: 18px; color: #F5B041" type="button" data-toggle="tooltip"
                                   data-placement="top" title="edit profile"></i>
                            </div>
                        </a>
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

                            @foreach($vaccines as $vaccine)
                                <tr>
                                    @if($pet->petType->type == 'dog' and $vaccine->pet_type_id == 1)
                                        <td scope="row" class="text-left">
                                            <b>{{ $vaccine->name }}</b>
                                            <div style="font-size: 12px;">
                                                activate {{ $vaccine->activate_range }} months
                                            </div>
                                        </td>

                                        <td>

                                            @foreach($recieve_vaccines as $recieve_vaccine)
                                                @if($recieve_vaccine->pet_id == $pet->id && $recieve_vaccine->vaccine_id == $vaccine->id)
                                                    {{ $recieve_vaccine->received_at }}
                                                @else
                                                    no data
                                                @endif
                                            @endforeach
                                        </td>

                                        <td>
                                            {{--                                                @if($recieve_vaccine->pet_id == $pet->id && $recieve_vaccine->vaccine_id == $vaccine->id)--}}
                                            {{--                                                    {{ \Carbon\Carbon::parse($recieve_vaccine->received_at)->addMonth($vaccine->activate_range)->toDateString() }}--}}
                                            {{--                                                @else--}}
                                            {{--                                                    no data--}}
                                            {{--                                                @endif--}}
                                        </td>
                                        <td style="font-size: 20px" class="row-center">
                                            <i class="fas fa-stethoscope col-2" type="button"></i>
                                            {{--                                                @if($recieve_vaccine->pet_id == $pet->id && $recieve_vaccine->vaccine_id == $vaccine->id)--}}
                                            {{--                                                    <i class="fas fa-pen col-2" style="color: #F5B041" type="button"--}}
                                            {{--                                                       data-toggle="modal" data-target="#edit-{{ $vaccine->id }}"></i>--}}
                                            {{--                                                @else--}}
                                            {{--                                                    <i class="fas fa-plus col-2" style="color: #2ECC71;" type="button"--}}
                                            {{--                                                       data-toggle="modal"--}}
                                            {{--                                                       data-target="#addReceived-{{ $vaccine->id }}"></i>--}}
                                            {{--                                                @endif--}}
                                            <i class="fas fa-trash-alt col-2" style="color: #E74C3C"
                                               type="button"></i>
                                        </td>
                                        {{--                                                                                <td>{{$recievedVaccines->expire_at}}}</td>--}}
                                    @elseif($pet->petType->type == 'cat' and $vaccine->pet_type_id == 2)
                                        <td scope="row" class="text-left">
                                            <b>{{ $vaccine->name }}</b>
                                            <div style="font-size: 12px;">
                                                activate {{ $vaccine->activate_range }} months
                                            </div>
                                        </td>
                                        <td>
                                            {{--                                                @if($recieve_vaccine->pet_id == $pet->id && $recieve_vaccine->vaccine_id == $vaccine->id)--}}
                                            {{--                                                    {{ $recieve_vaccine->received_at }}--}}
                                            {{--                                                @else--}}
                                            {{--                                                    no data--}}
                                            {{--                                                @endif--}}
                                        </td>
                                        <td>
                                            {{--                                                @if($recieve_vaccine->pet_id == $pet->id && $recieve_vaccine->vaccine_id == $vaccine->id)--}}
                                            {{--                                                    {{ \Carbon\Carbon::parse($recieve_vaccine->received_at)->addMonth($vaccine->activate_range) }}--}}
                                            {{--                                                @else--}}
                                            {{--                                                    no data--}}
                                            {{--                                                @endif--}}
                                        </td>
                                        <td style="font-size: 20px" class="row-center">
                                            <i class="fas fa-stethoscope col-2" type="button"></i>
                                            {{--                                                @if($recieve_vaccine->pet_id == $pet->id && $recieve_vaccine->vaccine_id == $vaccine->id)--}}
                                            {{--                                                    <i class="fas fa-pen col-2" style="color: #F5B041" type="button"--}}
                                            {{--                                                       data-toggle="modal" data-target="#edit-{{ $vaccine->id }}"></i>--}}
                                            {{--                                                @else--}}
                                            {{--                                                    <i class="fas fa-plus col-2" style="color: #2ECC71;" type="button"--}}
                                            {{--                                                       data-toggle="modal"--}}
                                            {{--                                                       data-target="#addReceived-{{ $vaccine->id }}"></i>--}}
                                            {{--                                                @endif--}}
                                            <i class="fas fa-trash-alt col-2" style="color: #E74C3C"
                                               type="button"></i>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        // edit modal
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
                                                    <input type="text" class="form-control" id="vaccineName"
                                                           name="vaccineName">
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
                                                <label for="vaccineFor" class="col-sm-4 col-form-label text-left">Vaccine
                                                    for</label>
                                                <div class="col-sm-8">
                                                    <select id="vaccineFor" class="form-control" name="vaccineFor">
                                                        @foreach($types as $type)
                                                            <option
                                                                value="{{ $type->id }}">{{ $type->type }}</option>
                                                        @endforeach
                                                    </select>
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
                        @foreach($vaccines as $vaccine)
                            @foreach($recieve_vaccines as $recieve_vaccine)
                                <div id="edit-{{ $vaccine->id }}" class="modal fade" role="dialog" style="color: black">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit {{ $vaccine->name  }} received</h4>
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
                                                            @if($recieve_vaccine->pet_id == $pet->id && $recieve_vaccine->vaccine_id == $vaccine->id)
                                                                <input type="date" class="form-control"
                                                                       placeholder="MM/DD/YYYY"
                                                                       value="{{ $recieve_vaccine->received_at }}"
                                                                       id="receivedDate" name="receivedDate">
                                                            @else
                                                                no data
                                                            @endif
                                                        </div>
                                                    </div>
                                                    @if($recieve_vaccine->pet_id == $pet->id && $recieve_vaccine->vaccine_id == $vaccine->id)
                                                        <p>activate {{ $vaccine->activate_range }} months</p>
                                                    @else
                                                        no data
                                                    @endif
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
                        @endforeach
                        // add received
                        @foreach($vaccines as $vaccine)
                            <div id="addReceived-{{ $vaccine->id }}" class="modal fade" role="dialog"
                                 style="color: black">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add Received {{ $vaccine->name  }} date</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('received.vaccine.date.store',[
                                                'pet' => $pet->id,
                                            ])}}">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="receivedDate"
                                                           class="col-sm-4 col-form-label text-left">Received
                                                        Date</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" class="form-control"
                                                               id="receivedDate" name="receivedDate">
                                                    </div>
                                                </div>
                                                <p>activate {{ $vaccine->activate_range }} months</p>
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-primary"
                                                            style="margin-top: 20px">Add Received Date
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
    <script>
        $('.datepicker').pickadate();
        createEditableSelect(document.forms[0].myText);
    </script>
@endsection
