@extends('layouts.master')
@section('content')
    <div style="margin-left: 200px; margin-right: 200px; margin-top: 50px; color: white;">
        <h4>All Users</h4>
        <table class="table table-light" >
            <thead class="thead-light">
            <tr>
                <th scope="col" style="font-size: 20px">Name</th>
                <th scope="col" style="font-size: 20px">create_at</th>
                <th scope="col" style="font-size: 20px"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->created_at }}</td>
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
@endsection
