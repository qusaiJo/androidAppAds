<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Http\Traits\UploadImageTraite;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;


class SettingController extends Controller
{
    use UploadImageTraite;

    public function edit()
    {
        return view('dashboard.setting.edit');
    }

    public function update(SettingRequest $request)
    {
        $user = User::find(Auth::user()->id);
        if($request->file('image')) $user->image = $this->uploadFile('avatars',$request->file('image'));
        $user->email = $request->email;
        $user->name = $request->name;
        
        if($request->password)
        {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        Alert::toast('Your profile has been updated', 'success');  
        return back();
    }
}
