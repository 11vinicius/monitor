<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CattleTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $health_events =[
                ['name' => 'Vacinação', 'description' => 'Aplicação de vacinas contra doenças como febre aftosa, brucelose, clostridiose, etc.'],
                ['name' => 'Vermifugação', 'description' => 'Administração de vermífugos para controle de parasitas.'],
                ['name' => 'Doença', 'description' => 'Registro de alguma enfermidade diagnosticada.'],
                ['name' => 'Tratamento Médico', 'description' => 'Administração de medicamentos e procedimentos veterinários.'],
                ['name' => 'Castração', 'description' => 'Procedimento cirúrgico para remoção dos testículos de machos.'],
                ['name' => 'Consulta Veterinária', 'description' => 'Atendimento clínico para diagnóstico ou acompanhamento de saúde.'],
                ['name' => 'Inseminação Artificial', 'description' => 'Aplicação de sêmen em uma fêmea sem a monta natural.'],
                ['name' => 'Monta Natural', 'description' => 'Reprodução com a presença do touro.'],
                ['name' => 'Gestação Confirmada', 'description' => 'Diagnóstico positivo de prenhez.'],
                ['name' => 'Aborto', 'description' => 'Interrupção da gestação antes do tempo.'],
                ['name' => 'Parto', 'description' => 'Nascimento do bezerro.'],
                ['name' => 'Natimorto', 'description' => 'Bezerro nascido morto.'],
                ['name' => 'Desmame', 'description' => 'Separação do bezerro da mãe.'],
                ['name' => 'Troca de Lote', 'description' => 'Mudança de pasto ou grupo de manejo.'],
                ['name' => 'Pesagem', 'description' => 'Registro de peso do animal em uma data específica.'],
                ['name' => 'Marcação', 'description' => 'Identificação por brinco, tatuagem ou marcação a fogo.'],
                ['name' => 'Transferência Interna', 'description' => 'Mudança de fazenda ou setor dentro da propriedade.'],
                ['name' => 'Venda', 'description' => 'Comercialização do animal.'],
                ['name' => 'Compra', 'description' => 'Entrada do animal na fazenda.'],
                ['name' => 'Abate', 'description' => 'Destino final do animal para produção de carne.'],
                ['name' => 'Óbito', 'description' => 'Morte do animal por causas naturais ou doenças.'],
        ];


        foreach ($health_events as $event) {
            DB::table('cattle_event_type')->insert([
                'name' => $event['name'],
                'description' => $event['description'],
            ]);    
        }
    }
}
