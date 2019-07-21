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
        <div class="content-top-1">
            {{Form::open(['route' => 'marks.store'])}}
            <div >
                <table class="table">
                    <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Mark</th>
                        <th class="clickadd"><i class="fa fa-plus btn btn-primary"></i></th>
                    </tr>
                    </thead>
                    <tbody class="form-add">
                    <tr>
                        <td>
                        {!! Form::select('subject_id[]',isset($subjects) ? $subjects : null ,null, ['class' => 'form-control amount']) !!}
                            @if($errors->has('subject_id'))
                                <div class="error-text text-danger">
                                    {{$errors->first('subject_id')}}
                                </div>
                            @endif
                        </td>
                        <td>
                        {{Form::text('mark[]','',['class'=> 'form-control amount'])}}
                            @if($errors->has('mark'))
                                <div class="error-text text-danger">
                                    {{$errors->first('mark')}}
                                </div>
                            @endif
                        </td>
                        <td><a href="#" class="btn btn-danger remove"><i class="fa fa-remove" style="color: white"></i></a></td>
                    </tr>
                    </tbody>
                {{ Form::hidden('student_id[]', $student->id) }}
                </table>
            </div>
            {{ Form::hidden('redirects_to', URL::previous()) }}
            <div class="clearfix"></div>
            {{Form::submit('Create', ['class'=> 'btn btn-success'])}}
            {{Form::close()}}
        </div>
    </div>

<script type="text/javascript">
    $(document).ready(function () {

        var form =$('.form-add').html();

        $('.clickadd').click(function () {
                $('.form-add').append(form);
        });

        $(document).on('click','.remove',function () {
            var last =$('tbody.form-add tr').length;
            if(last === 1) {
                alert('You cant remove it !');
            }
            else {
                $(this).parent().parent().remove();
            }
        });
    })
</script>
@endsection
