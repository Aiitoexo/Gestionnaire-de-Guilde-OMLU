<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryBankResource extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'resource_id',
        'quantity',
        'add',
        'reduce',
        'new_quantity',
        'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function resource()
    {
        return $this->belongsTo(Resource::class, 'resource_id');
    }
}
