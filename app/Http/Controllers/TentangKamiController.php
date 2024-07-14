<?php

namespace App\Http\Controllers;
use App\Models\tentangkami;

use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    public function index()
    {
        $tentangkamis = TentangKami::all();
        return view('tentangkami.index',compact('tentang_kamis'));
    }
}
