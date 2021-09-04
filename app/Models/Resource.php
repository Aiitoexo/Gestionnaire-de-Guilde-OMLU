<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'img',
        'category_id',
        'perk_id',
        'rarity_id',
        'tier_id',
        'source_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function perk()
    {
        return $this->belongsTo(Perk::class, 'perk_id');
    }

    public function rarity()
    {
        return $this->belongsTo(Rarity::class, 'rarity_id');
    }

    public function tier()
    {
        return $this->belongsTo(Tier::class, 'tier_id');
    }

    public function source()
    {
        return $this->belongsTo(Source::class, 'source_id');
    }
}
