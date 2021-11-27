<?php

namespace App\Http\Controllers;

use App\Models\Films;
use App\Models\Janr;
use http\Url;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected function Janrs(){
        $model = Janr::paginate(10);
        return response()->json(['janr'=>$model]);
    }
    protected function Films($id){
        $janr = Janr::find($id);
        $model = Films::where('janr_id', $janr->id)->paginate(10);
        return response()->json(['film'=>$model]);
    }
    protected function AllFilm(){
        $models = Films::paginate(10);
        return response()->json(['film'=>$models]);
    }
    protected function Film($id){
        $model = Films::where('id', $id)->paginate(10);
        return response()->json(['film'=>$model]);
    }
}
