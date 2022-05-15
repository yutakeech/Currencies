<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'char_code',
        'nominal',
    ];

    public function users()
    {
        $this->hasMany(User::class);
    }
}
