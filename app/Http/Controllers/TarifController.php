<?php

namespace App\Http\Controllers;

use App\models\Tarif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TarifController extends Controller
{
    public function all(Request $request)
    {
        $user = Auth::user();
        $sortby = $request->sortby;
        $order = $request->order;

        $columns = Tarif::$tarifColumns;
        $query = Tarif::select();

        if ($sortby) {
            $query->orderBy($sortby, $order);
        }

        $tarifs = $query->paginate(PER_PAGE);

        return view('tarifs/tarifs', compact('user', 'tarifs', 'columns', 'sortby', 'order', 'request'));
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
