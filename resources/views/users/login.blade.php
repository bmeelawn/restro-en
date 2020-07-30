@extends('layouts.layout')

@section('content')
    <x-heading heading="Login" />
    <div class="col-md-6 login-max-width">
        @include('inc.message')
        <form method="post" action="/laravel-project/restro-en/public/login">
        @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
@endsection