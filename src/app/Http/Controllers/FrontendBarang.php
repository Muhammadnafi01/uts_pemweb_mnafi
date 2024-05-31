<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class FrontendBarang extends Controller
{
    public function home ()
    {
        $barangs = Barang::get();
        return view('Barang.index', compact('barangs'));
    }
}
