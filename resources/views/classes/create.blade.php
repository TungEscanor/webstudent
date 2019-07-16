@extends('layouts.master')
@section('title')
Create class
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="">Classes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create class</li>
        </ol>
    </nav>
<div class="forms">
    <div class="panel-body widget-shadow">
        <div class="form-title">
            <h4>Faculty Form :</h4>
        </div>
        <br><br>
        {{Form::open(['route' => 'classes.store'])}}
        <div class="form-group">
            {{Form::label('name', 'Class name :')}}
            {{Form::text('name','',['class'=> 'form-control1'])}}
            @if($errors->has('name'))
                <div class="error-text text-danger">
                    {{$errors->first('name')}}
                </div>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('faculty','Faculty :') !!}
            {!! Form::select('faculty_id',$faculties,null, ['class' => 'form-control1', 'id' => 'selector1']) !!}
        </div>
        <div>
            @if($errors->has('faculty_id'))
                <div class="error-text text-danger">
                    {{$errors->first('faculty_id')}}
                </div>
            @endif
        </div>
        {{Form::submit('create', ['class'=> 'btn btn-success'])}}
        {{Form::close()}}
    </div>
</div>
@endsection
