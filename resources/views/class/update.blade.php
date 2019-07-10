@extends('layouts.master')
@section('title')

@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="">Class</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Class</li>
        </ol>
    </nav>
    @include('class.form')
@endsection
