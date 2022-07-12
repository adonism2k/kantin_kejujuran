<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetCheckbox from '@/Jetstream/Checkbox.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue';

const form = useForm({
    student_id: '',
    username: '',
    name: '',
    email: '',
    phone: '',
    street: '',
    city: '',
    state: '',
    zip: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>

    <Head title="Register" />

    <JetAuthenticationCard size="3xl">
        <template #header>
            <JetAuthenticationCardLogo />
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Register a new account</h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Or you
                {{ ' ' }}
                <Link :href="route('login')" class="font-medium text-indigo-600 hover:text-indigo-500 underline">already registered?</Link>
            </p>
        </template>

        <JetValidationErrors class="mb-4" />

        <form @submit.prevent="submit" class="grid grid-cols-12 gap-6">
            <div class="col-span-12">
                <JetLabel for="name" value="Name" />
                <JetInput id="name" v-model="form.name" type="text" class="mt-1 block w-full" required
                    autocomplete="name" />
            </div>

            <div class="col-span-12 lg:col-span-6">
                <JetLabel for="student_id" value="Student ID" />
                <JetInput id="student_id" v-model="form.student_id" type="number" class="mt-1 block w-full" required
                    autofocus autocomplete="student_id" />
            </div>

            <div class="col-span-12 lg:col-span-6">
                <JetLabel for="username" value="Username" />
                <JetInput id="username" v-model="form.username" type="text" class="mt-1 block w-full" required
                    autocomplete="username" />
            </div>

            <div class="col-span-12 lg:col-span-6">
                <JetLabel for="email" value="Email Address" />
                <JetInput id="email" v-model="form.email" type="email" class="mt-1 block w-full" required
                    autocomplete="email" />
            </div>

            <div class="col-span-12 lg:col-span-6">
                <JetLabel for="phone" value="Phone Number" />
                <JetInput id="phone" v-model="form.phone" type="number" class="mt-1 block w-full" required
                    autocomplete="tel" />
            </div>

            <div class="col-span-12">
                <JetLabel for="street" value="Street Address" />
                <JetInput id="street" v-model="form.street" type="text" class="mt-1 block w-full" required
                    autocomplete="street-address" />
            </div>

            <div class="col-span-12 lg:col-span-4">
                <JetLabel for="city" value="City" />
                <JetInput id="city" v-model="form.city" type="text" class="mt-1 block w-full" required
                    autocomplete="city" />
            </div>

            <div class="col-span-12 lg:col-span-4">
                <JetLabel for="state" value="State" />
                <JetInput id="state" v-model="form.state" type="text" class="mt-1 block w-full" required
                    autocomplete="state" />
            </div>

            <div class="col-span-12 lg:col-span-4">
                <JetLabel for="zip" value="Zip Code" />
                <JetInput id="zip" v-model="form.zip" type="number" class="mt-1 block w-full" required
                    autocomplete="postal-code" />
            </div>

            <div class="col-span-12 lg:col-span-6">
                <JetLabel for="password" value="Password" />
                <JetInput id="password" v-model="form.password" type="password" class="mt-1 block w-full" required
                    autocomplete="new-password" />
            </div>

            <div class="col-span-12 lg:col-span-6">
                <JetLabel for="password_confirmation" value="Confirm Password" />
                <JetInput id="password_confirmation" v-model="form.password_confirmation" type="password"
                    class="mt-1 block w-full" required autocomplete="new-password" />
            </div>

            <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="col-span-12">
                <JetLabel for="terms">
                    <div class="flex items-center">
                        <JetCheckbox id="terms" v-model:checked="form.terms" name="terms" />

                        <div class="ml-2">
                            I agree to the <a target="_blank" :href="route('terms.show')"
                                class="underline text-sm text-gray-600 hover:text-gray-900">Terms of Service</a> and <a
                                target="_blank" :href="route('policy.show')"
                                class="underline text-sm text-gray-600 hover:text-gray-900">Privacy Policy</a>
                        </div>
                    </div>
                </JetLabel>
            </div>

            <div class="flex items-center justify-end col-span-12">
                <JetButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </JetButton>
            </div>
        </form>
    </JetAuthenticationCard>
</template>
