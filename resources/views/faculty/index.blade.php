@extends('layouts.master')
@section('title')

@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="">Faculties</a></li>
            <li class="breadcrumb-item active" aria-current="page">List</li>
        </ol>
    </nav>
    <div class="panel-body widget-shadow">
        <table class="table table-hover table-bordered">
            <h3 class="page-header">Faculty Manage<a class="btn btn-sm btn-success pull-right" href="{{route('faculty.create')}}" title=""><i class="fa fa-plus"></i></a></h3>
            <thead>
            <tr>
                <th>#</th>
                <th>Faculty name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if (isset($faculties))
                @foreach($faculties as $faculty)
                    <tr>
                        <td>{{$faculty->name}}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{route('faculty.edit')}}"><b><i class="fa fa-edit" title="Sửa"></i></b></a>
                            <a class="btn btn-danger btn-sm" href="{{route('faculty.delete')}}" title="Xóa"><b><i class="fa fa-remove"></i></b></a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection