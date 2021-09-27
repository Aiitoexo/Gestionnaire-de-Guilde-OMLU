<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemContribution extends Model
{
    use HasFactory;

    public function user_discord()
    {
        return $this->belongsTo(DiscordUser::class, 'discord_user_id');
    }
}
