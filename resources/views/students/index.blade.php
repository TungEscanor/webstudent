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
    <div class="forms">
        <div class="col-md-12" style="margin: 10px;">
            <form class="form-inline" action="{{route('students.index')}}" method="get">
                <div class="form-group" style="margin-right: 50px">
                    <label for="min1"><b>Age From :</b></label>
                    <input type="text" name="min_age" value="" id="min1" class="form-control" style="width: 60px;">
                    <label for="max1"><b>To :</b></label>
                    <input type="text" name="max_age" value="" id="max1" class="form-control" style="width: 60px;">
                </div>
                <div class="form-group">
                <span><b>Mobile network:</b></span>
                    <div class="form-check" style="display: inline-block">
                        <input class="form-check-input" type="checkbox" value="^(016[2-9]|09[678])[0-9]{7}$" id="defaultCheck1" name="phones[viettel]">
                        <label class="form-check-label" for="defaultCheck1">
                            Viettel
                        </label>
                    </div>

                    <div class="form-check" style="display: inline-block">
                        <input class="form-check-input" type="checkbox" value="^(012[01268]|09[03])[0-9]{7}$" id="checkbox1" name="phones[mobiphone]">
                        <label class="form-check-label" for="checkbox1">
                            Mobiphone
                        </label>
                    </div>

                    <div class="form-check" style="display: inline-block">
                        <input class="form-check-input" type="checkbox" value="^(012[34579]|09[14])[0-9]{7}$" id="defaultCheck2" name="phones[vinaphone]">
                        <label class="form-check-label" for="defaultCheck2">
                            Vinaphone
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <div class="panel-body widget-shadow">
        <table class="table table-hover table-bordered">
            <a class="btn btn-sm btn-success pull-right" style="margin-top: 10px" href="{{route('students.create')}}" title=""><i class="fa fa-plus"></i></a>
            <thead>
            <tr>
                <th>#</th>
                <th>Student name</th>
                <th>Class</th>
                <th>Gender</th>
                <th>Birthday</th>
                <!--<th>Age</th>-->
                <th>Phone number</th>
                <th>Avatar</th>
                <th>Mark</th>
                <th colspan="2" style="text-align: center">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $key =>  $student)
                <tr style="">
                    <td>{{($students->currentPage() - 1 ) * $students->perPage() + $key +1}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{isset($student->classRelation->name) ? $student->classRelation->name : ''}}</td>
                    <td>{{$student->gender}}</td>
                    <td>{{date( 'd/m/Y',strtotime($student->birthday))}}</td>
                   <!-- <td>{{\Illuminate\Support\Carbon::parse($student->birthday)->age}}</td> -->
                    <td>{{(!empty ($student->phone_number)) ? rtrim($student->phone_number) : '' }}</td>
                    <td><img src="{{asset(pare_url_file( $student ->avatar))}}" alt="" class="img img-responsive" width="50px" height="50px"></td>
                    <td><a class="btn btn-success btn-sm" href="{{route('students.show',$student->id)}}">Show mark</a></td>
                    <td style="">
                        <a class="btn btn-primary btn-sm" style="margin-right: 10px" href="{{route('students.edit', $student->id)}}">Edit</a>
                    </td>
                    <td>
                        <div style="" class="d-inline-block" onclick="return confirm('Are you sure want to delete item ?')">
                            {{Form::open(['method' => 'DELETE', 'route' => ['students.destroy', $student->id]])}}
                            {{Form::submit('Delete',['class' => 'btn btn-danger btn-sm'])}}
                            {{Form::close()}}
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$students->links()}}
    </div>
@endsection