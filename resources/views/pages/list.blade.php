@extends('layouts.layout')

@section('content')
    <x-heading heading="All Restaurants" />
        @include('inc.message')
    <ul>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            @foreach ($data as $key)
                <tbody>
                    <tr>
                    <th scope="row">{{$key->id}}</th>
                    <td>{{$key->name}}</td>
                    <td>{{$key->email}}</td>
                    <td>{{$key->address}}</td>
                    <td>
                    <a href="/laravel-project/restro-en/public/delete/{{$key->id}}"><i class="fa fa-trash"></i></a>
                    <a href="/laravel-project/restro-en/public/edit/{{$key->id}}">
                    <i class="fa fa-edit"></i>
                    </a></td>
                    </tr>
                <tbody>
            @endforeach
        </table>

    </ul>
@endsection