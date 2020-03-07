@extends('layouts.master')
@section('content')
    <div style="margin-right: 200px; margin-left: 200px; margin-top: 50px">
        <h4>create doctor</h4>
        <form>
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="phoneNumber">phone number</label>
                <input type="text" class="form-control" id="phoneNumber">
            </div>
            <div class="form-group">
                <label for="graduatedFrom">graduated from</label>
                <input type="text" class="form-control" id="graduatedFrom">
            </div>
            <div class="form-group">
                <label for="licenseNumber">license number</label>
                <input type="text" class="form-control" id="licenseNumber">
            </div>
            <div class="form-group">
                <label for="workAt">work at</label>
                <input type="text" class="form-control" id="workAt">
            </div>
        </form>
    </div>
@endsection
