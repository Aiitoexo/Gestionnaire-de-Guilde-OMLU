<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoiceChannelTemp extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_voice_channel'
    ];
}
