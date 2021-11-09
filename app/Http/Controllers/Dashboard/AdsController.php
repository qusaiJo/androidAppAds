<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Ads;
use App\Models\Time;
use Illuminate\Http\Request;
use App\Http\Requests\AdsRequest;
use App\Http\Controllers\Controller;
use App\Http\Traits\UploadImageTraite;
use RealRashid\SweetAlert\Facades\Alert;

class AdsController extends Controller
{
    use UploadImageTraite;

    #VALDATION FOR THE AD FIRST TYPE 
    private $adType1Valdation  = ['image' => 'required|dimensions:max_width=120,max_height=600'];
    #VALDATION FOR THE AD SECOND TYPE 
    private $adType2Valdation = ['image' => 'required|dimensions:max_width=468,max_height=60'];
    #ERROR VALDATION MESSAGES
    private $errorMessagesType1 = ['image.dimensions' => 'The dimensions for the vertical ad should be 120x600'];
    #ERROR VALDATION MESSAGES
    private $errorMessagesType2 = ['image.dimensions' => 'The dimensions for the horizontal ad should be 468x60'];

    public function index()
    {
        $ads = Ads::paginate(10);
        return view('dashboard.ads.index',compact('ads'));
    }

    public function create()
    {
        return view('dashboard.ads.create');
    }

    public function edit($id)
    {
        $ad = Ads::find($id);
        return view('dashboard.ads.edit',compact('ad'));
    }

    public function store(AdsRequest $request)
    {
        if($request->type == '1')
        {
           $validated = $request->validate($this->adType1Valdation,$this->errorMessagesType1);
        }
        else
        {
           $validated = $request->validate($this->adType2Valdation,$this->errorMessagesType2);
        }
        $ad = new Ads;
        $ad->image = $this->uplaodFile('ads',$request->file('image'));
        $ad->duration = $request->duration;
        $ad->type = $request->type;
        $ad->save();

        foreach( $request->time as $time )
        {
            $timeModel = new Time;
            $timeModel->time = $time;
            $timeModel->ad()->associate($ad);
            $timeModel->save();
        }
        Alert::toast('New ad was created', 'success');  
        return redirect()->route('dashboard.ads.index');
    }

    public function update(AdsRequest $request , $id)
    {
        if($request->image&&$request->type == '1')
        {
            $validated = $request->validate($this->adType1Valdation,$this->errorMessagesType1);
        }
        elseif($request->image&&$request->type == '2')
        {
            $validated = $request->validate($this->adType2Valdation,$this->errorMessagesType2);
        }
        $ad = Ads::find($id);
        if($request->image)
        {
            $ad->image = $this->uplaodFile('ads',$request->file('image'));

        }
        $ad->duration = $request->duration;
        $ad->type = $request->type;
        $ad->save();
        
        #REMOVE THE RELATIONS
        foreach( $ad->time as $item )
        {
            $item->ad()->dissociate();
            $item->save();
        }     

        foreach( $request->time as $time )
        {
            $timeModel = new Time;
            $timeModel->time = $time;
            $timeModel->ad()->associate($ad);
            $timeModel->save();
        }
        Alert::toast('Ad was updated', 'success');        
        return redirect()->route('dashboard.ads.index');
    }

    public function delete($id)
    {
       $ad = Ads::find($id);
       $ad->delete();
       Alert::toast('Ad was archived', 'success');  
       return response()->json([
           'msg'=>'Archived',
           'status'=>204
       ],204);
    }
}
