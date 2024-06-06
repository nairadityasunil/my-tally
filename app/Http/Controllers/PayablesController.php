<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payable;
use App\Models\All_transaction;

class PayablesController extends Controller
{
    public function view_all_payables()
    {
        $all_payables = Payable::all();
        $data = compact('all_payables');
        return view('all_payables')->with($data);
    }
}
