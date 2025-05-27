<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::unprepared("CREATE OR ALTER PROCEDURE InsertRolesyAdmin
        AS
        BEGIN
            SET NOCOUNT ON;

            -- Insertar roles si no existen
            IF NOT EXISTS (SELECT 1 FROM Roles WHERE NombreRol = 'Administrador')
            BEGIN
                INSERT INTO Roles (NombreRol, status, created_at, updated_at)
                VALUES ('Administrador', 1, GETDATE(), GETDATE());
            END;

            IF NOT EXISTS (SELECT 1 FROM Roles WHERE NombreRol = 'Empleado')
            BEGIN
                INSERT INTO Roles (NombreRol, status, created_at, updated_at)
                VALUES ('Empleado', 1, GETDATE(), GETDATE());
            END;
        END");
    }

    public function down(): void
    {
        DB::unprepared("DROP PROCEDURE IF EXISTS InsertRolesyAdmin;");
    }
};
