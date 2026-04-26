<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use App\Models\User;



class Paciente extends Model
{
    use HasRoles, HasFactory;

    protected $guard_name = 'web';

    protected $fillable = [
        'nombres', 'apellidos', 'fecha_nacimiento', 'cedula', 'telefono', 'direccion', 'sexo', 'estado_civil', 'ocupacion', 'peso', 'altura', 'tipo_sangre', 'alergias', 'enfermedades', 'medicamentos', 'antecedentes', 'contacto_emergencia', 'observaciones', 'email', 'fecha_consulta'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function historial()
    {
        return $this->hasMany(Historial::class);
    }
}







