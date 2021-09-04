<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function resource()
    {
        return $this->hasMany(Resource::class, 'tier_id');
    }
}
