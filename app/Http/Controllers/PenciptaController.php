<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;
use Response;
use App\Pencipta;
class PenciptaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $rules =
    [
        'pencipta' => 'required'
    ];

    public function index()
    {
        //
        $penciptas = Pencipta::paginate(10);
        return view('admin/pencipta',['penciptas'=>$penciptas]);
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
            $pencipta = Pencipta::findOrFail($id);
            $pencipta->nama_pencipta = $request->pencipta;
            $pencipta->save();
            return response()->json($pencipta);
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
        $pencipta = Pencipta::findOrFail($id);
        $pencipta->delete();
        return response()->json($pencipta);
    }
}
