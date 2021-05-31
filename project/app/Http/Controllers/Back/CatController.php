<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Back\Service_Cat;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CatController extends Controller
{
   public function main_cat(){

        $cat= Service_Cat::all();
        return view('back.service_cat',compact('cat'));

    }
    public function catstatus(Request $request){

        $st = Service_Cat::find($request->id);
        $st-> status = $st-> status == 1 ? '0' : '1';

        if ($st->save()) {
            return "ok";
        } else {
            return "no";
        }
    }
    public function catadd(Request $request)
    {

        $cat = new Service_Cat;

        $cat->cat_name = $request->cat_name;
        $cat->slug =Str::slug($request->slug) ;
        if ($request->category === 'main'){
            $cat->main_id = '1';
            $cat->top_cat = '0';
        }
        else{
            $cat->main_id = '0';
            $cat->top_cat = $request->category;
        }

        if ($cat->save()) {
            return redirect('/service-cat?status=ok')->with("message", "The edit was successful");

        } else {
            return redirect('/service-cat?status=no')->with("message", "The correction was not successful");

        }

    }

    public function catselect(Request $request)
    {
        $cat = User::find($request->id);

    }
    public function catdelete(Request $request)
    {

        if ( Service_Cat::destroy($request->id)) {
            return "ok";
        } else {
            return "no";
        }

    }
}
