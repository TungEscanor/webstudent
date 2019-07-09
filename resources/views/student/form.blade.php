<div class="panel-body widget-shadow">
    <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Student name:</label>
                <input type="text" class="form-control" name="name" value="{{old('name',isset($student -> name) ? $student -> name : '')}}" placeholder="Student name">
                @if($errors->has('name'))
                    <div class="error-text text-danger">
                        {{$errors->first('name')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Birthday :</label>
                <input type="date" name="birthday" id="" cols="" rows="7"  class="form-control">{{old('birthday',isset($student -> birthday) ? $student -> birthday : '')}} />
                @if($errors->has('birthday'))
                    <div class="error-text text-danger">
                        {{$errors->first('birthday')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Gender :</label>
                <select name="gender" class="form-control" style="width: auto">
                    <option value="1">Male</option>
                    <option value="0">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Hình ảnh :</label>
                <input type="file" class="form-control-file border" name="ar_avatar">
                @if($errors->has('avatar'))
                    <div class="error-text text-danger">
                        {{$errors->first('avatar')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Class:</label>
                <select name="class_id" class="form-control" style="width: auto">
                    <option selected value="">Please chose class</option>
                    @if(isset($classes) && isset($students))
                        @foreach($classes as $class)
                            <option value="{{$class -> id}}" {{$class -> id == $student -> class_id ? "selected = 'selected'" : ""}} >{{$clas -> name}}</option>
                        @endforeach
                    @else
                        @foreach($classes as $class)
                            <option value="{{$class -> id}}">{{$class -> name}}</option>
                        @endforeach
                    @endif
                </select>
                @if($errors->has('class_id'))
                    <div class="error-text text-danger">
                        {{$errors->first('class_id')}}
                    </div>
                @endif
            </div>
        </div>
        <div class="clearfix"></div>
        <button type="submit" class="btn btn-success">Lưu thông tin</button>
    </form>
</div>
