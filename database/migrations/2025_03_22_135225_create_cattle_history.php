<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('cattle_history', function (Blueprint $table) {
            $table->id(); // SERIAL PRIMARY KEY
            $table->string('event_type', 50)->nullable(); // tipo_evento
            $table->text('description')->nullable(); // descricao
            $table->string('medication_used', 100)->nullable(); // medicamento_utilizado
            $table->string('dose_administered', 50)->nullable(); // dose_aplicada
            $table->string('veterinarian', 100)->nullable(); // veterinario_responsavel
            $table->string('breeding_type', 50)->nullable(); // tipo_cobertura
            $table->date('breeding_date')->nullable(); // data_cobertura
            $table->date('expected_birth_date')->nullable(); // data_parto_previsto
            $table->date('birth_date')->nullable(); // data_parto
            $table->string('birth_result', 50)->nullable(); // resultado_parto
            $table->decimal('weight', 5, 2)->nullable(); // peso
            $table->string('handling_type', 50)->nullable(); // tipo_manejo
            $table->text('handling_description')->nullable(); // descricao_manejo
            $table->string('movement_type', 50)->nullable(); // tipo_movimentacao
            $table->string('destination', 100)->nullable(); // destino

            // Chaves estrangeiras
            $table->unsignedBigInteger('cattle_id'); // id_animal
            $table->unsignedBigInteger('sire_id')->nullable(); // id_reprodutor
            $table->unsignedBigInteger('dam_id')->nullable(); // id_mother (mãe)
            $table->foreign('cattle_id')->references('id')->on('cattle')->onDelete('cascade'); // animais -> cattle
            $table->foreign('sire_id')->references('id')->on('cattle')->onDelete('set null'); // Reprodutor (pai)
            $table->foreign('dam_id')->references('id')->on('cattle')->onDelete('set null'); // Mãe do bezerro
            $table->timestamps(); // created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('cattle_history');
    }
};

