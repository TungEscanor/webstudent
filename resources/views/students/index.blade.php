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
                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                {{Form::label('mark1','Mark from: ')}}
                {{Form::text('min_mark',isset($data['min_mark']) ? $data['min_mark'] : null, ['id'=> 'mark1','class' => 'form-control','style' => 'width: 60px'])}}
                {{Form::label('mark2','To: ')}}
                {{Form::text('max_mark',isset($data['max_mark']) ? $data['max_mark'] : null, ['id'=> 'mark2','class' => 'form-control','style' => 'width: 60px'])}}
            </div>
            <br><br>
            <div class="form-group">
                <span><b>Mobile network:</b></span>
                <div class="form-check" style="display: inline-block">
                    <input class="form-check-input" type="checkbox" value="^(016[2-9]|09[678])[0-9]{7}$"
                           id="defaultCheck1"
                           name="phones[viettel]" {{isset($data['phones']['viettel']) ? 'checked' : ''}}>
                    <label class="form-check-label" for="defaultCheck1">
                        Viettel
                    </label>
                </div>

                <div class="form-check" style="display: inline-block">
                    <input class="form-check-input" type="checkbox" value="^(012[01268]|09[03])[0-9]{7}$"
                           id="checkbox1"
                           name="phones[mobiphone]" {{isset($data['phones']['mobiphone']) ? 'checked' : ''}}>
                    <label class="form-check-label" for="checkbox1">
                        Mobiphone
                    </label>
                </div>

                <div class="form-check" style="display: inline-block">
                    <input class="form-check-input" type="checkbox" value="^(012[34579]|09[14])[0-9]{7}$"
                           id="defaultCheck2"
                           name="phones[vinaphone]" {{isset($data['phones']['vinaphone']) ? 'checked' : ''}}>
                    <label class="form-check-label" for="defaultCheck2">
                        Vinaphone
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-secondary"><i class="fa fa-search"></i></button>
            </form>
            <table class="table table-hover table-bordered">
                <a class="btn btn-sm btn-success pull-right" style="margin-top: 10px"
                   href="{{route('students.create')}}" title=""><i class="fa fa-plus"></i></a>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Student name</th>
                    <th>Class</th>
                    <th>Gender</th>
                    <th>Birthday</th>
                    <!--<th>Age</th>-->
                    <th style="width: 50px">Phone number</th>
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
                        <td><a class="btn btn-success btn-sm"  href="{{route('students.show',$student->id)}}"><i style="color: white" class="fa fa-share"></i></a></td>
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