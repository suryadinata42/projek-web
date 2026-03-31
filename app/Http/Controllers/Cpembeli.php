<?php

namespace App\Http\Controllers;
use App\Models\Mpembeli;
use Illuminate\Http\Request;

class Cpembeli extends Controller
{
    public function tampilan(){
        $pembeli = Mpembeli::all();
        return view("pembeli.tampilan",compact("pembeli"));
    }
}
