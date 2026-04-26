<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    protected $model = Paciente::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombres' => $this->faker->firstName,
            'apellidos' => $this->faker->lastName,
            'fecha_nacimiento' => $this->faker->date('Y-m-d', '2005-01-01'),
            'cedula' => Str::random(10),
            'telefono' => Str::random(8),
            'direccion' => $this->faker->address,
            'sexo' => $this->faker->randomElement(['Masculino', 'Femenino']),
            'estado_civil' => $this->faker->randomElement(['Soltero', 'Casado', 'Divorciado', 'Viudo']),
            'ocupacion' => $this->faker->randomElement(['Estudiante', 'Empleado', 'Desempleado', 'Jubilado']),
            'peso' => $this->faker->numberBetween(50, 120),
            'altura' => $this->faker->numberBetween(150, 200),
            'tipo_sangre' => $this->faker->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
            'alergias' => $this->faker->sentence(3),
            'enfermedades' => $this->faker->randomElement(['Si', 'No']),
            'medicamentos' => $this->faker->randomElement(['Si', 'No']),
            'antecedentes' => $this->faker->randomElement(['Si', 'No']),
            'contacto_emergencia' => $this->faker->phoneNumber,
            'observaciones' => $this->faker->sentence(3),
            'email' => $this->faker->unique()->safeEmail,
            'fecha_consulta' => $this->faker->date('Y-m-d', 'now'), // <-- Agregado
        ];
    }
}
