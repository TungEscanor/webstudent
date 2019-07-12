@extends('layouts.master')
@section('title')

@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="">Student</a></li>
            <li class="breadcrumb-item active" aria-current="page">List</li>
        </ol>
    @include('flash-message')
    </nav>
    <div class="panel-body widget-shadow">
        <table class="table table-hover table-bordered">
            <h3 class="page-header">Student Manager<a class="btn btn-sm btn-success pull-right" href="{{route('student.create')}}" title=""><i class="fa fa-plus"></i></a></h3>
            <thead>
            <tr>
                <th>#</th>
                <th>Student name</th>
                <th>Class</th>
                <th>Gender</th>
                <th>Avatar</th>
                <th>Birthday</th>
                <th>Mark</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if (isset($student))
                @foreach($student as $key => $value)
                    <tr>
                        <td>{{$key +1}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->specialty->name}}</td>
                        <td>{{$value->gender == 1 ? 'Male' : 'Female'}}</td>
                        <td><img src="{{url($value->avatar)}}" alt="" width="50px" height="50px"></td>
                        <td>{{date( 'd/m/Y',strtotime($value->birthday))}}</td>
                        <td><a class="btn btn-success" href="{{route('student.mark',$value->id)}}">Show mark</a></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{route('student.edit',$value->id)}}"><b><i class="fa fa-edit" title="Edit"></i></b></a>
                            <a class="btn btn-danger btn-sm" href="{{route('student.delete',$value->id)}}" title="Delete"><b><i class="fa fa-remove"></i></b></a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        {{$student ->links()}}
    </div>
@endsection