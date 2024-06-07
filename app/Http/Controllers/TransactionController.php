<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\All_transaction;
use App\Models\Recievable;
use App\Models\Payables;
use App\Models\Personal_expense;

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
                $new_personal_expense = new Personal_expense();
                
                if ($input['entity_name']!='Self')
                {
                    $recievable->name = $input['entity_name'];
                    $recievable->purpose = $request['purpose'];
                    $recievable->mode = $request['mode'];
                    $recievable->amount = $input['amount'];
                    $recievable->transaction_id = $transactionId;
                    $recievable->save();
                }
                else if($input['entity_name']=='Self' && $input['amount']!=0)
                {
                    $new_personal_expense->name = $request->input('name');
                    $new_personal_expense->purpose = $request->input('purpose');
                    $new_personal_expense->mode = $request->input('mode');
                    $new_personal_expense->amount = $input['amount'];
                    $new_personal_expense->transaction_id = $transactionId;
                    $new_personal_expense->save();  
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
        if(!is_null($delete_transaction))
        {
            // Finding in receivables
            $entry_in_receivable = Recievable::where('transaction_id' , '=' , $id)->get();
            if(!is_null($entry_in_receivable))
            {
                foreach ($entry_in_receivable as $entry)
                {
                    $delete_from_receivable = Recievable::Find($entry->id);
                    if(!is_null($delete_from_receivable))
                    {
                        if($delete_from_receivable->delete())
                        {
                            if($delete_transaction->delete())
                            {
                                return redirect('/all_transactions');
                            }
                        }
                    }
                }
            }

            // Finding in payables
            else
            {
                $entry_in_payable = Payable::where('transaction_id' , '=', $id)->get();
                if(!is_null($entry_in_payable))
                {
                    foreach ($entry_in_entry as $entry)
                    {
                        $delete_from_payable = Payable::Find($entry->id);
                        if(!is_null($delete_from_payable))
                        {
                            if($delete_from_payable->delete())
                            {
                                if($delete_transaction->delete())
                                {
                                    return redirect('/all_transactions');
                                }
                            }
                        }
                    }
                }

                // Not found in receivable or payable
                {
                    if($delete_from_payable->delete())
                    {
                        if($delete_transaction->delete())
                        {
                            return redirect('/all_transactions');
                        }
                    }
                }
            }

        }
    }
}

