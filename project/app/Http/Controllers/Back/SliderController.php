<?php

namespace App\Http\Controllers\Back;
use App\Models\Back\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class SliderController extends Controller
{
    public function slider(){
        $slider = Slider::all();
        return view('back.slider',compact('slider'));
    }
    public function sliderupdate(Request $request)
    {

        $slider = Slider::find($request->id);


        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $imgName = uniqid()."image." . $request->file("image")->extension();
            $image = "backend/assets/images/settings/slider/" . $imgName;
        }



        $slider->image = $request->hasFile('image') ? $image : $slider->image;
        $slider->back_color = $request->back_color;
        $slider->name = $request->name;
        $slider->date = $request->date;


        if ($slider->save()) {
            if ($request->hasFile('image')) {
                @unlink($request->oldicon);
                $request->file("image")->move(public_path('backend/assets/images/settings/slider/'), $imgName);
            }
            return redirect('/slider?status=ok')->with("message", "The edit was successful");
        } else {
            return redirect('/slider?status=no')->with("message", "The correction was not successful");
        }
    }
    public function sliderstatus(Request $request){

        $st = Slider::find($request->id);
        $st-> status = $st-> status == 1 ? '0' : '1';

        if ($st->save()) {
            return "ok";
        } else {
            return "no";
        }
    }


    public function slideradd(Request $request)
    {



        $slider = new Slider;
        $slider->name = $request->name;
        $slider->back_color = $request->back_color;
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:10000'
        ]);

        $imgName = uniqid() . '.' . $request->file("image")->extension();
        $request->file("image")->move(public_path('backend/assets/images/settings/slider/'), $imgName);

        $slider->image = "backend/assets/images/settings/slider/".$imgName;

        if ($slider->save()) {
            return redirect('/slider?status=ok')->with("message", "The edit was successful");

        } else {
            return redirect('/slider?status=no')->with("message", "The correction was not successful");

        }

    }




    public function sliderdelete(Request $request)
    {

        if ( Slider::destroy($request->id)) {
            @unlink($request->image);
            return "ok";
        } else {
            return "no";
        }

    }


}

