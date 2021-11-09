@extends('dashboard.index')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Archive Table</h6>
        </div>
        <div class="card-body">
          
            <div class="table-responsive">
                @if (count($archive) > 0)
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Duration</th>
                            <th>Time</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                        @foreach ($archive as $ad)
                        <tr>
                            <td> <img width="50px" height="50px" src="{{$ad->image}}" alt="{{ $ad->image }}"> </td>
                            <td>{{ $ad->duration }}sec</td>
                            <td>
                                <ul>
                                    @foreach ($ad->time as $item)
                                        <li>{{ $item->time }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{ ($ad->type == 1)?'Vertical':'Horizontal'}}</td>
                            <td>
                                <a href="{{ route('dashboard.archive.restore',$ad->id) }}" class="btn btn-primary">Restore</a>
                                <a onclick="modalShow({{$ad->id}})" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $archive->links('pagination::bootstrap-4') }}
                @else
                <h6 class="text-center">
                    archive is empty
                </h6>
                @endif
                
            </div>
        </div>
    </div>
  


    <div id="myInput" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Delete Ad</h5>
              <button type="button" onclick="modalHide()" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete the ad?</p>
            </div>
            <div class="modal-footer">
              <button type="button"  onclick="saveData()" class="btn btn-danger">Delete</button>
              <button onclick="modalHide()" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>


</div>
<script>
     let adId = null;

function modalShow(id = null)
{
    adId = id;
   $('#myInput').show()
}
function modalHide(id = null)
{
   $('#myInput').hide()
}
function saveData()
{
   var api = '{{ route("dashboard.archive.delete", ":id") }}';
   api = api.replace(':id', adId);

   $.ajax({
       url: api,
       type: 'GET',
       dataType: 'json',
       success: function(res) {
           $('#myInput').hide()
           window.location.reload();
       },
       error: function(err){
           alert('error');
           $('#myInput').hide()
       }
   });
}
$(document).ready(function(){

});
</script>
@endsection