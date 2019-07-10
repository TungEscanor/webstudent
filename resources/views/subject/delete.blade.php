@extends('layouts.master')
@section('title')
    Delete faculty
@endsection

@section('content')
    <div class="form-grids row widget-shadow col-md-6">
        <h2>Are you sure want to delete subject: <span style="color: blue;">{{$subject->name}}</span></h2>
        <form name="subject" method="post" action="{{ url("subject/delete/$subject->id")}}">
            {{ csrf_field()}}
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection

