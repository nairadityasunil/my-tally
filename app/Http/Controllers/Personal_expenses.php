<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Personal_expense;

class Personal_expenses extends Controller
{
    public function view_all_personal_expense()
    {
        $all_expenses = Personal_expense::all();
        $data = compact('all_expenses');
        return view('all_personal_expenses')->with($data);
    }
}
