@extends('layouts.master')
@section('title')

@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="">Classes</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Class</li>
        </ol>
    </nav>
<div class="forms">
    <div class="panel-body widget-shadow">
        <div class="form-title">
            <h4>Faculty Form :</h4>
        </div>
        <br><br>
        {{Form::open(['method' => 'PUT','route' => ['classes.update',$class->id]])}}
        <div class="form-group">
            {{Form::label('name', 'Class name :')}}
            {{Form::text('name',$class->name,['class'=> 'form-control1'])}}
            @if($errors->has('name'))
                <div class="error-text text-danger">
                    {{$errors->first('name')}}
                </div>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('faculty','Faculty :') !!}
            {!! Form::select('faculty_id',$faculties,isset($class->faculty->id) ? $class->faculty->id : '', ['class' => 'form-control1 custom-select mr-sm-2']) !!}
        </div>
        <div>
            @if($errors->has('faculty_id'))
                <div class="error-text text-danger">
                    {{$errors->first('faculty_id')}}
                </div>
            @endif
        </div>
        {{Form::submit('Save', ['class'=> 'btn btn-success'])}}
        {{Form::close()}}
    </div>
</div>
@endsection
