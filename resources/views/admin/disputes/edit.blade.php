@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-9 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h6 class="card-title">Edit User</h6>
                    <form class="forms-sample" method="POST" action="{{route('admin-user-update',$user->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" autocomplete="off" value="{{$user->name}}"
                                   placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="text" name="email" id="email" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" min="0" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
