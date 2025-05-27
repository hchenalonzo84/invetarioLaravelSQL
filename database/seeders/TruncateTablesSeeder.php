<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TruncateTablesSeeder extends Seeder
{
    public function run(): void
    {
        // Desactivar restricciones solo en SQL Server
        DB::statement('ALTER TABLE users NOCHECK CONSTRAINT ALL');
        DB::statement('ALTER TABLE roles NOCHECK CONSTRAINT ALL');

        // Vaciar las tablas sin truncar si hay relaciones activas
        DB::table('users')->delete();
        DB::table('roles')->delete();

        // Reactivar restricciones
        DB::statement('ALTER TABLE users CHECK CONSTRAINT ALL');
        DB::statement('ALTER TABLE roles CHECK CONSTRAINT ALL');
    }
}
