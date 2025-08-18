<script setup>
import { Link } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import {
    ChartBarIcon,
    HomeIcon,
    MagnifyingGlassIcon,
    ChatBubbleLeftRightIcon,
    CalendarIcon,
    PencilSquareIcon,
    UserIcon,
    SparklesIcon,
    StarIcon,
} from '@heroicons/vue/24/outline';


// Acessa as propriedades da página (incluindo dados do usuário)
const page = usePage();

// Cria uma variável reativa para o usuário logado
const user = computed(() => page.props.auth.user);

// Cria uma variável reativa para as iniciais do nome do usuário
const userInitials = computed(() => {
    if (user.value && user.value.name) {
        return user.value.name.charAt(0).toUpperCase();
    }
    return '';
});

const stats = {
    connections: 127,
    thisMonth: 23,
};
</script>

<template>
    <div class="flex bg-gray-50 min-h-screen">
        <aside class="w-72 bg-white h-screen sticky top-0 flex flex-col border-r border-gray-200">
            <div class="px-8 py-6">
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-primary rounded-lg text-white">
                        <img src="/assets/img/logo.svg" class="h-6 w-6" />
                    </div>
                    <h1 class="text-xl font-bold text-gray-800">StartupConnect</h1>
                </div>
                <p class="text-sm text-gray-500 mt-1">Conecte. Cresça. Prospere.</p>
            </div>

            <nav class="flex-1 px-6 py-4">
                <h2 class="px-2 mb-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Navegação</h2>
                <Link :href="route('dashboard')"
                    class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors duration-200"
                    :class="{ 'bg-primary text-white': route().current('dashboard'), 'text-gray-700 hover:bg-gray-100': !route().current('dashboard') }">
                <HomeIcon class="h-5 w-5 mr-3" />
                Dashboard
                </Link>
                <Link :href="route('discover')"
                    class="mt-1 flex items-center px-4 py-2.5 text-sm font-medium rounded-lg transition-colors duration-200"
                    :class="{ 'bg-primary text-white': route().current('discover'), 'text-gray-700 hover:bg-gray-100': !route().current('discover') }">
                <MagnifyingGlassIcon class="h-5 w-5 mr-3" />
                Descobrir
                </Link>
                <a href="#"
                    class="mt-1 flex items-center px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg">
                    <ChatBubbleLeftRightIcon class="h-5 w-5 mr-3" />
                    Mensagens
                </a>
                <a href="#"
                    class="mt-1 flex items-center px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg">
                    <CalendarIcon class="h-5 w-5 mr-3" />
                    Eventos
                </a>
                <a href="#"
                    class="mt-1 flex items-center px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg">
                    <PencilSquareIcon class="h-5 w-5 mr-3" />
                    Posts
                </a>
                <a href="#"
                    class="mt-1 flex items-center px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg">
                    <UserIcon class="h-5 w-5 mr-3" />
                    Perfil
                </a>
            </nav>

            <div class="px-6 py-4">
                <h2 class="px-2 mb-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Estatísticas</h2>
                <div class="flex items-center text-sm text-gray-600 px-2">
                    <SparklesIcon class="h-5 w-5 mr-2 text-green-500" />
                    Conexões
                    <span class="ml-auto font-semibold">{{ stats.connections }}</span>
                </div>
                <div class="flex items-center text-sm text-gray-600 px-2 mt-2">
                    <StarIcon class="h-5 w-5 mr-2 text-yellow-500" />
                    Este Mês
                    <span class="ml-auto font-semibold text-green-600">+{{ stats.thisMonth }}</span>
                </div>
            </div>

            <div class="border-t border-gray-200 p-6">
                <div class="flex items-center">
                    <div
                        class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center font-bold">
                        {{ userInitials }}
                    </div>
                    <div class="ml-3">
                        <Link :href="route('profile.show', $page.props.auth.user.id)"
                            class="block hover:bg-gray-50 transition-colors">
                        <p class="text-sm font-semibold text-gray-800">{{ user.name }}</p>
                        </Link>
                        <p class="text-xs text-gray-500">{{ user.email }}</p>
                    </div>
                    <Link :href="route('logout')" method="post" as="button"
                        class="ml-4 text-gray-400 hover:text-primary transition-colors" title="Sair">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    </Link>
                </div>
            </div>
        </aside>

        <main class="flex-1 p-8">
            <slot />
        </main>
    </div>
</template>
