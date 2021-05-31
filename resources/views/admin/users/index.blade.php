@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Users</h4>
                    <p class="card-description">
                        Application Users
                    </p>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Profile Photo
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Created At
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="py-1">
                                        {{$user->id}}
                                    </td>
                                    <td>
                                        <img src="{{$user->profile_photo_url}}" width="50" height="50" alt="">
                                    </td>
                                    <td>
                                        {{$user->name}}
                                    </td>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                    <td>
                                        {{$user->created_at->diffForHumans()}}
                                    </td>
                                    <td>
{{--                                        <a class="btn-sm btn-outline-info" href="{{route('admin-user-show',$user->id)}}"><i data-feather="eye"></i></a>--}}
                                        <a class="btn-sm btn-outline-primary" href="{{route('admin-user-edit',$user->id)}}"><i data-feather="edit"></i></a>
                                        <a class="btn-sm btn-outline-danger" href="{{route('admin-user-delete',$user->id)}}"><i data-feather="trash"></i></a>
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
