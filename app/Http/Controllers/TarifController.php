<?php

namespace App\Http\Controllers;

use App\Tarif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TarifController extends Controller
{
    public function all()
    {
        $tarifs = Tarif::all();
        return view('tarifs/tarifs', compact('tarifs'));
    }

    public function addTarif(Request $request)
    {
        if ($request->addTarif) {

            Tarif::create([
                'title' => $request->title,
                'days' => $request->days,
                'percent' => $request->percent,
                'enabled' => $request->enabled,
            ]);
            return redirect()->route('tarifs');
        }

        return view('tarifs/addTarif');
    }

    public function editTarif(Request $request, $id)
    {
        $tarif = Tarif::find($id);

        if ($request->editTarif) {
            $tarif->update([
                'title' => $request->title ?: $tarif->title,
                'days' => $request->days ?: $tarif->days,
                'percent' => $request->percent ?: $tarif->percent,
                'enabled' => $request->enabled,
            ]);
            Session::flash('editTarif', 'Тариф изменен успешно!');
            return redirect()->route('tarifs');

        }

        return view('tarifs/editTarif', compact('tarif'));
    }
}
