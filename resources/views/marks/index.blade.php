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
            <h3 class="page-header">Mark Manager<a class="btn btn-sm btn-success pull-right" href="{{route('marks.create')}}" title=""><i class="fa fa-plus"></i></a></h3>
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
            @if (isset($marks))
                @foreach($marks as $key => $mark)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$mark->student->name}}</td>
                        <td>{{$mark->subject->name}}</td>
                        <td>{{number_format($mark->mark,2)}}</td>
                        <td style="display: flex">
                            <a class="btn btn-primary btn-sm"  style="margin-right: 10px"  href="{{route('marks.edit',$mark->id)}}" >Edit</a>
                            <div onclick="return confirm('Are you sure want to delete item ?')">
                                {{Form::open(['method' => 'DELETE', 'route' => ['marks.destroy', $mark->id]])}}
                                {{Form::submit('Delete',['class' => 'btn btn-danger btn-sm'])}}
                                {{Form::close()}}
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        {{$marks ->links()}}
    </div>
@endsection