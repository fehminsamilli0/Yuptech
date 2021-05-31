<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Back\Thoughts;
use Illuminate\Http\Request;

class ThoughtsController extends Controller
{
    public function thoughts(){

        $data = Thoughts::all();
        return view('back.thoughts',compact('data'));

    }

    public function thoughtsdelete(Request $request)
    {

        if ( Thoughts::destroy($request->id)) {
            @unlink($request->img);
            return "ok";
        } else {
            return "no";
        }

    }

    public function thoughtsstatus(Request $request){

        $st = Thoughts::find($request->id);
        $st-> status = $st-> status == 1 ? '0' : '1';

        if ($st->save()) {
            return "ok";
        } else {
            return "no";
        }
    }


}
