<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { ChartBarIcon } from '@heroicons/vue/24/solid'; // Usando o ícone do logo

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>

    <Head title="Log in" />

    <div class="min-h-screen flex items-center justify-center bg-gray-100 p-4">
        <div class="w-full max-w-md">
            <div class="flex flex-col items-center justify-center mb-8">
                <Link href="/">
                <img src="/assets/img/logo_fundo_branco.png" alt="StartupConnect"  class="logo-principal w-auto">
                </Link>
                <p class="text-gray-500 mt-4">Bem-vindo de volta! Acesse sua conta.</p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-8">
                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="email" value="Email" />
                        <TextInput id="email" v-model="form.email" type="email" class="mt-1 block w-full" required
                            autofocus autocomplete="username" />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="password" value="Senha" />
                        <TextInput id="password" v-model="form.password" type="password" class="mt-1 block w-full"
                            required autocomplete="current-password" />
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <div class="block mt-4 flex justify-between items-center">
                        <label class="flex items-center">
                            <Checkbox v-model:checked="form.remember" name="remember" />
                            <span class="ms-2 text-sm text-gray-600">Lembrar-me</span>
                        </label>

                        <Link v-if="canResetPassword" :href="route('password.request')"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Esqueceu sua senha?
                        </Link>
                    </div>

                    <div class="flex flex-col items-center mt-6">
                        <button
                            class="w-full justify-center bg-primary text-white font-bold py-3 px-4 rounded-lg shadow-md hover:bg-opacity-90 transition-colors duration-200 disabled:opacity-50"
                            :disabled="form.processing">
                            Entrar
                        </button>

                        <Link :href="route('register')"
                            class="mt-4 underline text-sm text-gray-600 hover:text-gray-900">
                        Não tem uma conta? Cadastre-se
                        </Link>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<style>
.logo-principal {
    height: 120px; /* Ajuste a altura conforme necessário */
}

</style>
