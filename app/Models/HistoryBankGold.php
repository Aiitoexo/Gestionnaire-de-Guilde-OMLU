<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryBankGold extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'quantity',
        'add',
        'reduce',
        'new_quantity',
        'date',
    ];

    protected $dates = ['date'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
