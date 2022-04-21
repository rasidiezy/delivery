<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Pickup;
use App\Models\Discount;
use App\Models\Ongkir;
use App\Models\NomorWhatsapp;
use App\Http\Requests\Store;

class OrderController extends Controller
{
    public function index()
    {
    //mengambil semua data pickup 
      $mitra = Pickup::all();
    //mengambil  data ongkir 
      $ongkirs = Ongkir::all();
      $ongkir = $ongkirs->where('id', 1)->first();
    //mengambil data nomer whatsapp 
      $nowhatsapp = NomorWhatsapp::all();
      $nowa = $nowhatsapp->where('id', 1)->first();
      //mengambil semua data diskon 
      $discount = Discount::all();
      //filter data diskon yang dimana tanggal berakhir lebih dari tanggal hari ini.
      $diskon = $discount->where('end_discount', '>', date('Y-m-d'));
      return view('welcome',[
          'mitra' => $mitra , 'discount' => $diskon, 'ongkir' => $ongkir, 'nowa' => $nowa
      ]);
    }

    public function store(Store $request){
      /// mengambil data inputan
    //   $data = $request->all();
      /// save data order
    //   $orders = Order::create($data);
    
    
      $orders = new Order;

      $jarak = explode(' ', request('jarak'));
      $diskon = str_replace("-", "", $request->diskon);
      $diskon1 = str_replace(".", "", $diskon);
      $ongkir = str_replace(".", "", $request->ongkir);
      $addorder = str_replace(".", "", $request->biaya_rq);
      $total = str_replace(".", "", $request->total);

      $orders->pickup_id = $request->pickup_id;
      $orders->nama = $request->nama;
      $orders->latitude = $request->latitude;
      $orders->longitude = $request->longitude;
      $orders->alamat = $request->alamat;
      $orders->detail = $request->detail;
      $orders->no_hp = $request->no_hp;
      $orders->request_order = $request->request_order;
      $orders->biaya_rq = $addorder;
      $orders->jarak = $jarak[0];
      $orders->ongkir = $ongkir;
      $orders->discount_id = $request->id_diskon;
      $orders->potongan_diskon = $diskon1;
      $orders->total = $total;
      $orders->save(); 

      $mitra = Pickup::where('id', $request->pickup_id)->first();
      $whatsapp = NomorWhatsapp::where('id', 1)->first();
      return view('success', compact('mitra', 'whatsapp'))->withPickupid($request->pickup_id)->withNama($request->nama)->withLtuser($request->latitude)->withLguser($request->longitude)->withAlamat($request->alamat)->withDetail($request->detail)->withNohp($request->no_hp)->withReqorder($request->request_order)->withBiayarq($addorder)->withJarak($jarak[0])->withOngkir($ongkir)->withTotal($total)->withPotongandiskon($diskon1);
    }

}
