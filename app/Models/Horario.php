<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = [
        'dia',
        'hora_inicio',
        'hora_fin',
        'doctor_id',
        'consultorio_id'
    ];

    /**
     * Get the doctor that owns the horario.
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * Get the consultorio that owns the horario.
     */
    public function consultorio()
    {
        return $this->belongsTo(Consultorio::class);
    }
}
