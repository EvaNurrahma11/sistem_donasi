<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donasi;

class DonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donasis = Donasi::all();
        return view('donasi.index', compact('donasis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'jumlah' => 'required|numeric|min:0',
            'pesan' => 'nullable|string',
        ]);

        Donasi::create($request->all());

        return redirect()->route('donasi.index')->with('message','Donasi berhasil dibuat.');
    }
}
