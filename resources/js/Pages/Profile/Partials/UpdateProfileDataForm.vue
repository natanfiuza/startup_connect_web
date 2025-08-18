<script setup>
import { useForm, usePage } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextArea from '@/Components/TextArea.vue'; // Vamos precisar criar este componente

const user = usePage().props.auth.user;
const shared = usePage().props.shared;

const form = useForm({
    _method: 'PUT',
    startup_name: user.profile?.startup_name,
    sector_id: user.profile?.sector_id,
    funding_stage_id: user.profile?.funding_stage_id,
    country: user.profile?.country,
    state: user.profile?.state,
    city: user.profile?.city,
    bio: user.profile?.bio,
});

const updateProfileData = () => {
    form.post(route('user-profile-information.update'), {
        errorBag: 'updateProfileData',
        preserveScroll: true,
    });
};
</script>

<template>
    <FormSection @submitted="updateProfileData">
        <template #title>
            Informações do Perfil da Startup
        </template>

        <template #description>
            Complete as informações da sua startup para aumentar suas chances de conexão.
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="startup_name" value="Nome da Startup" />
                <TextInput id="startup_name" v-model="form.startup_name" type="text" class="mt-1 block w-full" />
                <InputError :message="form.errors.startup_name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="sector" value="Setor" />
                <select v-model="form.sector_id" id="sector_id">
                    <option v-for="sector in shared.sectors" :key="sector.id" :value="sector.id">{{ sector.name }}
                    </option>
                </select>
                <InputError :message="form.errors.sector" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="funding_stage" value="Estágio de Financiamento" />
                <select v-model="form.funding_stage_id" id="funding_stage"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option v-for="stage in shared.fundingStages" :key="stage.id" :value="stage.id">{{ stage.name }}
                    </option>
                </select>
                <InputError :message="form.errors.funding_stage_id" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 grid grid-cols-3 gap-4">
                <div>
                    <InputLabel for="country" value="País" />
                    <TextInput id="country" v-model="form.country" type="text" class="mt-1 block w-full" />
                </div>
                <div>
                    <InputLabel for="state" value="Estado" />
                    <TextInput id="state" v-model="form.state" type="text" class="mt-1 block w-full" />
                </div>
                <div>
                    <InputLabel for="city" value="Cidade" />
                    <TextInput id="city" v-model="form.city" type="text" class="mt-1 block w-full" />
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="bio" value="Bio / Resumo da Startup" />
                <!-- <textarea v-model="form.bio" id="bio" rows="4"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea> -->
                <TextArea id="bio" v-model="form.bio" rows="4"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                <InputError :message="form.errors.bio" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="me-3">
                Salvo.
            </ActionMessage>

            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Salvar
            </PrimaryButton>
        </template>
    </FormSection>
</template>
