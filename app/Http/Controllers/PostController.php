<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;
use Response;
use App\Post;
use App\Kategori;
use App\Pencipta;
use App\Tag;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $rules =
    [
        'title' => 'required',
        'content' => 'required'
    ];

    public function index()
    {
        //
        $posts = Post::paginate(10);
        $kategoris = Kategori::all();
        $tags = Tag::all();
        return view('admin/post',compact('posts','kategoris','tags'));
    }

    public function detail($id)
    {
        $post = Post::where('id', $id)->get();
        if(0 != count($post)){
            return view('detail',['post'=>$post]);
        }
    }

    public function welcome(){
        $posts = Post::paginate(10);
        return view('welcome',['posts'=>$posts]);
    }

    public function post(){
        $posts = Post::paginate(5);
        return view('index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $tagID = []; 
            for($x = 1; $x<=Tag::all()->count() ;$x++){
                $gettag = $x."_tag";
                if($request->$gettag=="on"){
                    array_push($tagID, $x);        
                }
            }
            $post = new Post();
            $post->title = $request->title;
            $post->content = $request->content;
            if($request->kategori){
                $post->id_kategori = $request->kategori;
            }
            $post->save();
            if($request->pencipta){
                $pencipta = new Pencipta();
                $pencipta->id_berita = $post->id;
                $pencipta->nama_pencipta = $request->pencipta;
                $pencipta->save();
            }
            $post->tags()->sync($tagID);
            return redirect('admin/post')->with('success', 'Success added new post !');    
        }
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
        $post = Post::findOrFail($id);
        return view('post.show', ['post' => $post]);
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
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $post = Post::findOrFail($id);
            $post->title = $request->title;
            $post->content = $request->content;
            $post->save();
            return response()->json($post);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id);
        $post->delete();
        return response()->json($post);
    }

    public function changeStatus() 
    {
        $id = Input::get('id');
        $post = Post::findOrFail($id);
        if(strcmp($post->published,'yes')==0){
            $post->published = 'no';
        }else{
            $post->published = 'yes';
        }
        $post->save();
        return response()->json($post);
    }
}
