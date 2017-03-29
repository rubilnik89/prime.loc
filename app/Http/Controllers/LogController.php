<?php

namespace App\Http\Controllers;

use App\models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function all(Request $request)
    {
        $sortby = $request->sortby;
        $order = $request->order;


        $columns = Log::$columns;

        $query = Log::select();

        if ($sortby) {
            $query->orderBy($sortby, $order);
        }

        $logs = $query->paginate(10);

        return view('admin/logs', compact('logs', 'columns', 'sortby', 'order', 'request'));
    }
}
