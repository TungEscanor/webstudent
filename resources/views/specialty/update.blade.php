@extends('layouts.master')
@section('title')

@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="">Specialty</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Specialty</li>
        </ol>
    </nav>
    @include('specialty.form')
@endsection
