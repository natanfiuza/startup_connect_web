<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    profileUser: Object,
});

const userInitials = props.profileUser.name.charAt(0);
</script>

<template>

    <Head :title="profileUser.name" />

    <AppLayout>
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-lg shadow-md">
                <div class="h-40 bg-gray-200 rounded-t-lg">
                </div>
                <div class="p-6">
                    <div class="flex items-end -mt-20">
                        <div
                            class="w-28 h-28 rounded-full bg-primary text-white flex items-center justify-center text-5xl font-bold border-4 border-white">
                            {{ userInitials }}
                        </div>
                        <div class="ml-4 flex-1">
                            <h1 class="text-2xl font-bold text-gray-800">{{ profileUser.name }}</h1>
                            <p class="text-gray-500">{{ profileUser.profile?.startup_name ?? 'Nome da startup não informado' }}</p>
                        </div>
                        <button
                            class="bg-primary text-white font-semibold py-2 px-6 rounded-lg shadow-md hover:bg-opacity-90 transition-colors">
                            Conectar
                        </button>
                    </div>
                </div>
            </div>

            <div class="mt-8 bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-800 border-b pb-3">Sobre</h2>
                <p class="text-gray-600 mt-4 whitespace-pre-wrap">{{ profileUser.profile?.bio ?? 'Nenhuma biografia fornecida.' }}</p>

                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                    <div>
                        <h3 class="text-gray-400 font-semibold uppercase tracking-wider">Setor</h3>
                        <p class="text-primary font-bold">{{ profileUser.profile?.sector?.name ?? 'Não informado' }}</p>
                    </div>
                    <div>
                        <h3 class="text-gray-400 font-semibold uppercase tracking-wider">Estágio de Financiamento</h3>
                        <p class="text-gray-700 font-medium">{{ profileUser.profile?.fundingStage?.name ?? 'Não informado' }}</p>
                    </div>
                    <div class="col-span-2">
                        <h3 class="text-gray-400 font-semibold uppercase tracking-wider">Localização</h3>
                        <p class="text-gray-700 font-medium" v-if="profileUser.profile?.city">
                            {{ profileUser.profile.city }}, {{ profileUser.profile.state }} - {{
                            profileUser.profile.country }}
                        </p>
                        <p class="text-gray-500" v-else>Não informada</p>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
