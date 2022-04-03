<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Pickup;
use App\Models\Discount;
use App\Http\Requests\Store;

class OrderController extends Controller
{
    public function index()
    {
    //mengambil data checkout, user dan paket sesuai user yang login
    // $order = Order::find(1);
      $mitra = Pickup::all();
      $discount = Discount::all();
      return view('welcome',[
          'mitra' => $mitra , 'discount' => $discount
      ]);
    }

    public function store(Store $request){
      // mengambil data inputan
    //   $data = $request->all();
      //save data order
    //   $orders = Order::create($data);
    
    
      $orders = new Order;
      $jarak = explode(' ', request('jarak'));
      $orders->pickup_id = $request->pickup_id;
      $orders->nama = $request->nama;
      $orders->latitude = $request->latitude;
      $orders->longitude = $request->longitude;
      $orders->alamat = $request->alamat;
      $orders->detail = $request->detail;
      $orders->no_hp = $request->no_hp;
      $orders->request_order = $request->request_order;
      $orders->biaya_rq = $request->biaya_rq;
      $orders->jarak = $jarak[0];
      $orders->ongkir = $request->ongkir;
      $orders->total = $request->total;
      $orders->save(); 


      $mitra = Pickup::where('id', $request->pickup_id)->first();

      return view('success', compact('mitra'))->withPickupid($request->pickup_id)->withNama($request->nama)->withLtuser($request->latitude)->withLguser($request->longitude)->withAlamat($request->alamat)->withDetail($request->detail)->withNohp($request->no_hp)->withReqorder($request->request_order)->withBiayarq($request->biaya_rq)->withJarak($jarak[0])->withOngkir($request->ongkir)->withTotal($request->total);
    }

}
