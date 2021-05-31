<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Back\Cat_Portfolio;
use Illuminate\Http\Request;

class Portfolio_Cat extends Controller
{
    public function cat(){

        $cat= Cat_Portfolio::all();
        return view('back.portfolio_cat',compact('cat'));

    }

    public function catstatus(Request $request){

        $data_cat = Cat_Portfolio::find($request->id);
        $data_cat-> status = $data_cat-> status == 1 ? '0' : '1';

        if ($data_cat->save()) {
            return "ok";
        } else {
            return "no";
        }
    }
    public function portcatadd(Request $request)
    {

        $cat = new Cat_Portfolio();

        $cat->name = $request->name;


        if ($cat->save()) {
            return redirect('/portfolio-cat?status=ok')->with("message", "The edit was successful");

        } else {
            return redirect('/portfolio-cat?status=no')->with("message", "The correction was not successful");

        }

    }
    public function catdelete(Request $request)
    {

        if ( Cat_Portfolio::destroy($request->id)) {
            return "ok";
        } else {
            return "no";
        }

    }


}


