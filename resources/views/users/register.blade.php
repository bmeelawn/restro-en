@extends('layouts.layout')

@section('content')
    <x-heading heading="User Register" />
    <div class="col-md-6">
        @include('inc.message')
        <form method="post" action="/laravel-project/restro-en/public/register">
        @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
@endsection