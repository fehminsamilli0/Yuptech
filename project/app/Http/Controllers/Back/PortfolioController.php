<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Back\Cat_Portfolio;
use App\Models\Back\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function portfolio(){

        $data = Portfolio::all();
        $cat =  Cat_Portfolio::all();

        return view('back.portfolio_list',compact('data','cat'));
    }

    public function portstatus(Request $request){

        $st = Portfolio::find($request->id);
        $st-> status = $st-> status == 1 ? '0' : '1';

        if ($st->save()) {
            return "ok";
        } else {
            return "no";
        }
    }

    public function portfoliodelete(Request $request)
    {

        if ( Portfolio::destroy($request->id)) {
            @unlink($request->image);
            return "ok";
        } else {
            return "no";
        }

    }

    public function portfolioadd(Request $request)
    {

        $data = new Portfolio;


        $data->name = $request->name;
        $data->content1 = $request->content1;
        $data->cat_id= $request->cate;
        $data->tag = $request->tag;


        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:1024'
        ]);

        $imgName = uniqid() . '.' . $request->file("image")->extension();
        $request->file("image")->move(public_path('backend/assets/images/settings/portfolio/'), $imgName);

        $data->image = "backend/assets/images/settings/portfolio/".$imgName;

        if ($data->save()) {
            return redirect('/portfolio?status=ok')->with("message", "The edit was successful");

        } else {
            return redirect('/portfolio?status=no')->with("message", "The correction was not successful");

        }

    }

    public function portfolioeditindex($id)
    {

        $cat= Cat_Portfolio::all();
        $data = Portfolio::where('id', '=', $id)->get();
        return view('back.portfolio_edit', compact('data','cat'));
    }



    public function portfolioedit(Request $request)
    {

        $data = Portfolio::find($request->id);



        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $imgName = uniqid()."image." . $request->file("image")->extension();
            $image = "backend/assets/images/settings/portfolio/" . $imgName;
        }



        $data->image = $request->hasFile('img') ? $image : $data->image;
        $data->content1 = $request->content1;
        $data->name = $request->name;
        $data->cat_id = $request->cate;



        if ($data->save()) {
            if ($request->hasFile('img')) {
                @unlink($request->oldimage);
                $request->file("img")->move(public_path('backend/assets/images/settings/service/'), $imgName);
            }
            return redirect('/portfolio?status=ok')->with("message", "The edit was successful");
        } else {
            return redirect('/portfolio-edit?status=no')->with("message", "The correction was not successful");
        }
    }

}
