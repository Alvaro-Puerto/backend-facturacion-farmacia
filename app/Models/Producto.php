<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Producto extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function UM() {
        return $this->belongsTo(UM::class, 'u_m_id');
    }
}
