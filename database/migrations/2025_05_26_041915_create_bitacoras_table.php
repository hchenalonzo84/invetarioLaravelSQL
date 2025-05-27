<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->id(); // PK estándar: id
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('accion');
            $table->string('tabla_afectada');
            $table->timestamp('fecha_accion')->useCurrent(); // Usa CURRENT_TIMESTAMP
            $table->text('detalle')->default('');
            $table->boolean('status')->default(1);
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bitacoras');
    }
};
