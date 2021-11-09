<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ads;
class AdsController extends Controller
{
    public function index()
    {
        return response()->json([
            'ads' =>$this->createAdsResponse(),
            'status'=>200
        ],200);
    }

    private function createAdsResponse()
    {
        $fullArray = [];
        $ads = Ads::get();
        
        foreach($ads as $ad)
        {
            $obj = [
                'durations'=>$ad->duration,
                'type'=>$ad->type,
                'image'=>$ad->image,
                'time'=>$ad->time
            ];

            array_push($fullArray,$obj);
        }

        return $fullArray;
    }
}
