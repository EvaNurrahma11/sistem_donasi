<?php

namespace App\Http\Controllers;
use App\Models\Daftar;

use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function index()
    {
        $daftars = Daftar::paginate(10); 
        $total = Daftar::count(); 

        return view('daftar.index', compact('daftars', 'total'));
    }

    public function create()
    {
        return view('daftar.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:daftars,email',
            'telephone' => 'required',
            'address' => 'required',
            'nominal' => 'required|integer',
        ]);

        Daftar::create($validatedData);

        return redirect()->route('daftar.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $daftar = Daftar::findOrFail($id);

        return view('daftar.edit', compact('daftar'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:daftars,email,' . $id,
            'telephone' => 'required',
            'address' => 'required',
            'nominal' => 'required|integer',
        ]);

        Daftar::whereId($id)->update($validatedData);

        return redirect()->route('daftar.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $daftar = Daftar::findOrFail($id);
        $daftar->delete();

        return redirect()->route('daftar.index')->with('success', 'Data berhasil dihapus');
    }
}
