<?php

namespace App\Http\Controllers;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class SettingsController extends Controller
{
    public function index(){
        return view('settings.settings')->with('settings',Settings::first());
    }
    public function update(Request $request){

        $this->validate($request,[
            'site_name' => 'required',
            'contact_number' => 'required',
            'contact_email' => 'required|email',
            'address' => 'required|min:5'
            ]);

            $settings = Settings::first();
            $settings->site_name = $request->site_name;
            $settings->contact_number = $request->contact_number;
            $settings->contact_email = $request->contact_email;
            $settings->address = $request->address;
            $settings->save();

            Session::flash('success','Settings Update successfully');

            return redirect()->back();

    }



}
