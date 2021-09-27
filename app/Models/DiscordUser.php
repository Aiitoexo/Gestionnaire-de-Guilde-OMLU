<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscordUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'pseudo',
        'id_discord_user',
    ];

    public function role()
    {
        return $this->belongsToMany(Role::class, DiscordUserRole::class);
    }
}
