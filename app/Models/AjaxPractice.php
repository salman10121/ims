<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AjaxPractice extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'status',
    ];
}
