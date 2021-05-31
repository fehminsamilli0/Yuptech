<?php

namespace App\Http\Controllers\Back;
use App\User;
use App\Http\Controllers\Controller;
use App\Models\Back\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class EmployeesController extends Controller
{
    public function emp()
    {
        $emp = Employees::all();
        return view('back.employees', compact('emp'));

    }
    public function empstatus(Request $request){

        $st = Employees::find($request->id);
        $st->status = $st->status == '1' ? '0' : '1';

        if ($st->save()) {
            return "ok";
        } else {
            return "no";
        }
    }


    public function empadd(Request $request)
    {

        $emp = new Employees;

        $emp->name = $request->name;
        $request->validate([
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imageName = uniqid() . '.' . $request->file("logo")->extension();
        $request->file("logo")->move(public_path('backend/assets/images/settings/employees/'), $imageName);

        $emp->logo = "backend/assets/images/settings/employees/".$imageName;

        if ($emp->save()) {
            return redirect('/emp?status=ok')->with("message", "The edit was successful");

        } else {
            return redirect('/emp?status=no')->with("message", "The correction was not successful");

        }
    }

    public function empselect(Request $request)
    {
        $emp = User::find($request->id);

    }

    public function empdelete(Request $request)
    {

        if ( Employees::destroy($request->id)) {
            @unlink($request->logo);
            return "ok";
        } else {
            return "no";
        }

    }


}
