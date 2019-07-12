@extends('layouts.master')
@section('title')
    Delete specialty
@endsection

@section('content')
    <div class="form-grids row widget-shadow col-md-6">
        <h2>Are you sure want to delete specialty: <span style="color: blue;">{{$specialty->name}}</span></h2>
        <form name="product" method="post" action="">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection

