<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rarity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color_frame',
    ];

    public function resource()
    {
        return $this->hasMany(Resource::class, 'rarity_id');
    }
}
