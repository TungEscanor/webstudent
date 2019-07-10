@extends('layouts.master')
@section('title')
    Delete student
@endsection

@section('content')
    <div class="form-grids row widget-shadow col-md-6">
        <h2>Are you sure want to delete student: <span style="color: blue;">{{$student->name}}</span></h2>
        <form name="product" method="post" action="{{ url("/student/delete/$student->id") }}">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection

