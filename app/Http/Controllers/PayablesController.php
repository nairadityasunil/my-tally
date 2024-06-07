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

    public function search_payable(Request $request)
    {
        $name = $request['name'];
        $all_payables = Payable::where('name' , 'LIKE' , "%$name%")->get();
        $data = compact('all_payables', 'name');
        return view('all_payables')->with($data);

    }

    public function new_payable()
    {
        $all_payables = Payable::all();
        $data = compact('all_payables');
        return view('new_payable')->with($data);
    }

    public function save_new_payable(Request $request)
    {
        $new_payable = new Payable();
        $transaction = new All_transaction();

        $transaction->name = $request->input('name');
        $transaction->purpose = $request->input('purpose');
        $transaction->action = "received";
        $transaction->mode = $request->input('mode');
        $transaction->amount = $request->input('total_amount');

        if($transaction->save())
        {
            $last_transaction = All_transaction::all()->last();
            $new_payable->name = $last_transaction->name;
            $new_payable->purpose = $last_transaction->purpose;
            $new_payable->mode = $last_transaction->mode;
            $new_payable->amount = $last_transaction->amount;
            $new_payable->transaction_id = $last_transaction->id;
            
            if($new_payable->save())
            {
                return redirect('/all_payables');
            }
        }
    }

    public function confirm_payable($id)
    {
        $entry_id = Payable::find($id);
        $all_payables = Payable::all();
        if(!is_null($entry_id))
        {
            $data = compact('entry_id','all_payables');
            return view('confirm_payable')->with($data);
        }
    }

    public function save_payable(Request $request)
    {
        $transaction = new All_transaction();
        $transaction->name = $request->input('name');
        $transaction->purpose = $request->input('purpose');
        $transaction->action = $request->input('action');
        $transaction->mode = $request->input('mode');
        $transaction->amount = $request->input('total_amount');

        // Save the transaction
        if($transaction->save())
        {
            $payable_id = Payable::find($request->input('payable_id'));
            if(!is_null($payable_id))
            {
                $payable_id->delete();
            }
            return redirect('/all_payables');
        }
    }
}
