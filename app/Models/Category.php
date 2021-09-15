<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function resource()
    {
        return $this->hasMany(Resource::class, 'category_id')->with('rarity')->with('tier');
    }
}
