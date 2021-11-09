@extends('dashboard.index')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New Ad</h6>
        </div>
        <div class="card-body">
          @if($errors->any())
          <div class="alert alert-danger" role="alert"> There is something wrong
              @foreach ($errors->all() as $error )
                  <li>{{$error}}</li>
              @endforeach
          </div>
          @endif    
            <form action="{{route('dashboard.ads.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                  <div class="col-sm-10">
                    <input name="image" type="file" class="form-control" id="inputEmail3" placeholder="Add ad image">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3"  class="col-sm-2 col-form-label">Duration</label>
                  <div class="col-sm-10">
                    <input type="number" value='{{ old('duration') }}' name="duration" class="form-control" id="inputPassword3" placeholder="Duration(in seconds)">
                  </div>
                </div>
                <fieldset class="form-group">
                  <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Ad type</legend>
                    <div class="col-sm-10">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" id="gridRadios1" value="1" checked>
                        <label class="form-check-label" for="gridRadios1">
                         Vertical
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" id="gridRadios2" value="2">
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
                            {{-- <li class="mb-3"><input class="form-check-input" type="time"  name="time[]" min="09:00" max="18:00"></li> --}}
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
                    <button type="submit" class="btn btn-primary">Create</button>
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