@extends('layouts.master')

@section('content')
    <div style="margin-right: 200px; margin-left: 200px; margin-top: 50px">
        <h4>Create Pet</h4>
        <form>
            <div class="form-group">
                <label for="genre">Genre</label>
                <select id="choosePet" class="form-control">
                    <option value="0">dog</option>
                    <option value="1">cat</option>
                    <option value="2" selected="selected">giraffe</option>
                </select>
            </div>
            <div class="form-group">
                  <label for="size">Size</label>
                   <select id="choosePet" class="form-control">
                      <option value="0">Small</option>
                      <option value="1">Medium</option>
                      <option value="2">Large</option>
                      <option value="3" selected="selected">Giants</option>
                  </select>
             </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="name" class="form-control" id="name">
            </div>

            <div class="form-group row">
              <label for="example-date-input" class="col-2 col-form-label">BirthDate</label>
              <div class="col-10">
                <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                <small id="fileHelp" class="form-text text-muted"></small>
              </div>
            </div>
            <div class="form-group row">
                <label for="age"class="col-2 col-form-label" >Age</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="age">
                    <small id="fileHelp" class="form-text text-muted">Please answer in week(s)</small>

                </div>


             </div>


            <div class="form-group row">
                 <label for="weight" class="col-2 col-form-label">Weight</label>
                 <div class="col-10">
                     <input type="text" class="form-control" id="weight">
                     <small id="fileHelp" class="form-text text-muted"> Please answer in Kilograms Unit</small>

                 </div>


            </div>

            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
              </div>
              <div class="form-group row">
                    <div class="offset-sm-11">
                      <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                  </div>
        </form>
    </div>
@endsection
