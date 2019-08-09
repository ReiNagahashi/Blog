<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\User;
use App\Tag;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        
        // $user_id = Auth::user()->id;
        // $posts = User::find($user_id)->posts;
        //with内の1つ目はkey2つ目は値（ここは上で定義した変数と一致しなければならない）
        //viewないはフォルダ・ファイル名の指定していり
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        if($categories->count() == 0 ||$tags->count() == 0){
            Session::flash('info','You must have some categories');
            return redirect()->back();

        }
        return view('posts.create')->with('categories',$categories)
                                   ->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
        $this->validate($request,[
            // ここはform内にあるname！！！
            'title' => 'required|min:3|max:25',
            'content'=>'required|min:10',
            'featured'=>'required|image',
            'category_id'=>'required',
            'tags'=>'required'

        ]);

        //store data into database

        $post = new Post;
        //ここの最後のtitleはcreate内のフォーム内にあるnameと一致させる　ちなみに、1つ目のtitleはテーブルめいなので注意
        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        $post->content = $request->content;
        $post->category_id =$request->category_id;
        $post->user_id = Auth::user()->id;

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts/',$featured_new_name);
        $post->featured_image = $featured_new_name;

        $post->save();
        $post->tags()->attach($request->tags);


        Session::flash('success','Post Created Successfully');

        //redirect index page
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    // public function restore(){
    //     $garbages = Post::onlyTrashed()->get();
    //     return view('posts.restore')->with('garbages',$garbages);
    // }

    public function trashed(){
        $trashed_posts = Post::onlyTrashed()->get();
        return view('posts.trashed')->with('posts',$trashed_posts);
    }

    public function restore($id){
        $posts = Post::withTrashed()->where('id',$id)->first();
        $posts->restore();
        Session::flash('success','Post Restore Successfully');

        return redirect(route('posts.index'));
    }
    public function kill($id){
        $posts = Post::withTrashed()->where('id',$id)->first();
        $posts->forceDelete();
        Session::flash('success','Post was deleted Successfully');
        return redirect(route('posts.trashed'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit')->with('post',$post)
                                   ->with('categories',Category::all())
                                   ->with('tags',Tag::all());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
                //validate data
                $this->validate($request,[
                    // ここはform内にあるname！！！
                    'title' => 'required|min:3|max:25',
                    'content'=>'required|min:10',
                    'featured'=>'nullable',
                    'category_id'=>'required'
                ]);
        
                //store data into database
        
                // $post = new Post;
                //ここの最後のtitleはcreate内のフォーム内にあるnameと一致させる　ちなみに、1つ目のtitleはテーブルめいなので注意
                $post->title = $request->title;
                $post->slug = str_slug($request->title);
                $post->content = $request->content;
                $post->category_id = $request->category_id;
                $post->user_id = Auth::user()->id;


                if($request->hasFile('featured')){
                $featured = $request->featured;
                $featured_new_name = time().$featured->getClientOriginalName();
                $featured->move('uploads/posts/',$featured_new_name);
                $post->featured_image = $featured_new_name;
                }
        
                $post->save();
                $post->tags()->sync($request->tags);
                Session::flash('success','Post edit Successfully');

        
                //redirect index page
                return redirect(route('posts.index'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flash('success','Post Delete Successfully');
        return redirect(route('posts.index'));
    }
}
