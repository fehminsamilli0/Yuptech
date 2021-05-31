<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Back\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function job(){
        $job = Job::all();
        return view('back.job',compact('job'));
    }

    public function jobeditindex($id)
    {
        $job = Job::where('id', '=', $id)->get();
        return view('back.job_edit', compact('job'));
    }

    public function jobupdate(Request $request)
    {

        $job = Job::find($request->id);


        $request->validate([
            'icon' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('icon')) {
            $iconName = uniqid()."icon." . $request->file("icon")->extension();
            $icon = "backend/assets/images/settings/jobicon/" . $iconName;
        }



        $job->icon = $request->hasFile('icon') ? $icon : $job->icon;
        $job->back_color = $request->back_color;
        $job->name = $request->name;


        if ($job->save()) {
            if ($request->hasFile('icon')) {
                @unlink($request->oldicon);
                $request->file("icon")->move(public_path('backend/assets/images/settings/jobicon/'), $iconName);
            }
            return redirect('/job?status=ok')->with("message", "The edit was successful");
        } else {
            return redirect('/job?status=no')->with("message", "The correction was not successful");
        }
    }


    public function jobstatus(Request $request){

        $st = Job::find($request->id);
        $st-> status = $st-> status == '1' ? '0' : '1';

        if ($st->save()) {
            return "ok";
        } else {
            return "no";
        }
    }
    public function jobadd(Request $request)
    {

        $job = new Job;

        $job->name = $request->name;
        $job->back_color = $request->back_color;
        $request->validate([
            'icon' => 'image|mimes:jpeg,png,jpg,gif|max:1024'
        ]);

        $iconName = uniqid() . '.' . $request->file("icon")->extension();
        $request->file("icon")->move(public_path('backend/assets/images/settings/jobicon/'), $iconName);

        $job->icon = "backend/assets/images/settings/jobicon/".$iconName;

        if ($job->save()) {
            return redirect('/job?status=ok')->with("message", "The edit was successful");

        } else {
            return redirect('/job?status=no')->with("message", "The correction was not successful");

        }

    }
    public function jobdelete(Request $request)
    {

        if ( Job::destroy($request->id)) {
            @unlink($request->icon);
            return "ok";
        } else {
            return "no";
        }

    }

    public function jobselect(Request $request)
    {
        $job = User::find($request->id);

    }
}
