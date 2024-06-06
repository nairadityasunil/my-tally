<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recievable;
use App\Models\All_transaction;

class RecievablesController extends Controller
{
    public function view_all_recievables()
    {
        $all_recievables = Recievable::all();
        $data = compact('all_recievables');
        return view('all_recievables')->with($data);
    }

    public function confirm_receivable($id)
    {
        $entry_id = Recievable::find($id);
        $all_receivables = Recievable::all();
        if(!is_null($entry_id))
        {
            $data = compact('entry_id','all_receivables');
            return view('confirm_recievable')->with($data);
        }
        
    }
}
