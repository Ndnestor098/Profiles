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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('profile_code')->unique();

            $table->unsignedTinyInteger('level')->default(1);

            $table->string('nombre')->nullable();
            $table->string('ciudad')->nullable();

            $table->string('email')->unique()->nullable();
            $table->string('email_recuperacion')->nullable();
            $table->boolean('bind_email')->default(false);
            $table->string('software')->nullable();

            $table->string('password')->nullable();
            $table->string('password_recuperacion')->nullable();

            $table->string('clave_2fa')->nullable();

            $table->date('fecha_creacion')->nullable();
            $table->date('fecha_modificacion')->nullable();
            $table->date('fecha_adquisicion')->nullable();

            $table->string('estado')->default('Inactivo');
            $table->string('proveedor')->nullable();
            $table->string('lugar_imagen')->nullable();
            $table->timestamp('primer_inicio_sesion')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
