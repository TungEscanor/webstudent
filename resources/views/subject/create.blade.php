@extends('layouts.master')
@section('title')

@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="">Subject</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Subject</li>
        </ol>
    </nav>
    @include('subject.form')
@endsection
