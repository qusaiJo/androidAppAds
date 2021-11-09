<?php

namespace App\Http\Controllers\Dashboard;

use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ads;

class ArchiveController extends Controller
{
    public function index()
    {
        $archive = Ads::onlyTrashed()->paginate(10);
        return view('dashboard.archive.index',compact('archive'));
    }

    public function delete($id)
    {
         $ad = Ads::withTrashed()->findOrFail($id);
          #REMOVE THE RELATIONS
          foreach($ad->time as $item )
          {
              $item->ad()->dissociate();
              $item->save();
          } 
          $ad->forceDelete();
        Alert::toast('Ad was deleted', 'success');  
        return response()->json([
            'msg'=>'deleted',
            'status'=>204
        ],204);
    }

    public function restore($id)
    {
        $ad = Ads::withTrashed()->findOrFail($id);
        $ad->restore();
        Alert::toast('Ad was restored', 'success');  
        return back();
    }
}
