<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemContribution extends Model
{
    use HasFactory;

    protected $fillable = [
        'contribution_id',
        'discord_user_id',
        'resource_id',
        'quantity_resource_request',
        'quantity_resource_received',
        'contribution_complete',
    ];

    public function user_discord()
    {
        return $this->belongsTo(DiscordUser::class, 'discord_user_id');
    }
}
