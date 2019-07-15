@extends('layouts.master')
@section('title')

@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-subject"><a href="">Home</a></li>
            <li class="breadcrumb-subject"><a href="">Subject</a></li>
            <li class="breadcrumb-subject active" aria-current="page">List</li>
        </ol>
    @include('flash-message')
    </nav>
    <div class="panel-body widget-shadow">
        <table class="table table-hover table-bordered">
            <h3 class="page-header">Subject Manage<a class="btn btn-sm btn-success pull-right" href="{{route('subjects.create')}}" title=""><i class="fa fa-plus"></i></a></h3>
            <thead>
            <tr>
                <th>#</th>
                <th>Subject name</th>
                <th>Faculty</th>
                <th>Show Mark</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if (isset($subjects))
                @foreach($subjects as $key => $subject)
                    <tr>
                        <td>{{(($subjects->currentPage() - 1 ) * $subjects->perPage() ) + $key +1}}</td>
                        <td>{{$subject->name}}</td>
                        <td>{{isset($subject->faculty->name) ? $subject->faculty->name : ''}}</td>
                        <td><a class="btn btn-success btn-sm" href="{{route('subjects.show',$subject->id)}}">Show mark</a></td>
                        <td style="display:flex;">
                            <a class="btn btn-primary btn-sm"  style="margin-right: 10px"  href="{{route('subjects.edit',$subject->id)}}" >Edit</a>
                            <div onclick="return confirm('Are you sure want to delete item ?')">
                                {{Form::open(['method' => 'DELETE', 'route' => ['subjects.destroy', $subject->id]])}}
                                {{Form::submit('Delete',['class' => 'btn btn-danger btn-sm'])}}
                                {{Form::close()}}
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        {{$subjects ->links()}}
    </div>
@endsection