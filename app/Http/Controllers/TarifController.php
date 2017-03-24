<?php

namespace App\Http\Controllers;

use App\Tarif;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    public function all()
    {
        $tarifs = Tarif::all();
        return view('tarifs/tarifs', compact('tarifs'));
    }
}
