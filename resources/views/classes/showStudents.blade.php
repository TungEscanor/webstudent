@extends('layouts.master')
@section('title')
    Student list
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
            <h3 class="page-header">Student Manager<a class="btn btn-sm btn-success pull-right" href="{{route('students.create')}}" title=""><i class="fa fa-plus"></i></a></h3>
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
            @foreach($students as  $student)
                <tr>
                    <td>{{$student->id}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->classRelation->name}}</td>
                    <td>{{$student->gender == 1 ? 'Male' : 'Female'}}</td>
                    <td><img src="{{url($student->avatar)}}" alt="" width="50px" height="50px"></td>
                    <td>{{date( 'd/m/Y',strtotime($student->birthday))}}</td>
                    <td><a class="btn btn-success" href="{{route('students.show',$student->id)}}">Show mark</a></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{route('students.edit',$student->id)}}"><b><i
                                        class="fa fa-edit" title="Edit"></i></b></a>
                        <a class="btn btn-danger btn-sm" href="{{route('students.destroy',$student->id)}}"
                           title="Delete"><b><i class="fa fa-remove"></i></b></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$students->links()}}
    </div>
@endsection