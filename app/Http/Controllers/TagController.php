<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;
use Response;
use App\Tag;
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $rules =
    [
        'tag' => 'required'
    ];

    public function index()
    {
        //
        $tags = Tag::paginate(10);
        return view('admin/tag',['tags'=>$tags]);
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
            $tag = new Tag();
            $tag->nama_tag = $request->tag;
            $tag->save();
            return redirect('admin/tag')->with('success', 'Success added new Tags !');    
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
            $tag = Tag::findOrFail($id);
            $tag->nama_tag = $request->tag;
            $tag->save();
            return response()->json($tag);
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
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return response()->json($tag);
    }
}
