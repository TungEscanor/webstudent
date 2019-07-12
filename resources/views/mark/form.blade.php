<div class="panel-body widget-shadow">
    <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="col-md-12">
            <div class="form-group">
                <div class="form-group">
                    <label for="name">Student:</label>
                    <select name="student_id" class="form-control" style="width: auto">
                        <option selected value="">Please chose Student</option>
                        @if(isset($mark) && isset($item))
                            @foreach($mark as $value)
                                <option value="{{$value ->student-> id}}" {{$value->student -> id == $item -> student_id ? "selected = 'selected'" : ""}}>{{$value->student -> name}}</option>
                            @endforeach
                        @elseif (isset($mark))
                            @foreach($mark as $value)
                                <option value="{{$value -> student-> id}}">{{$value->student -> name}}</option>
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
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="name">Subject:</label>
                    <select name="subject_id" class="form-control" style="width: auto">
                        <option selected value="">Please chose Subject</option>
                        @if(isset($mark) && isset($item))
                            @foreach($mark as $value)
                                <option value="{{$value ->subject-> id}}" {{$value->subject -> id == $item -> subject_id ? "selected = 'selected'" : ""}}>{{$value->subject -> name}}</option>
                            @endforeach
                        @elseif (isset($mark))
                            @foreach($mark as $value)
                                <option value="{{$value -> subject-> id}}">{{$value->subject -> name}}</option>
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
                <div class="form-group">
                    <label for="email">Mark :</label>
                    <input type="text" class="form-control-file border" name="mark" value="{{old('mark',isset($item -> mark) ? $item -> mark : '')}}">
                    @if($errors->has('mark'))
                        <div class="error-text text-danger">
                            {{$errors->first('mark')}}
                        </div>
                    @endif
                </div>
            </div>

        </div>
        <div class="clearfix"></div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
