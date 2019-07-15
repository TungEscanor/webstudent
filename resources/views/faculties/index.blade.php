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
    @include('flash-message')
    <div class="panel-body widget-shadow">
        <table class="table table-hover table-bordered">
            <h3 class="page-header">Faculty Manage<a class="btn btn-sm btn-success pull-right" href="{{route('faculties.create')}}" title=""><i class="fa fa-plus"></i></a></h3>
            <thead>
            <tr>
                <th>#</th>
                <th>Faculty name</th>
                <th>Show class</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if (isset($faculties))
                @foreach($faculties as $key => $faculty)
                    <tr>
                        <td>{{(($faculties->currentPage() - 1 ) * $faculties->perPage() ) + $key +1}}</td>
                        <td>{{$faculty->name}}</td>
                        <td><a class="btn btn-success btn-sm" href="{{route('faculties.show', $faculty->id)}}">Show class</a></td>
                        <td style="display: flex;border-collapse: collapse">
                            <a class="btn btn-primary btn-sm" style="margin-right: 10px" href="{{route('faculties.edit', $faculty->id)}}">Edit</a>
                            <div style="" class="d-inline-block" onclick="return confirm('Are you sure want to delete item ?')">
                                {{Form::open(['method' => 'DELETE', 'route' => ['faculties.destroy', $faculty->id]])}}
                                {{Form::submit('Delete',['class' => 'btn btn-danger btn-sm'])}}
                                {{Form::close()}}
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection