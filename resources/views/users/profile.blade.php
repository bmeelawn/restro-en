

@extends('layouts.layout')

@section('content')
<x-heading heading="Profile" />
{{session()->get('user')[0]['name']}}
@endsection
