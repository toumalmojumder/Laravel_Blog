<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
if($categories->count()==0){
Session::flash('info', 'You must create some categories before attemping to create a post.');
//return redirect()->route('categories')->with($notification);
return redirect()->route('category.create');
}

        return view('admin.posts.create')->with('categories',Category::all());


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $this->validate($request,[
           'title'=>'required|max:255',
           'featured'=>'required|image',
           'content'=>'required',
           'category_id'=>'required',
       ]);

       $featured = $request->featured;

$featured_new_name =  time().$featured->getClientOriginalName();

$featured->move('uploads/posts',$featured_new_name);

$post = Post::create([
'title' => $request-> title,
'content'=> $request->content,
'featured'=>'uploads/posts/'. $featured_new_name,
'category_id'=>$request->category_id,
'slug'=>str_slug($request->title)
]);

Session::flash('success','Post created Successfully.!');

return redirect()->back();

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
        Session::flash('success','The post was just trashed.');
        return redirect()->back();
    }

    public function trashed(){
        $posts = Post::onlyTrashed()->get();
         return view('admin.posts.trash')->with('posts',$posts);
    }
    public function kill($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post-> forceDelete();
        Session::flash('success','The post permanently deleted.');
        return redirect()->back();
    }
}
