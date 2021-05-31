<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Back\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function team(){


        $data = Team::all();
        return view('back.team',compact('data'));
    }

    public function teamstatus(Request $request){

        $st = Team::find($request->id);
        $st-> status = $st-> status == 1 ? '0' : '1';

        if ($st->save()) {
            return "ok";
        } else {
            return "no";
        }
    }

    public function teamadd(Request $request)
    {

        $data = new Team;

        $data->name = $request->name;
        $data->position = $request->position;
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:1024'
        ]);

        $imageName = uniqid() . '.' . $request->file("image")->extension();
        $request->file("image")->move(public_path('backend/assets/images/settings/team/'), $imageName);

        $data->image = "backend/assets/images/settings/team/".$imageName;

        if ($data->save()) {
            return redirect('/team?status=ok')->with("message", "The edit was successful");

        } else {
            return redirect('/team?status=no')->with("message", "The correction was not successful");

        }

    }

    public function teamdelete(Request $request)
    {

        if ( Team::destroy($request->id)) {
            @unlink($request->image);
            return "ok";
        } else {
            return "no";
        }

    }

    public function teameditindex($id)
    {
        $data = Team::where('id', '=', $id)->get();
        return view('back.team_edit', compact('data'));
    }

    public function teamedit(Request $request)
    {

        $data = Team::find($request->id);


        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $imageName = uniqid()."image." . $request->file("image")->extension();
            $image = "backend/assets/images/settings/team/" . $imageName;
        }



        $data->image = $request->hasFile('image') ? $image : $data->image;
        $data->position = $request->position;
        $data->name = $request->name;


        if ($data->save()) {
            if ($request->hasFile('image')) {
                @unlink($request->oldimage);
                $request->file("image")->move(public_path('backend/assets/images/settings/team/'), $imageName);
            }
            return redirect('/team?status=ok')->with("message", "The edit was successful");
        } else {
            return redirect('/team_edit?status=no')->with("message", "The correction was not successful");
        }
    }


}
