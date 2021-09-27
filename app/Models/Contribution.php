<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_on',
        'finished_it',
        'active'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    public function gold_contribution()
    {
        return $this->hasMany(GoldContribution::class, 'contribution_id');
    }

    public function item_contribution()
    {
        return $this->hasMany(ItemContribution::class, 'contribution_id');
    }
}
