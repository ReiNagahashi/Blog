<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category; 
use App\Http\Requests\CreateCategoryRequest;
use Illuminate\Support\Facades\Session;


class CategoriesController extends Controller
{
    public function index(){
        return view('category.index')->with('categories',Category::all());
    }

    public function create(){
        return view('category.create');
    }

    public function store(CreateCategoryRequest $request){
       
        //Mass Asignmentを使ったらここまでコードを省略することがdケイル！！postsクリエートの方と見比べてみよう
        Category::create([
            'name' => $request->name,

        ]);


        Session::flash('success','Post edit Successfully');

        return redirect('/categories');
    }


    public function edit(Category $category){

        return view('category.create')->with('category',$category);

    }

    public function update(CreateCategoryRequest $request,Category $category){
        $category->name = $request->name;
        $category->save();

        return redirect('/categories');

    }


    public function destroy(Category $category){
        foreach($category->posts as $post){
            $post->forceDelete();
        }
        $category->delete();
        return redirect('/categories');
    }
}
