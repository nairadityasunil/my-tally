<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recievable;

class RecievablesController extends Controller
{
    public function view_all_recievables()
    {
        $all_recievables = Recievable::all();
        $data = compact('all_recievables');
        return view('all_recievables')->with($data);
    }
}
