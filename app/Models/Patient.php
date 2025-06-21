<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    // Specify which columns are mass assignable
    protected $fillable = ['name', 'email', 'phone', 'treatment_type'];


    // Optional: Specify the table name if it differs from the model name
    // protected $table = 'patients';
}
