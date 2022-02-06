<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Str;


class ProfileController extends Controller
{
// ------------------------------------------------------------------------------------------------- //
    public function edit()
    {
        return view('profile.edit');
    }
// ------------------------------------------------------------------------------------------------- //

    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus('Profile successfully updated.');
    }
// ------------------------------------------------------------------------------------------------- //
    public function security(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus('Password successfully updated.');
    }
// ------------------------------------------------------------------------------------------------- //
    public function upload(Request $request)
    {
        if($request->hasFile('image')){
            $filename = 'user_'.Str::random(12).'.'.$request->image->extension();
            $request->image->storeAs('',$filename,'profile');
            Auth()->user()->update(['image'=>$filename]);
        }
        return back()->withstatus('Image uploaded successfully');
    }


}
