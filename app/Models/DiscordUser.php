<?php

namespace App\Models;

use Doctrine\Inflector\Rules\Transformation;
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

    public function squad()
    {
        return $this->belongsTo(Role::class, 'squad_id');
    }

    public function first_weapon()
    {
        return $this->belongsTo(Weapon::class, 'first_weapon_id');
    }

    public function second_weapon()
    {
        return $this->belongsTo(Weapon::class, 'second_weapon_id');
    }

    public function harvest()
    {
        return $this->belongsTo(JobHarvest::class, 'job_harvest_id');
    }

    public function transformation()
    {
        return $this->belongsTo(JobTransformation::class, 'job_transformation_id');
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }
}
