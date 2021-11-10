@extends('dashboard.index')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
        </div>
        <div class="card-body">
          @if($errors->any())
          <div class="alert alert-danger" role="alert"> There is something wrong
              @foreach ($errors->all() as $error )
                  <li>{{$error}}</li>
              @endforeach
          </div>
          @endif    
            <form action="{{route('dashboard.setting.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="d-flex justify-content-center mb-3">
                  <img width="300" height="300" class="avatar" id='adminAvatar' 
                  src={{(auth()->user()->image)?auth()->user()->image:'https://st4.depositphotos.com/14953852/24787/v/600/depositphotos_247872612-stock-illustration-no-image-available-icon-vector.jpg'}}
                  />
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Avatar</label>
                  <div class="col-sm-10">
                    <input name="image" type="file" class="form-control" id="inputEmail3" placeholder="Add ad image">
                  </div>
                </div>
               <div class="form-group row">
                  <label for="inputPassword3"  class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" value='{{ old('name')?old('name'):auth()->user()->name }}' name="name" class="form-control" id="nameInput" placeholder="Put your name">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3"  class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" value='{{ old('email')?old('email'):auth()->user()->email }}' name="email" class="form-control" id="emailInput" placeholder="Put your email">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3"  class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Put your new password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3"  class="col-sm-2 col-form-label">Conform Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="password_confirmation" class="form-control" id="confirmPasswordInput" placeholder="Conform your password">
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
  
  

  $("input").change(function(e) {

    for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {

        var file = e.originalEvent.srcElement.files[i];

        var img = document.createElement("img");
        var reader = new FileReader();
        reader.onloadend = function() {
            img.src = reader.result;
            img.width = 300;
            img.height = 300;
            img.id = 'adminAvatar';
        }
        reader.readAsDataURL(file);
        $("#adminAvatar").replaceWith(img);
    }
  });
});
    </script>
@endsection