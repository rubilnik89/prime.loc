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

        if ($request->search) {
            $query->searchValue('log_name', $request->log_name)
                ->searchValue('description', $request->description)
                ->searchValue('subject_type', $request->subject_type)
                ->searchValue('properties', $request->properties);
            $request->flash();
        }

        if ($sortby) {
            $query->orderBy($sortby, $order);
        }

        $logs = $query->with('user')->paginate(PER_PAGE);

        return view('admin/logs', compact('logs', 'columns', 'sortby', 'order', 'request'));
    }
}
