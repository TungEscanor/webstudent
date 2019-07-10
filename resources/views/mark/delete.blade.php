@extends('layouts.master')
@section('title')
    Delete mark
@endsection

@section('content')
    <div class="form-grids row widget-shadow col-md-6">
        <h2>Are you sure want to delete Mark: <span style="color: blue;">{{$mark->mark}}</span></h2>
        <form name="product" method="post" action="{{ url("/mark/delete/$mark->id") }}">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection

