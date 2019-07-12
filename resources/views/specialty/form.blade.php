<div class="panel-body widget-shadow">
    <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Specialty name:</label>
                <input type="text" class="form-control" name="name" value="{{old('name',isset($item -> name) ? $item -> name : '')}}" placeholder="Class name">
                @if($errors->has('name'))
                    <div class="error-text text-danger">
                        {{$errors->first('name')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Faculty:</label>
                <select name="faculty_id" class="form-control" style="width: auto">
                    <option selected value="">Please chose faculty</option>
                    @if(isset($specialty) && isset($item))
                        @foreach($specialty as $value)
                            <option value="{{$value ->faculty-> id}}" {{$value ->faculty -> id == $item -> faculty_id ? "selected = 'selected'" : ""}}>{{$value -> faculty-> name}}</option>
                        @endforeach
                    @elseif(isset($specialty))
                        @foreach($specialty as $value)
                            <option value="{{$value ->faculty-> id}}">{{$value -> faculty-> name}}</option>
                        @endforeach
                    @else
                        <option value=""></option>
                    @endif
                </select>
                @if($errors->has('faculty_id'))
                    <div class="error-text text-danger">
                        {{$errors->first('faculty_id')}}
                    </div>
                @endif
            </div>
        </div>
        <div class="clearfix"></div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
