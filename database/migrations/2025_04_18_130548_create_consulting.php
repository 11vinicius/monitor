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
        Schema::create('consultings', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nome
            $table->string('type_of_occurrence'); // tipo ocorrencia
            $table->string('action_taken'); // ação tomada
            $table->string('image'); // imagem
            $table->text('description'); // descricao
            $table->unsignedBigInteger('cattle_id'); // Campo que será FK
            $table->foreign('cattle_id')->references('id')->on('cattle')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultings');
    }
};
