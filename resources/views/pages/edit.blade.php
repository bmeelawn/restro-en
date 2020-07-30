@extends('layouts.layout')

@section('content')
    <x-heading heading="Edit Restaurant" />
    <div class="col-md-6">
        @include('inc.message')
        <form method="post" action="/laravel-project/restro-en/public/update/{{$data->id}}" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="restaurant">Restaurant</label>
                <input type="text" name="restaurant" class="form-control" id="restaurant" placeholder="Enter restaurant name" value="{{$data->name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Enter email" value="{{$data->email}}">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" placeholder="Enter address" value="{{$data->address}}">
            </div>
             <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" name="body" rows="5" placeholder="Enter restaurant description" aria-label="With textarea">{{$data->body}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection