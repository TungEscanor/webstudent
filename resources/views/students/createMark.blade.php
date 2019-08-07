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
        @if ($errors->any())
            <div class="alert alert-danger">
                <span>{{ 'subjects and marks cannot be null, mark from 0 to 10' }}</span>
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        @endif
        <div class="content-top-1">
            <h3 style="color:#5a6268;">{{$student->name}}</h3>
            {{Form::open(['route' => ['marks.storeMore','student_id' => $student->id],'id'=>'my-form'])}}
            <div id="page-load">
                <p id="number-subject" style="display: none">{{count($subjects)}}</p>
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
                            <tr  class="studentmark">
                                <td style="background-color: whitesmoke">
                                    <select class="form-control" name="subject_id[]">
                                        <option value="{{$mark->subject_id}}" selected>{{$mark->subject->name}}</option>
                                    </select>
                                </td>
                                <td>
                                    <input class="form-control mark" name="mark[]" type="text" value="{{$mark->mark}}">
                                </td>
                                <td>
                                    <i class="fa fa-remove btn btn-danger remove-item" style="color: white"></i>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    <tr class="addform">
                        <td>
                            {!! Form::select('subject_id[]',isset($subjects) ? $subjects : null ,null, ['class' => 'form-control','placeholder' => 'choose subject...']) !!}
                        </td>
                        <td>
                            {{Form::text('mark[]',null,['class'=> 'form-control mark'])}}
                        </td>
                        <td><i class="fa fa-remove btn btn-danger remove-item" style="color: white"></i>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            {{ Form::hidden('redirects_to', URL::previous()) }}
            <div class="clearfix"></div>
            {{Form::submit('Save', ['class'=> 'btn btn-success'])}}
            {{Form::close()}}

        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            var form = $('.addform').html();
            $('.clickadd').click(function () {
                var len = $('tbody#form-add tr').length;
                var subject = $('p#number-subject').html();
                if(len < subject) {
                    $('#form-add').append('<tr>' + form + '</tr>');
                } else {alert('student has '+ subject + ' subject !')}
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
            });
            $(document).on('click','.remove-item', function () {
                    $(this).parent().parent().remove();
                var $select = $("select");
                var selected = [];
                $.each($select, function (index, select) {
                    if (select.value !== "") {
                        selected.push(select.value);
                    }
                });
                var del =  $(this).parent().parent().find('select').val();
                selected.splice(selected.indexOf(del.toString()),1);
                $("option").prop("disabled", false);
                for (var index in selected) {
                    $('option[value="' + selected[index] +'"]').css("display","none");
                }
            });
            $(document).on('click','select',function () {
                var $select = $("select");
                var selected = [];
                $.each($select, function (index, select) {
                    if (select.value !== "") {
                        selected.push(select.value);
                    }
                });
                $('select > option').not(this).css('display','block');
                $("option").prop("disabled", false);
                for (var index in selected) {
                    $('option[value="' + selected[index] +'"]').css("display","none");
                }
                $(this).parent().parent().find('td > i.remove-item').on('click',function () {
                    var del =  $(this).val();
                    selected.splice(selected.indexOf(del.toString()),1);
                    for (var index in selected) {
                        $('option[value="' + selected[index] +'"]').css("display","block");
                    }
                });
            });
        });
    </script>
@endsection
