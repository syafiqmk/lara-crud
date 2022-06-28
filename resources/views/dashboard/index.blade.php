@extends('layouts.dashboard')

@section('content')
    <h4>Welcome, {{ auth()->user()->name }}</h4>
@endsection