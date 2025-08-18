<?php
namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    public function run(): void
    {
        $sectors = [
            ['name' => 'Adtech / Martech', 'description' => 'Tecnologia voltada para publicidade e marketing, como plataformas de anúncios, análise de dados de campanhas ou personalização de conteúdo.'],
            ['name' => 'Assurtech', 'description' => 'Tecnologias de seguros mais específicos, geralmente nichados. Não confundida com Insurtech.'],
            ['name' => 'Climatetech', 'description' => 'Tecnologias voltadas para combater mudanças climáticas, como captura de carbono, agricultura regenerativa ou energias renováveis.'],
            ['name' => 'Legaltech', 'description' => 'Soluções tecnológicas para o setor jurídico, como automação de contratos, gestão de processos legais e compliance.'],
            ['name' => 'Insurtech', 'description' => 'Soluções tecnológicas para o setor de seguros, como personalização de apólices, análise de riscos ou automação de sinistros.'],
            ['name' => 'Foodtech', 'description' => 'Inovações no setor de alimentos, como delivery, produção e logística de alimentos, produção sustentável, alimentos plant-based ou tecnologias para restaurantes.'],
            ['name' => 'Proptech / Construtech / Real Estate Tech', 'description' => 'Soluções tecnológicas para o setor de construção civil, como softwares de gestão de obras, materiais sustentáveis ou automação de processos.'],
            ['name' => 'Cleantech / Greentech', 'description' => 'Startups focadas em sustentabilidade e energia limpa, como soluções para eficiência energética, gestão de resíduos ou redução de emissões.'],
            ['name' => 'Mobility', 'description' => 'Tecnologias para mobilidade urbana, incluindo transporte compartilhado, veículos autônomos, logística ou micromobilidade (bicicletas e patinetes elétricos).'],
            ['name' => 'HRtech (ou Worktech, ou RHTech)', 'description' => 'Tecnologias voltadas para recursos humanos, incluindo recrutamento, gestão de talentos, engajamento de funcionários e automação de processos de RH.'],
            ['name' => 'Cybertech / Securitytech', 'description' => 'Startups focadas em cibersegurança, como proteção de dados, prevenção de ataques cibernéticos ou autenticação segura.'],
            ['name' => 'MediaTech', 'description' => 'Tecnologia aplicada a mídia, entretenimento e conteúdo digital.'],
            ['name' => 'Gaming / GameTech / eSports', 'description' => 'Tecnologia para a indústria de jogos, incluindo desenvolvimento de jogos, realidade virtual/aumentada ou plataformas de streaming para gamers.'],
            ['name' => 'Deeptech', 'description' => 'Startups baseadas em pesquisa científica, hard science e tecnologia de ponta (IA, biotecnologia, robótica, computação quântica, nanotecnologia etc.).'],
            ['name' => 'Biotech', 'description' => 'Startups que utilizam tecnologia em biologia, como desenvolvimento de medicamentos, terapias genéticas ou diagnósticos avançados, química e agricultura.'],
            ['name' => 'SpaceTech', 'description' => 'Tecnologias para exploração espacial, satélites e comunicação.'],
            ['name' => 'Traveltech / Turistech', 'description' => 'Tecnologias para o setor de turismo e viagens, incluindo plataformas de reservas, personalização de experiências ou gestão de itinerários.'],
            ['name' => 'Energytech', 'description' => 'Tecnologias e soluções energéticas, smart grid e geração distribuída.'],
            ['name' => 'Fintech', 'description' => 'Startups que inovam serviços financeiros com tecnologia, oferecendo pagamentos, investimentos, empréstimos e seguros mais acessíveis e eficientes.'],
            ['name' => 'Wealthtech', 'description' => 'Tecnologias do subsetor de fintechs, focado em gestão de investimentos e patrimônio.'],
            ['name' => 'IoT / HardwareTech', 'description' => 'Tecnologias de dispositivos inteligentes conectados à internet.'],
            ['name' => 'AI/ML Tech', 'description' => 'Startups especializadas em inteligência artificial e machine learning.'],
            ['name' => 'Sportstech', 'description' => 'Inovações no setor esportivo, como plataformas de análise de desempenho, wearables para atletas ou engajamento de fãs.'],
            ['name' => 'Logtech', 'description' => 'Tecnologia aplicada à logística e cadeia de suprimentos, como otimização de rotas, rastreamento de cargas ou gestão de armazéns.'],
            ['name' => 'Femtech', 'description' => 'Tecnologias voltadas para a saúde e bem-estar da mulher, como aplicativos de fertilidade, saúde menstrual ou cuidados pré-natais.'],
            ['name' => 'Regtech', 'description' => 'Soluções para regulamentação e conformidade, ajudando empresas a cumprir normas legais e regulatórias de forma eficiente.'],
            ['name' => 'Healthtech', 'description' => 'Startups que usam tecnologia para melhorar saúde e bem-estar, com foco em telemedicima, diagnósticos e gestão hospitalar.'],
            ['name' => 'Edutech', 'description' => 'Startups que transformam a educação com plataformas de ensino online, aprendizado personalizado e gestão escolar.'],
            ['name' => 'Agrotech', 'description' => 'Startups que aplicam tecnologia na agricultura para aumentar produtividade e sustentabilidade, usando IoT, drones e biotecnologia.'],
            ['name' => 'Retailtech', 'description' => 'Startups que inovam o varejo com e-commerce, pagamentos, gestão de estoque e personalização de experiências.'],
            ['name' => 'Govtech', 'description' => 'Startups que modernizam serviços públicos com tecnologia, promovendo transparência, eficiência e participação cidadã.'],
        ];

        foreach ($sectors as $sector) {
            Sector::create($sector);
        }
    }
}
