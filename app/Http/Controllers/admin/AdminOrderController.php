<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Auth;

class AdminOrderController extends Controller
{
    public function index() {
        // $orders = Order::all();
        $orders = Order::with('Pickup')->get()->sortByDesc('created_at');
        // $order = $orders->values()->all();
        // return $order;
        // $mitra = Pickup::where('id', $request->pickup_id)->first();
        return view('admin.orders.index', [
            'orders' => $orders
        ]);
    }
}
