<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class All_transaction extends Model
{
    use HasFactory;
    protected $table = "all_transactions";
    protected $primaryKey = "id";
}
