<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class employee extends Model
{
    use HasFactory;

    protected $table = 'employee_tbl';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'fname', 'mname', 'lname', 'address', 'dob', 'contact'
    ];
}
