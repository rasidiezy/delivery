<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Pickup;

class OrderController extends Controller
{
    public function index()
    {
    //mengambil data checkout, user dan paket sesuai user yang login
    // $order = Order::find(1);
      $mitra = Pickup::all();
      return view('welcome',[
          'mitra' => $mitra
      ]);
    }

    public function store(Request $request){
       return $request->all();
    }
}
