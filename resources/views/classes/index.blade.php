@extends('layouts.master')
@section('title')
Class list
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="">Classes</a></li>
            <li class="breadcrumb-item active" aria-current="page">List</li>
        </ol>
    @include('flash-message')
    </nav>
    <div class="panel-body widget-shadow">
        <table class="table table-hover table-bordered">
            <h3 class="page-header">Classes Manage<a class="btn btn-sm btn-success pull-right" href="{{route('classes.create')}}" title=""><i class="fa fa-plus"></i></a></h3>
            <thead>
            <tr>
                <th>#</th>
                <th>Class name</th>
                <th>Faculty</th>
                <th>Show students</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if (isset($classes))
                @foreach($classes as $key => $class)
                    <tr>
                        <td>{{(($classes->currentPage() - 1 ) * $classes->perPage() ) + $key +1}}</td>
                        <td>{{$class->name}}</td>
                        <td>{{isset($class->faculty->name) ? $class->faculty->name : ''}}</td>
                        <td><a class="btn btn-success btn-sm" href="{{route('classes.show', $class->id)}}">Show student</a></td>
                        <td style="display: flex">
                            <a class="btn btn-primary btn-sm"  style="margin-right: 10px"  href="{{route('classes.edit',$class->id)}}" >Edit</a>
                            <div onclick="return confirm('Are you sure want to delete item ?')">
                                {{Form::open(['method' => 'DELETE', 'route' => ['classes.destroy', $class->id]])}}
                                {{Form::submit('Delete',['class' => 'btn btn-danger btn-sm'])}}
                                {{Form::close()}}
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        {{$classes ->links()}}
    </div>
@endsection