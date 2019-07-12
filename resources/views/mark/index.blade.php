@extends('layouts.master')
@section('title')

@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="">Mark</a></li>
            <li class="breadcrumb-item active" aria-current="page">List</li>
        </ol>
    @include('flash-message')
    </nav>
    <div class="panel-body widget-shadow">
        <table class="table table-hover table-bordered">
            <h3 class="page-header">Mark Manager<a class="btn btn-sm btn-success pull-right" href="{{route('mark.create')}}" title=""><i class="fa fa-plus"></i></a></h3>
            <thead>
            <tr>
                <th>#</th>
                <th>Student</th>
                <th>Subject</th>
                <th>Mark</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if (isset($mark))
                @foreach($mark as $key => $value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->student->name}}</td>
                        <td>{{$value->subject->name}}</td>
                        <td>{{number_format($value->mark,2)}}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{route('mark.edit',$value->id)}}"><b><i class="fa fa-edit" title="Edit"></i></b></a>
                            <a class="btn btn-danger btn-sm" href="{{route('mark.delete',$value->id)}}" title="Delete"><b><i class="fa fa-remove"></i></b></a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        {{$mark ->links()}}
    </div>
@endsection