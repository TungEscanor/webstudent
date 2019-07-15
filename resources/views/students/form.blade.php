<div class="panel-body widget-shadow">
    <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">students name:</label>
                <input type="text" class="form-control" name="name" student="{{old('name',isset($item -> name) ? $item -> name : '')}}" placeholder="students name">
                @if($errors->has('name'))
                    <div class="error-text text-danger">
                        {{$errors->first('name')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Birthday :</label>
                <input type="date" name="birthday" class="form-control" student="{{old('birthday',isset($item -> birthday) ? date('Y-m-d',strtotime($item->birthday)): '')}}" >
                @if($errors->has('birthday'))
                    <div class="error-text text-danger">
                        {{$errors->first('birthday')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Gender :</label>
                <select name="gender" class="form-control" style="width: auto">
                    <option selected student="">Please chose gender</option>
                    <option student="1">Male</option>
                    <option student="0">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Avatar :</label>
                <input type="file" class="form-control-file border" name="avatar" student="{{old('avatar',isset($item -> avatar) ? $item -> avatar : '')}}">
                @if($errors->has('avatar'))
                    <div class="error-text text-danger">
                        {{$errors->first('avatar')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="name">Specialty:</label>
                    <select name="specialty_id" class="form-control" style="width: auto">
                        <option selected student="">Please chose specialty</option>
                        @if(isset($students) && isset($item))
                            @foreach($students as $value)
                                <option student="{{$value ->specialty-> id}}" {{$value ->specialty -> id == $item -> specialty_id ? "selected = 'selected'" : ""}}>{{$value -> specialty-> name}}</option>
                            @endforeach
                        @elseif(isset($students))
                            @foreach($students as $value)
                                <option student="{{$value ->specialty-> id}}">{{$value -> specialty-> name}}</option>
                            @endforeach
                        @else
                            <option student=""></option>
                        @endif
                    </select>
                    @if($errors->has('class_id'))
                        <div class="error-text text-danger">
                            {{$errors->first('class_id')}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
