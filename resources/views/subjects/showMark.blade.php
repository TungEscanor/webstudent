@extends('layouts.master')
@section('title')
    Students Mark
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item"><a href="">Mark</a></li>
            <li class="breadcrumb-item active" aria-current="page">List</li>
        </ol>
    </nav>
    <div class="panel-body widget-shadow">
        <table class="table table-hover table-bordered">
            <h3 class="page-header">Subject Mark<a class="btn btn-sm btn-success pull-right" href="{{route('mark.create')}}" title=""><i class="fa fa-plus"></i></a></h3>
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
                        <td>{{($marks->currentPage() - 1 ) * $marks->perPage() + $key +1}}</td>
                        <td>{{$mark->student->name}}</td>
                        <td>{{$mark->subject->name}}</td>
                        <td>{{number_format($mark->mark,2)}}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{route('mark.edit',$mark->id)}}"><b><i class="fa fa-edit" title="Edit"></i></b></a>
                            <a class="btn btn-danger btn-sm" href="{{route('mark.delete',$mark->id)}}" title="Delete"><b><i class="fa fa-remove"></i></b></a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        {{$marks->links()}}
    </div>
@endsection
