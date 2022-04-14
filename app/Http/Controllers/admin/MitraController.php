<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pickup;
use App\Http\Requests\admin\Store;
use App\Http\Requests\Update;
class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mitra = Pickup::all();
        return view ('admin.mitra.index', [
            'mitra' => $mitra
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.mitra.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $mitra = Pickup::create($request->all());
        $namaMitra = $request->nama;
        $values = "Mitra {$namaMitra} berhasil ditambahkan.";
        $request->session()->flash('success', $values);
        return redirect (route('mitra.index'));
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
    public function edit(Pickup $mitra)
    {
        return view('admin.mitra.update', [
            'mitra' => $mitra
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, Pickup $mitra)
    {
        $mitra->update($request->all());
        $namaMitra = $request->nama;
        $values = "Mitra {$namaMitra} berhasil diupdate.";
        $request->session()->flash('success', $values);
        return redirect (route('mitra.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Pickup $mitra)
    {
        $mitra->delete();
        $request->session()->flash('error', 'Mitra berhasil dihapus');
        return redirect (route('mitra.index'));
    }
}
