@extends('layouts.master')
@section('title')
    Create Mark
@endsection
@section('content')
    <div class="banner">
        <h2><a href="">Home</a><i class="fa fa-angle-right"></i><span>Student</span><i
                    class="fa fa-angle-right"></i><span>Create marks</span></h2>
    </div>
    <div class="grid-form">
        @include('flash-message')
        @if ($errors->any())
            <div class="alert alert-danger">
                <span>{{ 'subjects and marks cannot be null, mark from 0 to 10' }}</span>
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        @endif
        <div class="content-top-1">
            <h3 style="color:#5a6268;">{{$student->name}}</h3>
            {{Form::open(['route' => 'marks.storeMore'])}}
            <div id="page-load">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Mark</th>
                        <th class="clickadd"><i class="fa fa-plus btn btn-primary"></i></th>
                    </tr>
                    </thead>
                    <tbody id="form-add">
                    @if(isset($marks))
                        @foreach($marks as $mark)
                            <tr style="background-color: #9d9d9d" class="studentmark">
                                <td>
                                    <select class="form-control" name="subject_id[]">
                                        <option value="{{$mark->subject_id}}" selected>{{$mark->subject->name}}</option>
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control" name="mark[]" type="text" value="{{$mark->mark}}">
                                    <input name="student_id[]" type="hidden" value="{{$mark->student_id}}">
                                </td>
                                <td>
                                    <a onclick="return confirm('Are you sure want to delete item ?')"
                                       href="{{route('mark.post.destroy',$mark->id)}}" class="btn btn-danger remove"><i
                                                class="fa fa-remove" style="color: white"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    <tr class="addform">
                        <td>
                            {!! Form::select('subject_id[]',isset($subjects) ? $subjects : null ,null, ['class' => 'form-control','placeholder' => 'choose subject...']) !!}
                        </td>
                        <td>
                            {{Form::text('mark[]',null,['class'=> 'form-control'])}}
                            {{ Form::hidden('student_id[]', $student->id) }}
                        </td>
                        <td><i class="fa fa-remove btn btn-danger remove" style="color: white"></i>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            {{ Form::hidden('redirects_to', URL::previous()) }}
            <div class="clearfix"></div>
            {{Form::submit('Create', ['class'=> 'btn btn-success'])}}
            {{Form::close()}}

        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            var $select = $("select");
            var selected = [];
            $.each($select, function (index, select) {
                if (select.value !== "") {
                    selected.push(select.value);
                }
            });
            $("option").prop("disabled", false);
            for (var index in selected) {
                $('option[value="' + selected[index] + '"]').css("display","none");
            }
            var form = $('.addform').html();
            $('.clickadd').click(function () {
                $('#form-add').append('<tr>' + form + '</tr>');
                $.each($select, function (index, select) {
                    if (select.value !== "") {
                        selected.push(select.value);
                    }
                });
            });
            $(document).on('click', '.remove', function () {

                if ($(this).parent().parent().hasClass('studentmark')) {
                    stop();
                } else {
                    $(this).parent().parent().remove();
                }
                $.each($select, function (index, select) {
                    if (select.value !== "") {
                        selected.push(select.value);
                    }
                });
            });
        });
    </script>
@endsection
