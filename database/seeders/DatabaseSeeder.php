<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear roles primero
        $admin = Role::create(['name' => 'admin']);
        $secretaria = Role::create(['name' => 'secretaria']);
        $doctor = Role::create(['name' => 'doctor']);
        $paciente = Role::create(['name' => 'paciente']);
        $usuario = Role::create(['name' => 'usuario']);

        // Crear permisos y asignar roles
        Permission::create(['name' => 'admin.index']);

        Permission::create(['name' => 'admin.usuarios.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.confirmDelete'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.secretaria.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.secretaria.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.secretaria.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.secretaria.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.secretaria.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.secretaria.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.secretaria.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.pacientes.index'])->syncRoles([$admin, $secretaria, $doctor]);
        Permission::create(['name' => 'admin.pacientes.create'])->syncRoles([$admin, $secretaria ,$doctor]);
        Permission::create(['name' => 'admin.pacientes.store'])->syncRoles([$admin, $secretaria,$doctor]);
        Permission::create(['name' => 'admin.pacientes.edit'])->syncRoles([$admin, $secretaria,$doctor]);
        Permission::create(['name' => 'admin.pacientes.update'])->syncRoles([$admin, $secretaria,$doctor]);
        Permission::create(['name' => 'admin.pacientes.show'])->syncRoles([$admin, $secretaria,$doctor]);
        Permission::create(['name' => 'admin.pacientes.confirmDelete'])->syncRoles([$admin, $secretaria,$doctor]);
        Permission::create(['name' => 'admin.pacientes.destroy'])->syncRoles([$admin, $secretaria,$doctor]);

        Permission::create(['name' => 'admin.consultorios.index'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.consultorios.create'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.consultorios.store'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.consultorios.edit'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.consultorios.update'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.consultorios.show'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.consultorios.confirmDelete'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.consultorios.destroy'])->syncRoles([$admin, $secretaria]);

        Permission::create(['name' => 'admin.doctores.index'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.create'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.store'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.edit'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.update'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.show'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.confirmDelete'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.destroy'])->syncRoles([$admin, $secretaria]);

        Permission::create(['name' => 'admin.horarios.index'])->syncRoles([$admin, $secretaria, $doctor]);
        Permission::create(['name' => 'admin.horarios.create'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.horarios.store'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.horarios.edit'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.horarios.update'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.horarios.show'])->syncRoles([$admin, $secretaria, $doctor]);
        Permission::create(['name' => 'admin.horarios.confirmDelete'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.horarios.destroy'])->syncRoles([$admin, $secretaria]);
        

        //rutas para el historial clinico
        Permission::create(['name' => 'admin.historial.index'])->syncRoles([$admin,  $doctor]);
        Permission::create(['name' => 'admin.historial.create'])->syncRoles([$admin,  $doctor]);
        Permission::create(['name' => 'admin.historial.store'])->syncRoles([$admin, $doctor]);     
        Permission::create(['name' => 'admin.historial.show'])->syncRoles([$admin,  $doctor]);
        Permission::create(['name' => 'admin.historial.edit'])->syncRoles([$admin,  $doctor]);
        Permission::create(['name' => 'admin.historial.update'])->syncRoles([$admin,  $doctor]);
        Permission::create(['name' => 'admin.historial.confirmDelete'])->syncRoles([$admin, $doctor]);
        Permission::create(['name' => 'admin.historial.destroy'])->syncRoles([$admin, $doctor]);
        Permission::create(['name' => 'admin.historial.pdf'])->syncRoles([$admin, $doctor]);


        // Crear usuarios y asignar roles
        $adminUser = User::create([
            'name' => 'Administrador',
            'email' => 'admin@correo.com',
            'password' => bcrypt('12345678')
        ]);
        $adminUser->assignRole($admin);

        $doctorUser = User::create([
            'name' => 'Doctor1',
            'email' => 'Doctor@correo.com',
            'password' => bcrypt('12345678')
        ]);
        $doctorUser->assignRole($doctor);

        $pacienteUser = User::create([
            'name' => 'Paciente1',
            'email' => 'Paciente@correo.com',
            'password' => bcrypt('12345678')
        ]);
        $pacienteUser->assignRole($paciente);

        $usuarioUser = User::create([
            'name' => 'Usuario1',
            'email' => 'Usuario@correo.com',
            'password' => bcrypt('12345678')
        ]);
        $usuarioUser->assignRole($usuario);

        $secretariaUser = User::create([
            'name' => 'Secretaria',
            'email' => 'Secretaria@correo.com',
            'password' => bcrypt('12345678')
        ]);
        $secretariaUser->assignRole($secretaria);

        // Llama a otros seeders si es necesario
        $this->call([PacienteSeeder::class]);
    }
}