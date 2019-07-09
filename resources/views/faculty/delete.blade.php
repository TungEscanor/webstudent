@extends('layouts.master')
@section('title')
    Delete faculty
@endsection

@section('content')
    <div class="form-grids row widget-shadow col-md-6">
        <h2>Are you sure want to delete faculty: <span style="color: blue;">{{$faculty->name}}</span></h2>
        <form name="faculty" method="post" action="{{ url("faculty/delete/$faculty->id")}}">
            {{ csrf_field()}}
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection

