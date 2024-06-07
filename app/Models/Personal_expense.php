<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal_expense extends Model
{
    use HasFactory;
    protected $table = "personal_expense";
    protected $primaryKey = "id";
}
