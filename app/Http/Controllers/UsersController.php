<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Session;
use App\Profile;

class UsersController extends Controller　

{
    public function index(){
        return view('users.index')->with('users',User::all());
    }

    public function create(){
        return view('users.create');
    }

    public function store(Request $request){
        //validate data
        $this->validate($request,[
            // ここはform内にあるname！！！
            'name' => 'required|min:3|max:25',
            'email'=>'required',
            'password'=>'required'
        ]);

        //store data into database

        $user = User::create([
            'name' => $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
            ]);

            Profile::create([
                'user_id'=>$user->id,
                'avatar'=>'uploads/avatars/sample.jpg'
            ]);

        $user->save();

  
        Session::flash('success','User Created Successfully');

        //redirect index page
        return redirect(route('users'));
    }

    public function edit(User $user){
        return view('users.create')->with('user',$user);
    }

    public function update(Request $request, User $user){
              //validate data
              $this->validate($request,[
                // ここはform内にあるname！！！
                'name' => 'required|min:3|max:25',
                'email'=>'required',
                'password'=>'nullable', //毎回パスワードをアップデートしたくない人向けにここはnull
                'avatar'=>'nullable|image'
            ]);
    
            //store data into database
    
            // $post = new Post;
            //ここの最後のtitleはcreate内のフォーム内にあるnameと一致させる　ちなみに、1つ目のtitleはテーブルめいなので注意
            $user->name = $request->name;
            $user->password = $request->password;

            if($request->hasFile('avatar')){
            $avatar = $request->avatar;
            $avatar_new_name = time().$avatar->getClientOriginalName();
            $avatar->move('uploads/avatar/',$avatar_new_name);
            $user->avatar = $avatar_new_name;
            }

            if($request->has('password')){
                $user->password = $request->password;
            }
    
            $user->save();
            Session::flash('success','Post edit Successfully');

            //redirect index page
            return redirect(route('users'));
    }

    public function destroy($id){
        $user = User::find($id);
        $user->profile->delete();
        $user->delete();


        Session::flash('success','Post delete Successfully');

        //redirect index page
        return redirect(route('users'));
    }

    public function make_admin($id){
        $user = User::find($id);
        $user->admin = 1;
        $user->save();


        Session::flash('success','User permission changed to admin successfully');

        return redirect(route('users'));

    }

    public function remove_permission($id){
        $user = User::find($id);
        $user->admin = 0;
        $user->save();

        Session::flash('success','User permission changed to not_admin successfully');

        return redirect('/');

    }

    

}
