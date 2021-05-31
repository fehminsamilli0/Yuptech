<?php


namespace App\Http\Controllers\Back;
use App\Models\Back\Service;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Back\Service_Cat;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function service()
    {
        $cat= Service_Cat::all();
        $topcat = Service_Cat::where('main_id','1')->get();
        $data = Service::all();


        return view('back.service_list', compact('data','cat','topcat'));

    }
    public function servicestatus(Request $request){

        $st = Service::find($request->id);
        $st-> status = $st-> status == 1 ? '0' : '1';

        if ($st->save()) {
            return "ok";
        } else {
            return "no";
        }
    }


    public function servicedelete(Request $request)
    {

        if (Service::destroy($request->id)) {
            @unlink($request->logo);
            return "ok";
        } else {
            return "no";
        }

    }





    public function serviceadd(Request $request)
    {

        $data = new Service;

        $data->title = $request->title;
        $data->content1 = $request->content1;
        $data->cat_id= $request->cate;
        $data->tag = json_encode($request->tag,true);


        $request->validate([
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:1024'
        ]);

        $imgName = uniqid() . '.' . $request->file("img")->extension();
        $request->file("img")->move(public_path('backend/assets/images/settings/service/'), $imgName);

        $data->img = "backend/assets/images/settings/service/".$imgName;

        if ($data->save()) {
            return redirect('/service-list?status=ok')->with("message", "The edit was successful");

        } else {
            return redirect('/service-list?status=no')->with("message", "The correction was not successful");

        }

    }


    public function serviceeditindex($id)
    {

        $cat= Service_Cat::all();
        $data = Service::where('id', '=', $id)->get();
        $topcat = Service_Cat::where('main_id','1')->get();
        return view('back.service_edit', compact('data','topcat','cat'));
    }



    public function serviceedit(Request $request)
    {

        $data = Service::find($request->id);




        $request->validate([
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('img')) {
            $imgName = uniqid()."img." . $request->file("img")->extension();
            $img = "backend/assets/images/settings/service/" . $imgName;
        }



        $data->img = $request->hasFile('img') ? $img : $data->img;
        $data->content1 = $request->content1;
        $data->title = $request->title;
        $data->cat_id = $request->cate;



        if ($data->save()) {
            if ($request->hasFile('img')) {
                @unlink($request->oldservice);
                $request->file("img")->move(public_path('backend/assets/images/settings/service/'), $imgName);
            }
            return redirect('/service-list?status=ok')->with("message", "The edit was successful");
        } else {
            return redirect('/service-edit?status=no')->with("message", "The correction was not successful");
        }
    }


}
