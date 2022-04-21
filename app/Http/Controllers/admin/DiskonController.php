<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;

class DiskonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diskon = Discount::all();
        return view ('admin.diskon.index', [
            'diskon' => $diskon
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.diskon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $diskon = Discount::create($request->all());
        $namaDiskon = $request->nama;
        $values = "Diskon {$namaDiskon} berhasil ditambahkan.";
        $request->session()->flash('success', $values);
        return redirect (route('diskon.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $diskon)
    {
        return view('admin.diskon.update', [
            'diskon' => $diskon
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $diskon)
    {
        $diskon->update($request->all());
        $namaDiskon = $request->nama;
        $values = "Diskon {$namaDiskon} berhasil diupdate.";
        $request->session()->flash('success', $values);
        return redirect (route('diskon.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Discount $diskon)
    {
        $diskon->delete();
        $request->session()->flash('error', 'Diskon berhasil dihapus');
        return redirect (route('diskon.index'));
    }
}
