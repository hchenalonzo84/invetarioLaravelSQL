<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RolesTableSeeder extends Seeder
{
    public function run(): void
    {
        // Ejecutar el procedimiento almacenado que crea los roles
        DB::unprepared('EXEC InsertRolesyAdmin');

        // Obtener el ID del rol 'Administrador'
        $adminRolId = DB::table('roles')->where('NombreRol', 'Administrador')->value('IdRol');

        // Insertar o actualizar el usuario administrador por defecto
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@inventario.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin1234'),
                'idRol' => $adminRolId,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
