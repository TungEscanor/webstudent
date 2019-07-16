@extends('layouts.master')
@section('title')
Edit mark
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="">Mark</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update mark</li>
        </ol>
    </nav>
    <div class="panel-body widget-shadow">
        {{Form::open(['route' =>'marks.store'])}}
        <div class="form-group">
            {!! Form::label('student','Student') !!}
            {!! Form::select('student_id',$data['students'],$mark->student->id, ['class' => 'form-control']) !!}
        </div>
        <div>
            @if($errors->has('student_id'))
                <div class="error-text text-danger">
                    {{$errors->first('student_id')}}
                </div>
            @endif
        </div>
        <div class="form-group">
            {!! Form::label('subject','Subject') !!}
            {!! Form::select('subject_id',$data['subjects'],$mark->subject->id, ['class' => 'form-control']) !!}
        </div>
        <div>
            @if($errors->has('subject_id'))
                <div class="error-text text-danger">
                    {{$errors->first('subject_id')}}
                </div>
            @endif
        </div>
        <div class="form-group">
            {{Form::label('mark', 'Mark')}}
            {{Form::text('mark',$mark->mark,['class'=> 'form-control'])}}
            @if($errors->has('mark'))
                <div class="error-text text-danger">
                    {{$errors->first('mark')}}
                </div>
            @endif
        </div>
        {{Form::submit('Save', ['class'=> 'btn btn-success'])}}
        {{Form::close()}}
    </div>
@endsection
