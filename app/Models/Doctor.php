<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombres',
        'apellidos',
        'especialidad',
        'telefono',
        'user_id'
    ];

    /**
     * Get the user that owns the doctor.
     */
    public function consultorio()
    {
        return $this->belongsTo(Consultorio::class);
    }

    public  function horarios()
    {
        return $this->hasMany(Horario::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function historial()
    {
        return $this->hasMany(Historial::class);
    }

}