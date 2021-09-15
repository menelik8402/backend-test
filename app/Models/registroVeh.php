<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registroVeh extends Model
{
    use HasFactory;

    protected $table = 'registro_vehs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'chapa_id', 'horaEnt','horaSal','tiempoEst','montoPagar'
    ];


}
