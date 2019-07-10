@extends('layouts.master')
@section('title')
    Delete class
@endsection

@section('content')
    <div class="form-grids row widget-shadow col-md-6">
        <h2>Are you sure want to delete class: <span style="color: blue;">{{$class->name}}</span></h2>
        <form name="product" method="post" action="{{ url("/class/delete/$class->id") }}">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection

