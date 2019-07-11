@extends('layouts.master')
@section('title')

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
            <h3 class="page-header">Class Manage<a class="btn btn-sm btn-success pull-right" href="{{route('class.create')}}" title=""><i class="fa fa-plus"></i></a></h3>
            <thead>
            <tr>
                <th>#</th>
                <th>Class name</th>
                <th>Faculty</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if (isset($classes))
                @foreach($classes as $key => $class)
                    <tr>
                        <td>{{$key +1}}</td>
                        <td>{{$class->name}}</td>
                        <td>{{isset($class->faculty->id) ? $class->faculty->name : '[N\A]'}}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{route('class.edit',$class->id)}}"><b><i class="fa fa-edit" title="Sửa"></i></b></a>
                            <a class="btn btn-danger btn-sm" href="{{route('class.delete',$class->id)}}" title="Xóa"><b><i class="fa fa-remove"></i></b></a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        {{$classes ->links()}}
    </div>
@endsection