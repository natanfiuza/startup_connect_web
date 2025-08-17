# **Checklist do Workflow do Projeto: StartupConnect **

Aqui está um roteiro completo, do zero ao lançamento. Podemos seguir este checklist juntos.

## **Fase 0: Planejamento e Configuração do Ambiente**
* [X] **1. Definição do MVP:** Com base nas suas respostas, definir o escopo da primeira versão.
* [X] **2. Design do Banco de Dados:** Desenhar o diagrama das tabelas (Usuários, Perfis, Posts, Conexões, Mensagens, Eventos).
  * [X] 2.1. Geração dos Arquivos de Banco de Dados (Models & Migrations): (Executando agora)
* [x] **3. Configuração do Ambiente de Desenvolvimento:**
    * Instalar o PHP, Composer, Node.js e o instalador do Laravel.
    * Criar um novo projeto Laravel.
    * Configurar o banco de dados (MySQL ou PostgreSQL).
* [x] **4. Instalação do Stack (Laravel, Inertia, Vue):**
    * Instalar e configurar o Laravel Breeze ou Jetstream (recomendo o Jetstream com Inertia).
    * Instalar o Inertia.js e o Vue.js.
* [x] **5. Controle de Versão:** Iniciar um repositório Git para o projeto.

## **Fase 1: A Base da Aplicação (Funcionalidades Essenciais)**
* [ ] **1. Sistema de Autenticação:**
    * Configurar as telas de Registro, Login e Recuperação de Senha.
* [ ] **2. Perfis de Usuário:**
    * Criar a tabela `profiles` no banco de dados.
    * Desenvolver a funcionalidade para o usuário preencher/editar seu perfil (foto, bio, **localização, setor, estágio de financiamento**).
    * Criar a página de visualização de perfil (pública para outros membros).
* [ ] **3. Sistema de Busca e Descoberta:**
    * Criar a página "Encontrar Membros".
    * Implementar os filtros de busca por localização, setor e estágio de financiamento.

## **Fase 2: Interação Social**
* [ ] **1. Sistema de "Seguir":**
    * Criar a tabela de conexões (`followers`).
    * Implementar os botões "Seguir" e "Deixar de Seguir" nos perfis.
* [ ] **2. Feed de Posts:**
    * Criar a tabela `posts` (com suporte a texto, imagem e links de vídeo).
    * Desenvolver o componente para criar um novo post.
    * Construir a página do feed principal, mostrando posts das pessoas que o usuário segue.

## **Fase 3: Comunicação e Eventos**
* [ ] **1. Mensagens Diretas:**
    * Desenhar a estrutura do banco de dados para conversas e mensagens.
    * Criar a interface de chat (lista de conversas e janela de mensagens).
    * Implementar o envio e recebimento de mensagens em tempo real (usando Laravel WebSockets ou um serviço como o Pusher).
* [ ] **2. Mural de Eventos (BBS):**
    * Criar a tabela `events`.
    * Desenvolver o formulário para um usuário publicar um evento (título, descrição, data, local, imagem).
    * Criar a página que lista todos os eventos publicados pela comunidade.

## **Fase 4: Polimento e UI/UX**
* [ ] **1. Design System:** Definir uma paleta de cores, tipografia e componentes visuais (botões, cards, modais) para manter a consistência visual.
* [ ] **2. Layout Responsivo:** Garantir que a aplicação funcione perfeitamente em desktops, tablets e celulares.
* [ ] **3. Notificações:** Criar um sistema de notificações (ex: "Fulano começou a te seguir", "Você tem uma nova mensagem").
* [ ] **4. Refinamento da Experiência:** Adicionar animações sutis, feedback visual para ações do usuário e otimizar a velocidade de carregamento.

## **Fase 5: Lançamento e Manutenção**
* [ ] **1. Configuração do Servidor de Produção:** Preparar um servidor para hospedar a aplicação.
* [ ] **2. Deploy:** Publicar a primeira versão do aplicativo na internet.
* [ ] **3. Testes Finais:** Realizar testes completos em ambiente de produção.
* [ ] **4. Monitoramento e Feedback:** Acompanhar o uso da aplicação, corrigir bugs e coletar feedback dos usuários para planejar as próximas funcionalidades (como a Descoberta Automática de Eventos).
