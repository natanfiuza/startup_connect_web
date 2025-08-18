<?php
namespace Database\Seeders;

use App\Models\FundingStage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FundingStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('funding_stages')->truncate();
        Schema::enableForeignKeyConstraints();
        $stages = [
            ['name' => 'Bootstrapped', 'description' => 'A startup está sendo financiada com recursos próprios dos fundadores, sem investimento externo.'],
            ['name' => 'Friends & Family', 'description' => 'Rodada inicial de capital levantado com amigos, familiares e contatos próximos.'],
            ['name' => 'Investidor Anjo', 'description' => 'Investimento realizado por um ou mais investidores anjo, que geralmente agregam experiência e networking.'],
            ['name' => 'Pre-Seed', 'description' => 'Rodada de capital muito inicial, focada em validar a ideia, construir o MVP (Mínimo Produto Viável) e formar a equipe.'],
            ['name' => 'Seed (Capital Semente)', 'description' => 'Primeira rodada de capital significativa, usada para encontrar o product-market fit e iniciar a tração de mercado.'],
            ['name' => 'Série A', 'description' => 'Focada em otimizar a base de usuários e desenvolver um modelo de receita escalável e de longo prazo.'],
            ['name' => 'Série B', 'description' => 'Rodada para escalar a empresa massivamente, expandir a equipe e aumentar a participação de mercado.'],
            ['name' => 'Série C', 'description' => 'Focada em acelerar o crescimento, muitas vezes visando novos mercados, aquisições ou desenvolvimento de novos produtos.'],
            ['name' => 'Série D+', 'description' => 'Rodadas de financiamento em estágio avançado para crescimento contínuo ou como uma ponte para um IPO.'],
            ['name' => 'Crowdfunding', 'description' => 'Capital levantado através de financiamento coletivo em plataformas online.'],
            ['name' => 'Adquirida (Acquired)', 'description' => 'A startup foi comprada por outra empresa, representando um evento de saída para os fundadores e investidores.'],
            ['name' => 'Pública (IPO)', 'description' => 'A empresa abriu seu capital na bolsa de valores, vendendo ações para o público geral.'],
            ['name' => 'Outro', 'description' => 'Qualquer outro tipo de estágio de financiamento ou situação não coberta pelas opções acima.'],
        ];

        foreach ($stages as $stage) {
            FundingStage::create($stage);
        }

    }
}
