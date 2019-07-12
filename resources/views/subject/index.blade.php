@extends('layouts.master')
@section('title')

@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="">Subject</a></li>
            <li class="breadcrumb-item active" aria-current="page">List</li>
        </ol>
    @include('flash-message')
    </nav>
    <div class="panel-body widget-shadow">
        <table class="table table-hover table-bordered">
            <h3 class="page-header">Subject Manage<a class="btn btn-sm btn-success pull-right" href="{{route('subject.create')}}" title=""><i class="fa fa-plus"></i></a></h3>
            <thead>
            <tr>
                <th>#</th>
                <th>Subject name</th>
                <th>Show Mark</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if (isset($subject))
                @foreach($subject as $key => $item)
                    <tr>
                        <td>{{$key +1}}</td>
                        <td>{{$item->name}}</td>
                        <td><a class="btn btn-success" href="{{route('subject.mark',$item->id)}}">Show mark</a></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{route('subject.edit', $item->id)}}"><b><i class="fa fa-edit" title="Edit"></i></b></a>
                            <a class="btn btn-danger btn-sm" href="{{route('subject.delete',$item->id)}}" title="Delete"><b><i class="fa fa-remove"></i></b></a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        {{$subject ->links()}}
    </div>
@endsection