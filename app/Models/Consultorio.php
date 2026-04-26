<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultorio extends Model
{
    use HasFactory;
     
    protected $fillable = [
        'nombre',
        'direccion',
        'capacidad',
        'telefono',
        'especialidad',
        'estado'
    ];

    /**
     * Get the horarios for the consultorio.
     */
    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }

    /**
     * Get the doctor associated with the consultorio.
     */
    public function doctores()
    {
        return $this->belongsTo(Doctor::class);
    }
}
