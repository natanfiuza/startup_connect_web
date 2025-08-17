<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import {
    StarIcon,
    UserGroupIcon,
    PencilSquareIcon,
    ChatBubbleLeftRightIcon,
    CalendarIcon,
    ArrowTrendingUpIcon,
    ShareIcon,
    ChatBubbleOvalLeftEllipsisIcon,
    HeartIcon,
    UserPlusIcon,
    MagnifyingGlassIcon,
    EnvelopeIcon
} from '@heroicons/vue/24/outline';

// --- DADOS DE EXEMPLO ---
// No futuro, estes dados virão do nosso backend Laravel.
// Por agora, vamos usá-los para construir a interface.
const stats = {
    connections: { value: 0, change: '+12%' },
    posts: { value: 5, change: '+8%' },
    engagement: { value: 130, change: '+25%' },
    events: { value: 3, change: '+2' },
};

const recentActivity = [
    { type: 'Atualização', content: 'Cerebro robo', likes: 0, comments: 0, shares: 0, time: '16 ago' },
    { type: 'Atualização', content: 'Novo teste', likes: 0, comments: 0, shares: 0, time: '16 ago' },
    { type: 'Atualização', content: 'Lançamos nossa nova funcionalidade de análise de risco em tempo real! A tecnologia permite aprovação de crédito em menos de 2 minutos. O futuro do fintech é agora!', likes: 0, comments: 0, shares: 0, time: '16 ago' },
];

const suggestedConnections = []; // Array vazio para simular "nenhuma sugestão"
</script>

<template>
    <AppLayout title="Dashboard">
        <div class="space-y-8">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">Bem-vindo de volta! 👋</h1>
                    <p class="text-gray-500 mt-1">Vamos impulsionar sua startup hoje</p>
                </div>
                <Link href="#"
                    class="bg-primary text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-opacity-90 transition-colors">
                Criar Post
                </Link>
            </div>

            <div class="bg-white p-6 rounded-lg border border-green-200 shadow-sm">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <StarIcon class="h-6 w-6 text-green-500 mr-2" />
                        <h2 class="text-lg font-semibold text-gray-800">Complete seu perfil</h2>
                        <span
                            class="ml-3 bg-gray-200 text-gray-700 text-xs font-bold px-2 py-0.5 rounded-full">0%</span>
                    </div>
                    <Link href="#"
                        class="bg-primary text-white font-semibold py-2 px-4 rounded-lg hover:bg-opacity-90 transition-colors flex items-center">
                    Completar Perfil
                    <span class="ml-2">→</span>
                    </Link>
                </div>
                <p class="text-gray-500 mt-2 mb-4">Maximize suas conexões completando as informações do seu perfil</p>
                <div class="flex space-x-2">
                    <span class="text-xs font-medium bg-gray-100 text-gray-600 px-3 py-1 rounded-full">Nome da
                        startup</span>
                    <span class="text-xs font-medium bg-gray-100 text-gray-600 px-3 py-1 rounded-full">Setor</span>
                    <span
                        class="text-xs font-medium bg-gray-100 text-gray-600 px-3 py-1 rounded-full">Localização</span>
                    <span class="text-xs font-medium bg-gray-100 text-gray-600 px-3 py-1 rounded-full">Biografia</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-5 rounded-lg border border-gray-200 shadow-sm">
                    <div class="flex items-center text-gray-500">
                        <UserGroupIcon class="h-5 w-5 mr-2" />
                        <span class="text-sm font-medium">Conexões</span>
                    </div>
                    <p class="text-4xl font-bold text-gray-800 my-3">{{ stats.connections.value }}</p>
                    <p class="text-xs text-green-600 font-semibold">{{ stats.connections.change }} Novos seguidores</p>
                </div>
                <div class="bg-white p-5 rounded-lg border border-gray-200 shadow-sm">
                    <div class="flex items-center text-gray-500">
                        <PencilSquareIcon class="h-5 w-5 mr-2" />
                        <span class="text-sm font-medium">Posts</span>
                    </div>
                    <p class="text-4xl font-bold text-gray-800 my-3">{{ stats.posts.value }}</p>
                    <p class="text-xs text-green-600 font-semibold">{{ stats.posts.change }} Este mês</p>
                </div>
                <div class="bg-white p-5 rounded-lg border border-gray-200 shadow-sm">
                    <div class="flex items-center text-gray-500">
                        <ArrowTrendingUpIcon class="h-5 w-5 mr-2" />
                        <span class="text-sm font-medium">Engajamento</span>
                    </div>
                    <p class="text-4xl font-bold text-gray-800 my-3">{{ stats.engagement.value }}</p>
                    <p class="text-xs text-green-600 font-semibold">{{ stats.engagement.change }} Curtidas totais</p>
                </div>
                <div class="bg-white p-5 rounded-lg border border-gray-200 shadow-sm">
                    <div class="flex items-center text-gray-500">
                        <CalendarIcon class="h-5 w-5 mr-2" />
                        <span class="text-sm font-medium">Eventos</span>
                    </div>
                    <p class="text-4xl font-bold text-gray-800 my-3">{{ stats.events.value }}</p>
                    <p class="text-xs text-green-600 font-semibold">{{ stats.events.change }} Participações</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Atividade Recente</h3>
                        <div class="space-y-6">
                            <div v-for="(activity, index) in recentActivity" :key="index">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-xs font-semibold bg-blue-100 text-primary px-2 py-0.5 rounded">{{
                                        activity.type }}</span>
                                    <span class="text-xs text-gray-400">{{ activity.time }}</span>
                                </div>
                                <p class="text-gray-600 text-sm mb-3">{{ activity.content }}</p>
                                <div class="flex items-center space-x-4 text-xs text-gray-500 font-medium">
                                    <a href="#" class="flex items-center hover:text-primary">
                                        <HeartIcon class="h-4 w-4 mr-1" /> {{ activity.likes }} Curtir
                                    </a>
                                    <a href="#" class="flex items-center hover:text-primary">
                                        <ChatBubbleOvalLeftEllipsisIcon class="h-4 w-4 mr-1" /> Comentar
                                    </a>
                                    <a href="#" class="flex items-center hover:text-primary">
                                        <ShareIcon class="h-4 w-4 mr-1" /> Compartilhar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-8">
                    <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Conexões Sugeridas</h3>
                        <div v-if="suggestedConnections.length > 0">
                        </div>
                        <div v-else class="text-center py-4">
                            <div class="mx-auto bg-gray-100 rounded-full h-16 w-16 flex items-center justify-center">
                                <UserPlusIcon class="h-8 w-8 text-gray-400" />
                            </div>
                            <p class="text-sm text-gray-500 mt-3">Nenhuma sugestão disponível. Complete seu perfil para
                                melhores sugestões.</p>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Ações Rápidas</h3>
                        <nav class="space-y-2">
                            <a href="#"
                                class="flex items-center p-2 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-lg">
                                <CalendarIcon class="h-5 w-5 mr-3 text-gray-400" /> Explorar Eventos
                            </a>
                            <a href="#"
                                class="flex items-center p-2 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-lg">
                                <MagnifyingGlassIcon class="h-5 w-5 mr-3 text-gray-400" /> Descobrir Fundadores
                            </a>
                            <a href="#"
                                class="flex items-center p-2 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-lg">
                                <EnvelopeIcon class="h-5 w-5 mr-3 text-gray-400" /> Mensagens
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
