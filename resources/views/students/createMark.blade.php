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
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $error }}</strong>
                </div>
            @endforeach
        @endif
        <div class="content-top-1">
            <h3 style="color:#5a6268;">{{$student->name}}</h3>
            {{Form::open(['route' => 'marks.store'])}}
            <div id="page-load">
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
                            {!! Form::select('subject_id[]',isset($subjects) ? $subjects : null ,null, ['class' => 'form-control','placeholder' => 'choose subject...']) !!}
                        </td>
                        <td>
                            {{Form::text('mark[]','',['class'=> 'form-control amount'])}}
                            {{ Form::hidden('student_id[]', $student->id) }}
                        </td>
                        <td><a href="#" class="btn btn-danger remove"><i class="fa fa-remove" style="color: white"></i></a>
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

            var form = $('.form-add').html();

            $('.clickadd').click(function () {
                $('.form-add').append(form);
            });

            $(document).on('click', '.remove', function () {
                var last = $('tbody.form-add tr').length;
                if (last === 1) {
                    alert('You cant remove it !');
                } else {
                    $(this).parent().parent().remove();
                }
            });
        });

        // var $select = $("select");
        // $select.on("change", function() {
        //     var selected = [];
        //     $.each($select, function(index, select) {
        //         if (select.value !== "") { selected.push(select.value); }
        //     });
        //     $("option").prop("disabled", false);
        //     for (var index in selected) { $('option[value="'+selected[index]+'"]').prop("disabled", true); }
        // });
    </script>
@endsection
