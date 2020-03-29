@extends('layouts.master')
@section('content')
    <div style="margin: 50px">
        <div class="row">
            <div class="col-3">
                <div class="card bg-light">
                    <div class="card-header text-center" style="font-size: 20px">
                        Pet profile
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless text-left">
                            <tbody style="color: black; font-size: 15px">
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
                                    {{$pet->weight}} kg.
                                </td>
                            </tr>
                            <tr>
                                <th>GENE</th>
                                <td>{{$pet->petGene->gene}}</td>
                            </tr>

                            <tr>
                                <th>STATUS</th>
                                @if($pet->weight <= $weight_status[0]->breakpoint_start_weight)
                                    <td>
                                        <h4><span class="badge badge-secondary" style="background-color: #F8C471;">Underweight</span>
                                        </h4>
                                    </td>
                                @elseif($pet->weight >= $weight_status[0]->breakpoint_end_weight)
                                    <td>
                                        <h4><span class="badge badge-secondary" style="background-color: #EC7063;">Overweight</span>
                                        </h4>
                                    </td>
                                @else
                                    <td>
                                        <h4><span class="badge badge-secondary" style="background-color: #CDDC39;">Fit weight</span>
                                        </h4>
                                    </td>
                                @endif
                            </tr>
                            <tr>
                                <th>
                                    <button type="button" class="btn btn-secondary" data-toggle="modal"
                                            data-target="#weightHistory">weight history
                                    </button>
                                </th>
                                <td>
                                    <i class="fas fa-info-circle" style="margin-right: 7px"></i>suitable<br/>
                                    <div style="margin-left: 22px">
                                        {{ $weight_status[0]->breakpoint_start_weight }}
                                        - {{ $weight_status[0]->breakpoint_end_weight }} kg.
                                    </div>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                        <div class=" text-right">
                            <i class="far fa-edit" data-toggle="modal" data-target="#editProfile"
                               style="font-size: 18px; color: #F5B041" type="button" data-toggle="tooltip"
                               data-placement="top" title="edit profile"></i>
                        </div>
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
                                            style="margin-left: 1rem;">add vaccine <i class="fas fa-plus"
                                                                                      style="margin-left: 5px"></i>
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
                                        <form id="deleteForm"
                                              onsubmit="return confirm('Are you sure to delete this vaccine ?')"
                                              action="{{ route('vaccines.vaccineDestroy', [
                                                    'vaccine' => $recieve_vaccine->id,
                                                    'pet' => $pet->id
                                              ]) }}" method="post" class="col-1">
                                            @method('DELETE')
                                            @csrf
                                            <td style="font-size: 20px;" class="row-center">
                                                <button class="fas fa-stethoscope" type="button"
                                                        style="background-color: transparent; border:none"
                                                        data-toggle="modal"
                                                        data-target="#info-{{ $recieve_vaccine->vaccine->id }}">
                                                </button>
                                                <button class="fas fa-pen "
                                                        style="color: #F5B041; background-color: transparent; border:none"
                                                        type="button" data-toggle="modal"
                                                        data-target="#edit-{{ $recieve_vaccine->vaccine->id }}">

                                                </button>
                                                <button class="fas fa-trash-alt"
                                                        style="color: #E74C3C; background-color: transparent; border:none"
                                                        type="submit" data-toggle="tooltip" data-placement="top"
                                                        title="delete post">
                                                </button>
                                            </td>
                                        </form>

                                        {{-- <i class="fas fa-trash-alt col-2" style="color: #E74C3C"--}}
                                        {{-- type="button"></i>--}}

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
                                        <form id="deleteForm"
                                              onsubmit="return confirm('Are you sure to delete this vaccine ?')"
                                              action="{{ route('vaccines.vaccineDestroy', [
                                                    'vaccine' => $recieve_vaccine->id,
                                                    'pet' => $pet->id
                                              ]) }}" method="post" class="col-1">
                                            @method('DELETE')
                                            @csrf
                                            <td style="font-size: 20px;" class="row-center">
                                                <button class="fas fa-stethoscope" type="button"
                                                        style="background-color: transparent; border:none"
                                                        data-toggle="modal"
                                                        data-target="#info-{{ $recieve_vaccine->vaccine->id }}">
                                                </button>
                                                <button class="fas fa-pen "
                                                        style="color: #F5B041; background-color: transparent; border:none"
                                                        type="button" data-toggle="modal"
                                                        data-target="#edit-{{ $recieve_vaccine->vaccine->id }}">
                                                </button>
                                                <button class="fas fa-trash-alt"
                                                        style="color: #E74C3C; background-color: transparent; border:none"
                                                        type="submit" data-toggle="tooltip" data-placement="top"
                                                        title="delete post">
                                                </button>
                                            </td>
                                        </form>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        // edit profile
                        <div class="modal fade" id="editProfile" role="dialog" aria-labelledby="editModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="POST" enctype="multipart/form-data"
                                          action="{{ route('pet.update', [$pet['id']] ) }}">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel" style="color: #1b1e21">Edit
                                                Profile</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="color: black">
                                            <div class="form-group row">
                                                <label for="birth-date-input" class="col-sm-3 col-form-label text-left">BirthDate</label>
                                                <div class="col-sm-9">
                                                    <input
                                                        class="form-control {{ $errors->has('birth-date-input') ? ' has-error' : '' }}"
                                                        type="date" value="{{$pet->birth_date}}" id="birth-date-input"
                                                        name="birth-date-input" required>
                                                    @if ($errors->has('birth-date-input'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('birth-date-input') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="weight"
                                                       class="col-sm-3 col-form-label text-left">Weight</label>
                                                <p class="col-6">
                                                    <input type="number"
                                                           class="form-control {{ $errors->has('weight') ? ' has-error' : '' }}"
                                                           id="weight" name="weight" value="{{$pet->weight}}" required>
                                                    @if ($errors->has('weight'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('weight') }}</strong>
                                                </span>
                                                @endif
                                                <small id="fileHelp" class="form-text text-muted"> Please answer
                                                    in Kilograms Unit</small>
                                            </p>
                                            <p class="col-3 col-form-label">
                                                Kilograms
                                            </p>
                                        </div>
{{--                                        <div class="form-group row">--}}
{{--                                            <label for="img" class="col-sm-3 col-form-label text-left">Image</label>--}}
{{--                                            <div class="col-sm-9">--}}
{{--                                                <img src="{{ Storage::url('/public/imgs'.$pet->img) }}"/>--}}
{{--                                                <input type="file" name="img" class="form-control @error('img') is-invalid @enderror"--}}
{{--                                                        value="{{ old('imgs', isset($pet) ? $pet->img : '') }}"/>--}}
{{--                                                @error('img')--}}
{{--                                                <span class="help-block">--}}
{{--                                                    <strong>{{ $message }}</strong>--}}
{{--                                                </span>--}}
{{--                                                @enderror--}}
{{--                                                @if(isset($pet))--}}
{{--                                                    <label>Image</label>--}}
{{--                                                    <img src="{{Storage::url($pet->img)}} " width="80" height="75" alt="">--}}
{{--                                                @endif--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="form-group text-right">
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Add vaccine -->
                        <div id="add" class="modal fade" role="dialog" style="color: black">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add Vaccine</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('pet.vaccine.store', [
                                                'pet' => $pet->id
                                            ])}}">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="vaccineName" class="col-sm-4 col-form-label text-left">Vaccine
                                                    Name</label>
                                                <div class="col-sm-8">
                                                    <datalist id="vaccineName">
                                                        @foreach($vaccinesInCurrentType as $vaccineInCurrentType)
                                                            <option value="{{ $vaccineInCurrentType->name }}">
                                                        @endforeach
                                                    </datalist>
                                                    <input type="search"
                                                           class="form-control {{ $errors->has('vaccineName') ? ' has-error' : '' }}"
                                                           id="vaccineName" name="vaccineName" list="vaccineName"
                                                           required>
                                                    @if ($errors->has('vaccineName'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('vaccineName') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="PreventSymptom" class="col-sm-4 col-form-label text-left">Prevent
                                                    symptom</label>
                                                <div class="col-sm-8">
                                                <textarea type="text"
                                                          class="form-control {{ $errors->has('PreventSymptom') ? ' has-error' : '' }}"
                                                          name="PreventSymptom" id="PreventSymptom" required>
                                                        </textarea>
                                                    @if ($errors->has('PreventSymptom'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('PreventSymptom') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="activateRange" class="col-sm-4 col-form-label text-left">Activate
                                                    range</label>
                                                <div class="col-sm-6">
                                                    <input type="number"
                                                           class="form-control {{ $errors->has('activateRange') ? ' has-error' : '' }}"
                                                           id="activateRange" name="activateRange" required>
                                                    @if ($errors->has('activateRange'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('activateRange') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                                <div class="col-sm-2 col-form-label">months</div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="receivedDate" class="col-sm-4 col-form-label text-left">Received
                                                    Date</label>
                                                <div class="col-sm-8">
                                                    <input type="date"
                                                           class="form-control {{ $errors->has('receivedDate') ? ' has-error' : '' }}"
                                                           id="receivedDate" name="receivedDate" required>
                                                    @if ($errors->has('receivedDate'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('receivedDate') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary" style="margin-top: 20px">
                                                    Add
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        // edit vaccine modal
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
                                            <form method="POST"
                                                  action="{{ route('pet.vaccine.update',['pet'=>$pet->id]) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group row">
                                                    <input type="hidden" id="vaccineId" name="vaccineId"
                                                           value="{{$recieve_vaccine->vaccine->id}}">
                                                    <label for="vaccineName" class="col-sm-4 col-form-label text-left">Vaccine
                                                        name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text"
                                                               class="form-control {{ $errors->has('vaccineName') ? ' has-error' : '' }}"
                                                               value="{{ $recieve_vaccine->vaccine->name }}"
                                                               id="vaccineName" name="vaccineName" required>
                                                        @if ($errors->has('vaccineName'))
                                                            <span class="help-block">
                                                    <strong>{{ $errors->first('vaccineName') }}</strong>
                                                </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="receivedDate" class="col-sm-4 col-form-label text-left">Received
                                                        Date</label>
                                                    <div class="col-sm-8">
                                                        <input type="date"
                                                               class="form-control {{ $errors->has('receiveDate') ? ' has-error' : '' }}"
                                                               value="{{ $recieve_vaccine->received_at }}"
                                                               id="receivedDate" name="receivedDate" required>
                                                        @if ($errors->has('receiveDate'))
                                                            <span class="help-block">
                                                    <strong>{{ $errors->first('receiveDate') }}</strong>
                                                </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="activateRange"
                                                           class="col-sm-4 col-form-label text-left">Activate
                                                        range</label>
                                                    <div class="col-sm-8">
                                                        <input type="number"
                                                               class="form-control {{ $errors->has('activateRange') ? ' has-error' : '' }}"
                                                               value="{{ $recieve_vaccine->vaccine->activate_range }}"
                                                               id="activateRange" name="activateRange" required>
                                                        @if ($errors->has('activateRange'))
                                                            <span class="help-block">
                                                    <strong>{{ $errors->first('activateRange') }}</strong>
                                                </span>
                                                        @endif
                                                    </div>
                                                </div>
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

                        // show info model
                        @foreach($recieve_vaccines as $recieve_vaccine)
                            <div id="info-{{ $recieve_vaccine->vaccine->id }}" class="modal fade" role="dialog"
                                 style="color: black">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Vaccine's infomation</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h4>
                                                {{ $recieve_vaccine->vaccine->name }} vaccine
                                                <div style="font-size: 12px;">
                                                    activate {{ $recieve_vaccine->vaccine->activate_range }} months
                                                </div>
                                            </h4>
                                            <hr/>
                                            <p style="font-size: 16px">
                                                {{ $recieve_vaccine->vaccine->prevent_symptom }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{-- weightHistory--}}
                        <div id="weightHistory" class="modal fade" role="dialog"
                             style="color: black">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Weight History</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-borderless">
                                            <thead>
                                            <tr>
                                                <th scope="col">Weight</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($weight_Histories as $weight_History)
                                                <tr>
                                                    <td>{{$weight_History->weight}} kg</td>
                                                    <td>{{$weight_History->created_at->toDateString()}}</td>
                                                    @if($weight_History->weight <= $weight_status[0]->breakpoint_start_weight)
                                                        <td>
                                                            <h4><span class="badge badge-secondary"
                                                                      style="background-color: #F8C471;">Underweight</span>
                                                            </h4>
                                                        </td>
                                                    @elseif($weight_History->weight >= $weight_status[0]->breakpoint_end_weight)
                                                        <td>
                                                            <h4><span class="badge badge-secondary"
                                                                      style="background-color: #EC7063;">Overweight</span>
                                                            </h4>
                                                        </td>
                                                    @else
                                                        <td>
                                                            <h4><span class="badge badge-secondary"
                                                                      style="background-color: #CDDC39;">Fit weight</span>
                                                            </h4>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>
        $('.datepicker').pickadate();
        createEditableSelect(document.forms[0].myText);


    </script>
@endsection
