<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoldContribution extends Model
{
    use HasFactory;

    protected $fillable = [
        'contribution_id',
        'discord_user_id',
        'quantity_gold_request',
        'quantity_gold_received',
        'contribution_complete',
    ];

    public function user_discord()
    {
        return $this->belongsTo(DiscordUser::class, 'discord_user_id');
    }
}
