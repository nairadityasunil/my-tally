<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recievable extends Model
{
    use HasFactory;
    protected $table = "recievables";
    protected $primaryKey = "id";
}
