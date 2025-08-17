<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>

    <Head title="Forgot Password" />

    <div class="min-h-screen flex items-center justify-center bg-gray-100 p-4">
        <div class="w-full max-w-md">
            <div class="flex flex-col items-center justify-center mb-8">
                <Link href="/">
                <img src="/assets/img/logo_fundo_bran dco.png" alt="StartupConnect" class="logo-principal w-auto">
                </Link>
                <p class="text-gray-500 mt-4 text-center">Esqueceu sua senha? Sem problemas.<br>Informe seu e-mail e
                    enviaremos um link para redefini-la.</p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-8">
                <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                    {{ status }}
                </div>

                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="email" value="Email" />
                        <TextInput id="email" v-model="form.email" type="email" class="mt-1 block w-full" required
                            autofocus autocomplete="username" />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button
                            class="w-full justify-center bg-primary text-white font-bold py-3 px-4 rounded-lg shadow-md hover:bg-opacity-90 transition-colors duration-200 disabled:opacity-50"
                            :disabled="form.processing">
                            Enviar Link de Redefinição
                        </button>
                        <Link :href="route('login')"
                            class="mt-4 underline text-sm text-gray-600 hover:text-gray-900 rounded-md">
                        Fazer login.
                        </Link>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<style>
.logo-principal {
    height: 120px;
    /* Ajuste a altura conforme necessário */
}
</style>
