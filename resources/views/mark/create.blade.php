@extends('layouts.master')
@section('title')

@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="">Mark</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Mark</li>
        </ol>
    </nav>
    @include('mark.form')
@endsection
