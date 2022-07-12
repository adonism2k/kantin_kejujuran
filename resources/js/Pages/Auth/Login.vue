<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetCheckbox from '@/Jetstream/Checkbox.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    student_id: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>

    <Head title="Log in" />

    <JetAuthenticationCard>
        <template #header>
            <div>
                <JetAuthenticationCardLogo />
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Sign in to your account</h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Or you can
                    {{ ' ' }}
                    <Link :href="route('register')" class="font-medium text-indigo-600 hover:text-indigo-500 underline">
                    create a
                    new account here!</Link>
                </p>
            </div>
        </template>

        <JetValidationErrors class="mb-4" />

        <div v-if="status" id="toast-top-right"
            class="absolute flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x divide-gray-200 rounded-lg shadow top-5 right-5 dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
            role="alert">
            <div class="text-sm font-normal">{{ status }}</div>
        </div>

        <form @submit.prevent="submit" class="grid grid-cols-3 gap-6">
            <div class="col-span-3">
                <JetLabel for="student_id" value="Student ID" />
                <JetInput id="student_id" v-model="form.student_id" type="number" class="mt-1 block w-full" required
                    autofocus autocomplete="student_id" />
            </div>

            <div class="col-span-3">
                <JetLabel for="password" value="Password" />
                <JetInput id="password" v-model="form.password" type="password" class="mt-1 block w-full" required
                    autocomplete="current-password" />
            </div>

            <div class="flex justify-between items-center col-span-3">
                <label class="flex justify-between items-center">
                    <JetCheckbox v-model:checked="form.remember" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
                <Link v-if="canResetPassword" :href="route('password.request')"
                    class="underline text-sm text-gray-600 hover:text-gray-900">
                Forgot your password?
                </Link>
            </div>

            <div class="flex items-center justify-end col-span-3">
                <JetButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </JetButton>
            </div>
        </form>
    </JetAuthenticationCard>
</template>
