@extends('layouts.master')

@section('content')
    <div style="margin-right: 200px; margin-left: 200px; margin-top: 50px">
        <h4>Create Pet</h4>
        <form method="POST" action="{{ route('pet.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="type">Genre</label>
                <select id="type" class="form-control" name="type">
                    @foreach($types as $type)
                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="gene">Genes</label>
                <select id="gene" class="form-control" name="gene">
                    @foreach($genes as $gene)
                        <option value="{{ $gene->id }}">{{ $gene->gene }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="birth-date-input" class="col-2 col-form-label">BirthDate</label>
                <div>
                    <input class="form-control" type="date" value="2011-08-19" id="birth-date-input" name="birth-date-input">
                    <small id="fileHelp" class="form-text text-muted"></small>
                </div>
            </div>
            <div class="form-group">
                <label for="weight" class="col-2 col-form-label">Weight</label>
                <div>
                    <input type="text" class="form-control" id="weight" name="weight">
                    <small id="fileHelp" class="form-text text-muted"> Please answer in Kilograms Unit</small>
                </div>
            </div>

            {{--            <div class="form-group">--}}
            {{--                <label for="exampleInputFile">File input</label>--}}
            {{--                <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">--}}
            {{--            </div>--}}
            <div class="form-group row">
                <div class="offset-sm-11">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
@endsection
