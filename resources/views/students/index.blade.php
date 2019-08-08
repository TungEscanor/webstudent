@extends('layouts.master')
@section('title')
    Student list
@endsection
@section('content')
    <div class="banner">
        <h2><a href="">Home</a><i class="fa fa-angle-right"></i><span>Student</span><i
                    class="fa fa-angle-right"></i><span>List students</span></h2>
    </div>
    <div class="grid-form">
        @include('flash-message')
        <div class="content-top-1">
            {{Form::open(['method' => 'GET', 'route' => 'students.index', 'class' => 'form-inline'])}}
            <div class="form-group" style="margin-right: 50px">
                {{Form::label('min1','Age from: ')}}
                {{Form::text('min_age',isset($data['min_age']) ? $data['min_age'] : null, ['id'=> 'min1','class' => 'form-control','style' => 'width: 60px'])}}
                {{Form::label('max1','To: ')}}
                {{Form::text('max_age',isset($data['max_age']) ? $data['max_age'] : null, ['id'=> 'max1','class' => 'form-control','style' => 'width: 60px'])}}
            </div>
            <div class="form-group">
                <label for="Subject">Subject</label>
                <select class="form-control" id="Subject" name="subject_id">
                    <option value="">Select subject</option>
                    @foreach($subjects as $subject)
                        <option value="{{$subject->id}}" {{isset($data['subject_id']) && ($subject->id == $data['subject_id']) ? 'selected' : ''}} >{{$subject->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" style="margin-left: 20px">
                {{Form::label('mark1','Mark from: ')}}
                {{Form::text('min_mark',isset($data['min_mark']) ? $data['min_mark'] : null, ['id'=> 'mark1','class' => 'form-control','style' => 'width: 60px'])}}
                {{Form::label('mark2','To: ')}}
                {{Form::text('max_mark',isset($data['max_mark']) ? $data['max_mark'] : null, ['id'=> 'mark2','class' => 'form-control','style' => 'width: 60px'])}}
            </div>
            <br><br>
            <div class="form-group">
                <span><b>Mobile network:</b></span>
                <div class="form-check" style="display: inline-block">
                    {{Form::checkbox('phones[viettel]','^(016[2-9]|09[678])[0-9]{7}$',!empty(\Request::get('phones')['viettel']) && \Request::get('phones')['viettel'] =='^(016[2-9]|09[678])[0-9]{7}$',['id' => 'check1'])}}
                    {{Form::label('check1','Viettel')}}

                </div>

                <div class="form-check" style="display: inline-block">
                    {{Form::checkbox('phones[mobiphone]','^(012[01268]|09[03])[0-9]{7}$',!empty(\Request::get('phones')['mobiphone']) && \Request::get('phones')['mobiphone'] == '^(012[01268]|09[03])[0-9]{7}$',['id' => 'check2'])}}
                    {{Form::label('check2','Mobiphone')}}
                </div>

                <div class="form-check" style="display: inline-block">
                    {{Form::checkbox('phones[vinaphone]','^(012[34579]|09[14])[0-9]{7}$',!empty(\Request::get('phones')['vinaphone']) && \Request::get('phones')['vinaphone'] == '^(012[34579]|09[14])[0-9]{7}$',['id' => 'check3'])}}
                    {{Form::label('check3','Vinaphone')}}
                </div>
                <div class="form-check" style="display: inline-block;margin-left: 50px">
                    {!! Form::label('check4','Complete all subject: ',['style' => 'font-weight:bold'] ) !!}
                    {{Form::checkbox('done','1',!empty(\Request::get('done')) && \Request::get('done') == 1,['id' => 'check4'])}}
                    {{Form::label('check5',' Or not')}}
                    {{Form::checkbox('not_done','1',!empty(\Request::get('not_done')) && \Request::get('not_done') == 1,['id' => 'check5'])}}

                </div>
                <div class="form-check" style="display: inline-block;margin-left: 50px">
                    {!! Form::label('check6','AVG < 5: ',['style' => 'font-weight:bold'] ) !!}
                    {{Form::checkbox('less_5','1',!empty(\Request::get('less_5')) && \Request::get('less_5') == 1,['id' => 'check6'])}}
                    {{Form::label('check7',' Or not')}}
                    {{Form::checkbox('greater_5','1',!empty(\Request::get('greater_5')) && \Request::get('greater_5') == 1,['id' => 'check7'])}}

                </div>
            </div>
            <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i></button>
            {{Form::close()}}
            <table class="table table-hover table-bordered">
                @if(!Auth::check())
                <a class="btn btn-sm btn-success pull-right" style="margin-top: 10px;margin-bottom: 10px"
                   href="{{route('register')}}" title=""><i class="fa fa-plus"></i></a>
                @endif
                <a class="btn btn-sm btn-danger pull-left" style="margin-top: 10px;margin-bottom: 10px"
                   href="{{route('students.bad')}}" title="">Send Email</a>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Student name</th>
                    <th>Class</th>
                    <th>Gender</th>
                    <th>Birthday</th>
                    <!--<th>Age</th>-->
                    <th style="width: 150px">Phone number</th>
                    <th>Avatar</th>
                    <th>Mark</th>
                    <th colspan="2" style="text-align: center;width: 30px">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $key =>  $student)
                    <tr>
                        <td>{{($students->currentPage() - 1 ) * $students->perPage() + $key +1}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{isset($student->classRelation->name) ? $student->classRelation->name : ''}}</td>
                        <td>{{$student->gender}}</td>
                        <td>{{date( 'd/m/Y',strtotime($student->birthday))}}</td>
                    <!-- <td>{{\Illuminate\Support\Carbon::parse($student->birthday)->age}}</td> -->
                        <td>{{(!empty ($student->phone_number)) ? rtrim($student->phone_number) : '' }}</td>
                        <td><img src="{{asset(pare_url_file( $student ->avatar))}}" alt="" class="img img-responsive"
                                 width="50px" height="50px"></td>
                        <td><a class="btn btn-success btn-sm"  href="{{route('students.show',
                        ['student_id' => $student->id,
                        'subject_id' => !empty(\Request::get('subject_id')) ? \Request::get('subject_id') : 'all',
                        'min_mark' => !empty(\Request::get('min_mark')) ? \Request::get('min_mark') : 'all',
                        'max_mark' => !empty(\Request::get('max_mark')) ? \Request::get('max_mark') : 'all',])}}" target="_blank"><i style="color: white" class="fa fa-share"></i></a></td>
                        <td style="">
                            <a class="btn btn-primary btn-sm" title="Edit"
                               href="{{route('students.edit', $student->id)}}"><i class="fa fa-edit" style="color: white"></i></a>
                        </td>
                        <td>
                            <div style="" class="d-inline-block" title="Delete"
                                 onclick="return confirm('Are you sure want to delete item ?')">
                                {{Form::open(['method' => 'DELETE', 'route' => ['students.destroy', $student->id]])}}
                                {!! Form::submit('&times;',['class' => 'btn btn-danger btn-sm']) !!}
                                {{Form::close()}}
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{$students->appends($data)->links()}}
    </div>
@endsection