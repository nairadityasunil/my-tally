<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\All_transaction;
use App\Models\Recievable;

use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function add_transaction()
    {
        $current_date = Carbon::now();
        $current_date = $current_date->toDateTimeString();
        $current_date = Str::substr($current_date , 0 ,10);
        $todays_transactions = All_transaction::whereBetween('created_at', [$current_date.' 00:00:00', $current_date.' 23:59:59'])->get();
        $data = compact('todays_transactions');
        return view('add_transaction')->with($data);
    }
   
    public function save_transaction(Request $request)
    {
        // Validate the form data
        // $request->validate([
        //     'name' => 'required|string',
        //     'purpose' => 'required|string',
        //     'action' => 'required|in:paid,received',
        //     'mode' => 'required|in:cash,bank transfer,net banking,upi',
        //     'total_amount' => 'required|numeric',
        //     'inputs.*.entity_name' => 'required|string',
        //     'inputs.*.amount' => 'required|numeric',
        // ]);

        // Create a new transaction
        $transaction = new All_transaction();
        $transaction->name = $request->input('name');
        $transaction->purpose = $request->input('purpose');
        $transaction->action = $request->input('action');
        $transaction->mode = $request->input('mode');
        $transaction->amount = $request->input('total_amount');

        // Save the transaction
        $transaction->save();

        if ($request->action == "paid")
        {
            // Get the ID of the saved transaction
            $transactionId = $transaction->id;
    
            // Process the dynamic input fields
            foreach ($request->input('inputs') as $input) {
                $recievable = new Recievable();
                if ($input['entity_name']!='Self')
                {
                    $recievable->name = $input['entity_name'];
                    $recievable->purpose = $request['purpose'];
                    $recievable->mode = $request['mode'];
                    $recievable->amount = $input['amount'];
                    $recievable->transaction_id = $transactionId;
                    $recievable->save();
                }
            }
        }
        return redirect('/add_transaction');
    }

    public function all_transactions()
    {
        $all_transactions = All_transaction::all();
        $data = compact('all_transactions');
        return view('all_transactions')->with($data);
    }

    public function all_received()
    {
        $all_received = All_transaction::where('action','=','received')->get();
        $data = compact('all_received');
        return view('all_received')->with($data);
    }

    public function all_paid()
    {
        $all_paid = All_transaction::where('action','=','paid')->get();
        $data = compact('all_paid');
        return view('all_paid')->with($data);
    }

    public function delete_transaction($id)
    {
        $delete_transaction = All_transaction::find($id);
        if (!is_null($delete_transaction))
        {
            $transaction_id = All_transaction::where('id','=',$id)->get();
            if($delete_transaction->delete())
            {
                $transaction = Recievable::where('transaction_id','=',$transaction_id)->get();
                if (!is_null($transaction))
                {
                    foreach($transaction as $delete_id)
                    {
                        $delete_id->delete();
                    }
                    session()->flash('status','Entry Deleted');
                    return redirect('/all_transactions');
                }
            }
        }
    
    }
}

