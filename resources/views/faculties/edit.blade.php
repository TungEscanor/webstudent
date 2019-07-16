@extends('layouts.master')
@section('title')
Edit faculty
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="">Faculty</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Faculty</li>
        </ol>
    </nav>
<div class="forms">
    <div class="panel-body widget-shadow">
        <div class="form-title">
            <h4>Faculty Form :</h4>
        </div>
        {{Form::open(['method'=>'PUT','route' => ['faculties.update',$faculty->id]])}}
        <div class="form-group">
            {{Form::label('name','Faculty name')}}
        </div>
        <div class="form-group">
            {{Form::text('name',$faculty->name,['class' => 'form-control1'])}}
        </div>
        @if($errors->has('name'))
            <div class="error-text text-danger">
                {{$errors->first('name')}}
            </div>
        @endif
        {{Form::submit('Save', ['class'=> 'btn btn-success'])}}
        {{Form::close()}}
    </div>
</div>
@endsection
