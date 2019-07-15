@extends('layouts.master')
@section('title')

@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="">Faculty</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Faculty</li>
        </ol>
    </nav>
    <div class="panel-body widget-shadow">
        {{Form::open(['route' => 'faculties.store'])}}
        <div class="form-group">
            {{Form::label('name','Faculty name')}}
        </div>
        <div class="form-group">
            {{Form::text('name')}}
        </div>
        @if($errors->has('name'))
            <div class="error-text text-danger">
                {{$errors->first('name')}}
            </div>
        @endif
        {{Form::submit('Submit', ['class'=> 'btn btn-success'])}}
        {{Form::close()}}
    </div>
@endsection
