@extends('layouts.master')
@section('content')
    <div style="margin: 70px">
        <div class="row">
            <div class="col-6">
                <h4>All Users</h4>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">create_at</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->updated_at }}}</td>
                        <td class="text-right">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="block">
                                <label class="custom-control-label" for="block">block</label>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <h4>All Doctors</h4>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">create_at</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($doctors as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td class="text-right">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="block">
                                <label class="custom-control-label" for="block">block</label>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
@endsection
