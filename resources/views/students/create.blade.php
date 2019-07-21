@extends('layouts.master')
@section('title')
Create student
@endsection
@section('content')
    <div class="banner">
        <h2><a href="">Home</a><i class="fa fa-angle-right"></i><span>Student</span><i class="fa fa-angle-right"></i><span>Create student</span></h2>
    </div>
    <div class="grid-form">
        <div class="grid-form1">
                <div class="form-group">
                    {{Form::open(['route' => 'students.store','enctype' => 'multipart/form-data'])}}
                    {{Form::label('exampleInputEmail1','Student name:',['style' => 'font-weight:bold'])}}
                    {{Form::text('name','',['class' => 'form-control','id' =>"exampleInputEmail1"])}}
                    @if($errors->has('name'))
                        <div class="error-text text-danger">
                            {{$errors->first('name')}}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    {{Form::label('birth day','Birthday:',['style' => 'font-weight:bold'])}}
                    <br>
                    {{Form::date('birthday','1999-12-20' ),['class' => 'form-control']}}
                    @if($errors->has('birthday'))
                        <div class="error-text text-danger">
                            {{$errors->first('birthday')}}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('gender','Gender:',['style' => 'font-weight:bold']) !!}
                    <br>
                    {{Form::radio('gender','male')}}
                    {{Form::label('male','Male',['class' => 'form-check-input'])}}
                    {{Form::radio('gender','female')}}
                    {{Form::label('female','Female',['class' => 'form-check-input'])}}
                    <div>
                        @if($errors->has('gender'))
                            <div class="error-text text-danger">
                                {{$errors->first('gender')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('phone number', 'Phone number: ',['style' => 'font-weight:bold'])}}
                    {{Form::number('phone_number',null,['class' => 'form-control1','id' =>"exampleInputEmail1"])}}
                    <div>
                    @if($errors->has('phone_number'))
                        <div class="error-text text-danger">
                            {{$errors->first('phone_number')}}
                        </div>
                    @endif
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('avatar','Avatar: ',['style' => 'font-weight:bold'])}}
                    {!! Form::file('avatar') !!}
                </div>
                @if($errors->has('avatar'))
                    <div class="error-text text-danger">
                        {{$errors->first('avatar')}}
                    </div>
                @endif
                <div class="form-group">
                    {{Form::label('class','Class :',['style' => 'font-weight:bold'])}}
                    {{Form::select('class_id',$classes,null, ['class' => 'form-control1'])}}
                    <div>
                        @if($errors->has('class_id'))
                            <div class="error-text text-danger">
                                {{$errors->first('class_id')}}
                            </div>
                        @endif
                    </div>
                </div>
                {{ Form::hidden('redirects_to', URL::previous()) }}
                {{Form::submit('create', ['class'=> 'btn btn-success'])}}
                {{Form::close()}}
        </div>
    </div>
@endsection
