<?php

namespace App\Http\Controllers;

use App\Models\Films;
use App\Models\Janr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Films::all();
        $janrs = Janr::all();
        return view('admin.films.index',['models'=>$model, 'janrs'=>$janrs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = Films::all();
        $janrs = Janr::all();
        return view('admin.films.create',['models'=>$model, 'janrs'=>$janrs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Films();
        $model->name = $request->name;
        $model->publication = $request->publication;
        $image = $request->file('image')->store('public');
        $explode = explode('/', $image);
        $model->image = array_pop($explode);
        $model->janr_id = $request->janr_id;
        $model->status = $request->status?1:0;
        if(!isset($model->image)){
            $model->image = 'default.jpg';
        }
        $model->save();
        return redirect()->route('films.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Films::find($id);
        $janrs = Janr::all();
        return view('admin.films.update', ['model'=>$model, 'janrs'=>$janrs]);
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
        $model = Films::find($id);
        $model->name = $request->name;
        $model->publication = $request->publication;
        Storage::delete($model->image);
        $image = $request->file('image')->store('public');
        $explode = explode('/', $image);
        $model->image = array_pop($explode);
        $model->janr_id = $request->janr_id;
        $model->status = $request->status?1:0;
        $model->save();
        return redirect()->route('films.index',['models'=>$model]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Films::find($id);
        Storage::delete($model->image);
        $model->delete();
        return redirect()->route('films.index');
    }
}
