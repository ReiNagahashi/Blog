<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use App\Category;
use App\Post;
use App\Tag;
use Newsletter;
use Illuminate\Support\Facades\Session;




class FrontendController extends Controller
{
    public function index(){
        return view('index')->with('settings',Settings::first())
                            //今回は、なぜか同じ名前であるカテゴリーズを2つダブっって設定していたために、エラーが起きてしまっていたようファ！！
                            ->with('categories',Category::all())
                            // ->with('categories',Category::take(5)->get())
                            ->with('first_post',Post::orderBy('created_at','desc')->first())
                            ->with('second_post',Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
                            ->with('third_post',Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
                            // 下の2つは特定のカテゴリーをidとカテゴリー名で指定することができる
                            ->with('cats',Category::find(1))
                            ->with('daily',Category::find(2));
    }

    public function singlePost($slug){
        $post = Post::where('slug',$slug)->first();

        $prev_id = Post::where('id','>',$post->id)->min('id');
        $next_id = Post::where('id','<',$post->id)->max('id');

        return view('single')->with('post',$post)
                             ->with('prev',Post::find($prev_id))
                             ->with('next',Post::find($next_id))
                             ->with('settings',Settings::first())
                             ->with('categories',Category::all())
                             ->with('tags',Tag::all());
    }

    public function search(){
        $posts = Post::where('title','like','%'.request('query').'%')->get();

        return view('results')->with('posts',$posts)
                              ->with('title','Search results: '.request('query'))
                              ->with('settings',Settings::first())
                              ->with('categories',Category::take(5)->get())
                              ->with('query',request('query'));
    }

    public function subscribe(){
        $email = request('email');

        NewsLetter::subscribe($email);
        Session::flash('success','Subscribed Successfully');
        return redirect('/');
    }
     
    
    public function categoryShow($id){
        $category = Category::where('id',$id)->first();
            
        return view('categoryResult')->with('category',$category)
                                    //以前、ここにPost::all()を記述していたが、カテゴリーはポストとすでにリレーション
                                    //を結んでいルために、わざわざポストを記述する必要がない
                                     ->with('settings',Settings::first())
                                     ->with('tags',Tag::all())
                                    //  ->with('posts',Post::all())
                                     //下のカテゴリーズはヘッダーようにあるから、複数形になっている
                                     ->with('categories',Category::take(5)->get());
    }

    
}
