<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaccionCabecera extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lines() {
        return $this->hasMany(TransaccionDetalle::class, 'transaccion_cabecera_id');
    }
}
