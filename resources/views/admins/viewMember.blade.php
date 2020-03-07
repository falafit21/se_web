@extends('layouts.master')
@section('content')
    <div style="margin: 70px">
        <div class="row">
            <div class="col-6">
                <h4>all user</h4>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">create_at</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Mark</td>
                        <td>12/02/1254</td>
                        <td class="text-right">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="block">
                                <label class="custom-control-label" for="block">block</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Jacob</td>
                        <td>12/02/1254</td>
                        <td class="text-right">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="block">
                                <label class="custom-control-label" for="block">block</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Larry</td>
                        <td>12/02/1254</td>
                        <td class="text-right">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="block">
                                <label class="custom-control-label" for="block">block</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Larry</td>
                        <td>12/02/1254</td>
                        <td class="text-right">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="block">
                                <label class="custom-control-label" for="block">block</label>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <h4>all doctor</h4>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">create_at</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Mark</td>
                        <td>12/02/1254</td>
                        <td class="text-right">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="block">
                                <label class="custom-control-label" for="block">block</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Jacob</td>
                        <td>12/02/1254</td>
                        <td class="text-right">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="block">
                                <label class="custom-control-label" for="block">block</label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Larry</td>
                        <td>12/02/1254</td>
                        <td class="text-right">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="block">
                                <label class="custom-control-label" for="block">block</label>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
@endsection
