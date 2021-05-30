@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Services</h4>
                    <p class="card-description">
                        Services sold by users
                    </p>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    User
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Delivery Time (Days)
                                </th>
                                <th>
                                    Start Price
                                </th>
                                <th>
                                    Published At
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td class="py-1">
                                        {{$service->user->name}}
                                    </td>
                                    <td>
                                        {{$service->title}}
                                    </td>
                                    <td>
                                        {{$service->delivery_days}}
                                    </td>
                                    <td>
                                        Rs. {{$service->start_price}}
                                    </td>
                                    <td>
                                        {{$service->created_at->diffForHumans()}}
                                    </td>
                                    <td>
                                        <a class="btn-sm btn-outline-info" href="#"><i data-feather="eye"></i></a>
                                        <a class="btn-sm btn-outline-primary" href="#"><i data-feather="edit"></i></a>
                                        <a class="btn-sm btn-outline-danger" href="#"><i data-feather="trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
