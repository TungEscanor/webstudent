<div subject="panel-body widget-shadow">
    <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div subject="col-md-12">
            <div subject="form-group">
                <div subject="form-group">
                    <label for="name">subject:</label>
                    <select name="subject_id" class="form-control" style="width: auto">
                        <option selected value="">Please chose subject</option>
                        @if(isset($subjects) && isset($mark))
                            @foreach($subjects as $subject)
                                <option value="{{$subject -> id}}" {{$subject -> id == $mark -> subject_id ? "selected = 'selected'" : ""}}>{{$subject -> name}}</option>
                            @endforeach
                        @elseif (isset($subjects))
                            @foreach($subjects as $subject)
                                <option value="{{$subject -> id}}">{{$subject -> name}}</option>
                            @endforeach
                        @else
                            <option value=""></option>
                        @endif
                    </select>
                    @if($errors->has('subject_id'))
                        <div class="error-text text-danger">
                            {{$errors->first('subject_id')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="name">Student:</label>
                <select name="student_id" class="form-control" style="width: auto">
                    <option selected value="">Please chose student</option>
                    @if(isset($students) && isset($mark))
                        @foreach($students as $student)
                            <option value="{{$student -> id}}" {{$student -> id == $mark -> student_id ? "selected = 'selected'" : ""}}>{{$student -> name}}</option>
                        @endforeach
                    @elseif (isset($students))
                        @foreach($students as $student)
                            <option value="{{$student -> id}}">{{$student -> name}}</option>
                        @endforeach
                    @else
                        <option value=""></option>
                    @endif
                </select>
                @if($errors->has('student_id'))
                    <div class="error-text text-danger">
                        {{$errors->first('student_id')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Mark :</label>
                <input type="text" class="form-control-file border" name="mark" value="{{old('mark',isset($mark -> mark) ? $mark -> mark : '')}}">
                @if($errors->has('mark'))
                    <div class="error-text text-danger">
                        {{$errors->first('mark')}}
                    </div>
                @endif
            </div>
        </div>
        <div class="clearfix"></div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
