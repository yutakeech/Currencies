<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyValues extends Model
{
    use HasFactory;

    protected $fillable = [
        'char_code',
        'save_date',
        'data_value'
    ];
}
