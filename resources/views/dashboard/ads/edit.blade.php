@extends('dashboard.index')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Eit Ad</h6>
        </div>
        <div class="card-body">
          @if($errors->any())
          <div class="alert alert-danger" role="alert"> There is something wrong
              @foreach ($errors->all() as $error )
                  <li>{{$error}}</li>
              @endforeach
          </div>
          @endif    
            <form action="{{route('dashboard.ads.update',$ad->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                  <label for="col-sm-2 col-form-label">Old Ad Image</label>
                  <div class="col-sm-10">
                    <img src="{{ $ad->image }}" width="50px" height="50px" alt="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-10">
                    <input name="image" type="file" class="form-control" id="inputEmail3" placeholder="Add ad image">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3"  class="col-sm-2 col-form-label">Duration</label>
                  <div class="col-sm-10">
                    <input type="number" value='{{ old('duration')?old('duration'):$ad->duration }}' name="duration" class="form-control" id="inputPassword3" placeholder="Duration(in seconds)">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3"  class="col-sm-2 col-form-label">Days</label>
                  <div class="col-sm-10">
                   <select name="day[]" id="" class="form-control" multiple>
                     @foreach ($days as $day)
                         <option  {{ (in_array($day->id,$adDays))?'selected ':'' }} value="{{ $day->id }}">{{ $day->name }}</option>
                     @endforeach
                   </select>
                  </div>
                </div>
                <fieldset class="form-group">
                  <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Ad type</legend>
                    <div class="col-sm-10">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" id="gridRadios1" value="1" {{ (old('type') == 1)? 'checked':''}}>
                        <label class="form-check-label" for="gridRadios1">
                         Vertical
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" id="gridRadios2" value="2" {{ (old('type') == 2)? 'checked':''}}>
                        <label class="form-check-label" for="gridRadios2">
                         Horizontal
                        </label>
                      </div>
                      
                    </div>
                  </div>
                </fieldset>
                <div class="form-group row">
                    <div class="col-sm-2">Pick The Time</div>
                    <div class="col-sm-10">
                      <div class="form-check">
                         <ol>
                            @foreach ($ad->time as $item)
                              <li class="mb-3"><input class="form-check-input" type="time"  value="{{$item->time}}" name="time[]"></li>
                            @endforeach
                          </ol>
                      
                      </div>
                    </div>
                </div>
                <a class="btn btn-info mb-4" id='addTime'>
                    <i class="fas fa-plus"></i>
                </a>
                <div class="form-group row">
                  <div class="col-sm-2">Active</div>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck1">
                      <label class="form-check-label" for="gridCheck1">
                        Activate
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group row mt-5">
                  <div class="col-sm-10">
                    <a href="{{route('dashboard.ads.index')}}" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </form>
        </div>
    </div>
</div>
<script>
   $(document).ready(function(){
  
  $("#addTime").click(function(){
    $("ol").prepend('<li class="mt-3"><input class="form-check-input" type="time"  name="time[]"></li>');
  });
});
    </script>
@endsection