<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
    users: Object,
    sectors: Array,
    fundingStages: Array,
    filters: Object,
});

const form = useForm({
    sector_id: props.filters.sector_id || '',
    funding_stage_id: props.filters.funding_stage_id || '',
    location: props.filters.location || '',
});

const submit = () => {
    form.get(route('discover'), {
        preserveState: true,
        replace: true,
    });
};
</script>

<template>

    <Head title="Descobrir" />

    <AppLayout>
        <div class="max-w-7xl mx-auto space-y-6">
            <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
                <h1 class="text-2xl font-bold text-gray-800">Descobrir Fundadores</h1>
                <p class="text-gray-500 mt-1">Encontre e conecte-se com outros membros da comunidade.</p>

                <form @submit.prevent="submit" class="mt-4 grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                    <div>
                        <label for="sector" class="block text-sm font-medium text-gray-700">Setor</label>
                        <select v-model="form.sector_id" id="sector"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="">Todos</option>
                            <option v-for="sector in sectors" :key="sector.id" :value="sector.id">{{ sector.name }}
                            </option>
                        </select>
                    </div>
                    <div>
                        <label for="funding_stage" class="block text-sm font-medium text-gray-700">Estágio</label>
                        <select v-model="form.funding_stage_id" id="funding_stage"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="">Todos</option>
                            <option v-for="stage in fundingStages" :key="stage.id" :value="stage.id">{{ stage.name }}
                            </option>
                        </select>
                    </div>
                    <div class="md:col-span-1">
                        <label for="location" class="block text-sm font-medium text-gray-700">Localização</label>
                        <input v-model="form.location" type="text" id="location" placeholder="Cidade, Estado ou País"
                            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                    </div>
                    <button type="submit"
                        class="bg-primary text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-opacity-90 transition-colors h-10">
                        Pesquisar
                    </button>
                </form>
            </div>

            <div v-if="users.data.length > 0"
                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <Link v-for="user in users.data" :key="user.id" :href="route('profile.show', user.id)"
                    class="bg-white p-4 rounded-lg border border-gray-200 shadow-sm text-center hover:shadow-lg hover:border-primary transition-all">
                <div
                    class="w-20 h-20 rounded-full bg-primary text-white flex items-center justify-center text-3xl font-bold mx-auto">
                    {{ user.name.charAt(0) }}
                </div>
                <h3 class="mt-4 font-bold text-gray-800">{{ user.name }}</h3>
                <p class="text-sm text-gray-500">{{ user.profile.startup_name }}</p>
                <span class="mt-2 inline-block text-xs font-semibold bg-blue-100 text-primary px-2 py-0.5 rounded">{{
                    user.profile.sector.name }}</span>
                </Link>
            </div>
            <div v-else class="text-center bg-white p-10 rounded-lg border border-gray-200 shadow-sm">
                <p class="text-gray-500">Nenhum resultado encontrado. Tente ajustar seus filtros.</p>
            </div>

            <div v-if="users.links.length > 3" class="mt-6 flex justify-center">
                <div class="flex rounded-md shadow-sm">
                    <Link v-for="(link, index) in users.links" :key="index" :href="link.url" v-html="link.label"
                        class="px-4 py-2 text-sm font-medium border" :class="{
                            'bg-primary text-white': link.active,
                            'text-gray-700 bg-white hover:bg-gray-50': !link.active,
                            'rounded-l-md': index === 0,
                            'rounded-r-md': index === users.links.length - 1
                        }" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
