<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscordUserRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'discord_user_id',
        'role_id',
    ];
}
