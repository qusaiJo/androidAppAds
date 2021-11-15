<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ads;

class AdsController extends Controller
{
    public function index()
    {
        $ad = Ads::with(['days','time'])
        ->select(['id','duration','type','image'])
        ->get();
        return response()->json([
            'ads' =>$ad,
            'status'=>200
        ],200);
    }
}
