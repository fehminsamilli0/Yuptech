<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Back\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment(){

        $data = Payment::all();
        return view('back.payment',compact('data'));

    }

}
