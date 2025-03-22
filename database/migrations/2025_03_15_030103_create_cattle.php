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
        Schema::create('cattle', function (Blueprint $table) {
            $table->id(); // SERIAL PRIMARY KEY
            $table->text('name'); // Nome
            $table->text('identification_number'); // Numero de identificação
            $table->text('registration_number'); // Numero de registro
            $table->text('avatar'); // Foto
            $table->text('breed'); // Raca
            $table->text('sex'); // Masculino, Feminino
            $table->boolean('is_reproductively_mature')->default(false); // Indica se atingiu a maturidade reprodutiva
            $table->date('date_of_birth');  // Data de nascimento
            $table->string('origin_of_cattle'); // Origem do animal
            $table->timestamps(); // created_at e updated_at
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cattle');
    }
};
