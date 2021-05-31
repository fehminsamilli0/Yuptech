<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Back\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscribe(){

        $data = Subscription::all();

        return view('back.subs',compact('data'));
    }

    public function subsdelete(Request $request)
    {

        if ( Subscription::destroy($request->id)) {

            return "ok";
        } else {
            return "no";
        }

    }
}
