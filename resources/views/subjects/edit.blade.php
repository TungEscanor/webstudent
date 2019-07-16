@extends('layouts.master')
@section('title')
Edit Subject
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="">Subjects</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Subjects</li>
        </ol>
    </nav>
<div class="forms">
    <div class="panel-body widget-shadow">
        <div class="form-title">
            <h4>Faculty Form :</h4>
        </div>
        <br><br>
        {{Form::open(['method' => 'PUT','route' =>['subjects.update',$subject->id]])}}
        <div class="form-group">
            {{Form::label('name', 'Subject name')}}
            {{Form::text('name',$subject->name,['class'=> 'form-control'])}}
            @if($errors->has('name'))
                <div class="error-text text-danger">
                    {{$errors->first('name')}}
                </div>
            @endif
        </div>

        <div class="form-group">
            {!! Form::label('faculty','Faculty') !!}
            {!! Form::select('faculty_id',$faculties,isset($subject->faculty_id) ? $subject->faculty_id : '', ['class' => 'form-control']) !!}
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
