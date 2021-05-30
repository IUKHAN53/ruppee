@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-9 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Basic Form</h6>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" autocomplete="off" placeholder="Enter Title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">price</label>
                            <input type="number" min="0" class="form-control" id="price" name="price">
                        </div>
                        <div class="form-group">
                            <label for="duration">Duration(days)</label>
                            <input type="number" min="0" class="form-control" id="duration" name="duration">
                        </div>
                        <div class="form-group">
                            <label for="duration">Featured Image</label>
                            <input type="file" class="form-control" id="myDropify" name="photo" class="border"/>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
