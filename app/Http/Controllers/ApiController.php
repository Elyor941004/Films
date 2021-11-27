<?php

namespace App\Http\Controllers;

use App\Models\Films;
use App\Models\Janr;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected function Janrs(){
        $model = Janr::paginate(10);
        return response()->json(['$model'=>$model]);
    }
    protected function Films($id){
        $janr = Janr::find($id);
        $model = Films::where('janr_id', $janr->id)->paginate(10);
        return response()->json(['model'=>$model]);
    }
    protected function AllFilm(){
        $model = Films::all();
        return response()->json(['model'=>$model]);
    }
    protected function Film($id){
        $model = Films::where('id', $id)->paginate(10);
        return response()->json(['model'=>$model]);
    }
}
