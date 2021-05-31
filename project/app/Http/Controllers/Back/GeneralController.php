<?php

namespace App\Http\Controllers\Back;
use App\Blog;
use App\Models\Back\Settings;
use App\Models\Back\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;

class GeneralController extends Controller
{

    public function settings(){
        if(App::isLocale('az')){
            $data= Settings::where('lang_id',0)->get();

        }
        else{
            $data = Settings::where('lang_id',1)->get();
        }

        return view('back.settings',compact('data'));

    }
    public function contact(){
        $data=Contact::all();
        return view('back.contact',compact('data'));
    }

    public function about(){
        $data= Settings::all();
        return view('back.about',compact('data'));
    }


    public function settingsupdate(Request $request)
    {
        if(App::isLocale('az')){
            $data = Settings::find(1);

        }
        else{

            $data = Settings::find(2);
        }

        $request->validate([
            'light' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'dark' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'favicon' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'robots' => '|mimes:txt,pdf,doc,docx|max:4096',



        ]);

        if ($request->hasFile('light')) {
            $logoName = uniqid()."light." . $request->file("light")->extension();
            $logo = "backend/assets/images/settings/light/" . $logoName;
        }

        if ($request->hasFile('dark')) {
            $logoName1 = uniqid()."dark." . $request->file("dark")->extension();
            $logo1 = "backend/assets/images/settings/dark/" . $logoName1;
        }

        if ($request->hasFile('favicon')) {
            $logoName2 = uniqid()."favicon." . $request->file("favicon")->extension();
            $logo2 = "backend/assets/images/settings/favicon/" . $logoName2;
        }
        if ($request->hasFile('robots')) {
            $logoName3 = uniqid()."text." . $request->file("robots")->extension();
            $logo3 = "backend/assets/images/settings/robots/" . $logoName3;
        }

        $data->lang_id = $request->lang;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->slogan= $request->slogan;
        $data->word = $request->word;
        $data->logo_light = $request->hasFile('light') ? $logo : $data->logo_light;
        $data->logo_dark = $request->hasFile('dark') ? $logo1 : $data->logo_dark;
        $data->fav_icon = $request->hasFile('favicon') ? $logo2 : $data->fav_icon;
        $data->robots = $request->hasFile('robots') ? $logo3 : $data->robots;

        if ($data->save()) {
            if ($request->hasFile('light')) {
                @unlink($request->oldlight);
                $request->file("light")->move(public_path('backend/assets/images/settings/light/'), $logoName);
            }
            if ($request->hasFile('dark')) {
                @unlink($request->olddark);
                $request->file("dark")->move(public_path('backend/assets/images/settings/dark/'), $logoName1);
            }
            if ($request->hasFile('favicon')) {
                @unlink($request->oldfavicon);
                $request->file("favicon")->move(public_path('backend/assets/images/settings/favicon/'), $logoName2);
            }
            if ($request->hasFile('robots')) {
                @unlink($request->oldrobots);
                $request->file("robots")->move(public_path('backend/assets/images/settings/robots/'), $logoName3);
            }
            return redirect('/general-settings?status=ok')->with("success", "The edit was successful");
        } else {
            return redirect('/general-settings?status=no')->with("error", "The correction was not successful");
        }


    }

    public function aboutupdate(Request $request){
        $data=Settings::find(1);

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $fotoName = uniqid()."image." . $request->file("image")->extension();
            $foto = "backend/assets/images/settings/about/" . $fotoName;
        }

        $data->about_title = $request->about_title;
        $data->about_content = $request->about_content;
        $data->about_image = $request->hasFile('image') ? $foto : $data->about_image;


        if ($data->save()) {
            if ($request->hasFile('image')) {
                @unlink($request->oldimage);
                $request->file("image")->move(public_path('backend/assets/images/settings/about/'), $fotoName);
            }

            return redirect('/general-about?status=ok')->with("success", "The edit was successful");
        } else {
            return redirect('/general-about?status=no')->with("error", "The correction was not successful");
        }

    }

    public function contactupdate(Request $request){
        $data=Contact::find(1);

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = uniqid()."image." . $request->file("image")->extension();
            $image = "backend/assets/images/settings/contact/" . $imageName;
        }

        $data->address= $request->address;
        $data->tel = $request->tel;
        $data->image = $request->hasFile('image') ? $image : $data->image;


        if ($data->save()) {
            if ($request->hasFile('image')) {
                @unlink($request->oldimage);
                $request->file("image")->move(public_path('backend/assets/images/settings/contact/'), $imageName);
            }

            return redirect('/general-contact?status=ok')->with("success", "The edit was successful");
        } else {
            return redirect('/general-contact?status=no')->with("error", "The correction was not successful");
        }


    }

    public function smadd(Request $request)
    {

        $data = new Contact;

        $data->sm = $request->sm;


        if ($data->save()) {
            return redirect('/general-contact?status=ok')->with("message", "The edit was successful");

        } else {
            return redirect('/general-contact?status=no')->with("message", "The correction was not successful");

        }

    }


}

