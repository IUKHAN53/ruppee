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
                    <h6 class="card-title">Create User</h6>
                    <form class="forms-sample" method="POST" action="{{route('admin-user-store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" autocomplete="off"
                                   placeholder="Enter Title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" min="0" class="form-control" id="price" name="price">
                        </div>
                        <div class="form-group">
                            <label for="duration">Duration(days)</label>
                            <input type="number" min="0" class="form-control" id="duration" name="duration">
                        </div>
                        <div class="form-group">
                            <label for="photo">Featured Image</label>
                            <input type="file" class="form-control" accept="image/png, image/jpeg, image/jpg" id="photo" name="photo"/>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
