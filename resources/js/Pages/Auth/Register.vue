<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>

    <Head title="Register" />

    <div class="min-h-screen flex items-center justify-center bg-gray-100 p-4">
        <div class="w-full max-w-md">
            <div class="flex flex-col items-center justify-center mb-8">
                <Link href="/">
                <img src="/assets/img/logo_fundo_branco.png" alt="StartupConnect" class="logo-principal w-auto">
                </Link>
                <p class="text-gray-500 mt-4">Bem-vindo de volta! Acesse sua conta.</p>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-8">
                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="name" value="Nome Completo" />
                        <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-full" required
                            autofocus autocomplete="name" />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="email" value="Email" />
                        <TextInput id="email" v-model="form.email" type="email" class="mt-1 block w-full" required
                            autocomplete="username" />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="password" value="Senha" />
                        <TextInput id="password" v-model="form.password" type="password" class="mt-1 block w-full"
                            required autocomplete="new-password" />
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="password_confirmation" value="Confirmar Senha" />
                        <TextInput id="password_confirmation" v-model="form.password_confirmation" type="password"
                            class="mt-1 block w-full" required autocomplete="new-password" />
                        <InputError class="mt-2" :message="form.errors.password_confirmation" />
                    </div>

                    <div class="flex flex-col items-center mt-6">
                        <button
                            class="w-full justify-center bg-primary text-white font-bold py-3 px-4 rounded-lg shadow-md hover:bg-opacity-90 transition-colors duration-200 disabled:opacity-50"
                            :disabled="form.processing">
                            Cadastrar
                        </button>

                        <Link :href="route('login')"
                            class="mt-4 underline text-sm text-gray-600 hover:text-gray-900 rounded-md">
                        Já possui uma conta?
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
