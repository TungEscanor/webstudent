@extends('layouts.master')
@section('title')

@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="">Specialty</a></li>
            <li class="breadcrumb-item active" aria-current="page">List</li>
        </ol>
    @include('flash-message')
    </nav>
    <div class="panel-body widget-shadow">
        <table class="table table-hover table-bordered">
            <h3 class="page-header">specialty Manage<a class="btn btn-sm btn-success pull-right" href="{{route('specialty.create')}}" title=""><i class="fa fa-plus"></i></a></h3>
            <thead>
            <tr>
                <th>#</th>
                <th>specialty name</th>
                <th>Faculty</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if (isset($specialty))
                @foreach($specialty as $key => $value)
                    <tr>
                        <td>{{$key +1}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{isset($value->faculty->name) ? $value->faculty->name : '[N\A]'}}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{route('specialty.edit',$value->id)}}"><b><i class="fa fa-edit" title="Edit"></i></b></a>
                            <a class="btn btn-danger btn-sm" href="{{route('specialty.delete',$value->id)}}" title="Remove"><b><i class="fa fa-remove"></i></b></a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        {{$specialty ->links()}}
    </div>
@endsection