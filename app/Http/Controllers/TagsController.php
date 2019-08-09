<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Illuminate\Support\Facades\Session;


class TagsController extends Controller
{
    public function index(){
        return view('tags.index')->with('tags',Tag::all());
    }

    public function create(){
        return view('tags.create');
    }

    public function store(Request $request){

        $this->validate($request,[
            'name'=>'required'
        ]);
       
        //Mass Asignmentを使ったらここまでコードを省略することがdケイル！！postsクリエートの方と見比べてみよう
        Tag::create([
            'name' => $request->name
        ]);

        Session::flash('success','Post edit Successfully');

        return redirect('/tags');
    }


    public function edit(Tag $tag){

        return view('tags.create')->with('tag',$tag);

    }

    public function update(Request $request,Tag $tag){

        $this->validate($request,[
            'name'=>'required'
        ]);
        $tag->name = $request->name;
        $tag->save();

        return redirect('/tags');

    }


    public function destroy(Tag $tag){
        $tag->delete();
        return redirect('/tags');
    }
}
