<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Pickup;
use App\Http\Requests\Store;

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

    public function store(Store $request){
      // mengambil data inputan
       $data = $request->all();
      //save data order
       $orders = Order::create($data);
       $this->getSnapRedirect($orders);

       return redirect(route('order.success'));
    }

    public function success(){
      return view('success');
    }
}
