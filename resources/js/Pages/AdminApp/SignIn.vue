<template>
    <NavbarLogout />

    <div class="flex justify-center">
        <div v-if="form.errors.FAILED" id="alert-2"
            class="fixed z-50 top-20 md:top-24 flex p-4 mb-4 text-red-500 rounded-lg bg-red-100" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
                <div v-text="form.errors.FAILED"></div>
            </div>
        </div>
    </div>
    <div class="flex justify-center items-center h-screen">
        <div
            class="w-10/12 md:w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="space-y-6" @submit.prevent="submit">
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">Sign in to admin</h5>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" class="input" v-model="form.admin_name">
                    <p class="text-rose-500 text-xs mt-1" v-if="form.errors.admin_name">
                        {{ form.errors.admin_name }}
                    </p>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Your password
                    </label>
                    <input type="password" class="input" v-model="form.admin_password">
                    <p class="text-rose-500 text-xs mt-1" v-if="form.errors.admin_password">
                        {{ form.errors.admin_password }}
                    </p>
                </div>
                <div class="flex items-start mb-6 hidden">
                    <div class="flex items-center h-5">
                        <input v-model="form.remember" type="checkbox" value="" class="hidden">
                    </div>
                </div>
                <button type="submit" class="w-full btn-primary">
                    Login to your account
                </button>
            </form>
        </div>
    </div>
    <Footer />
</template>

<script setup>
import { onMounted, watch } from 'vue';
import { useForm } from '@inertiajs/vue3';

import NavbarLogout from '@/Components/Organisms/NavbarLogout.vue';
import Footer from '@/Components/Organisms/Footer.vue';

let form = useForm({
    admin_name: '',
    admin_password: '',
});

let submit = () => {
    form.post('/signin-admin')
};

// onMounted(() => {
//     if (localStorage.getItem('admin_name') && localStorage.getItem('admin_password')) {
//         form.admin_name = localStorage.getItem('admin_name');
//         form.admin_password = localStorage.getItem('admin_password');
//         form.remember = true;
//     }
// });

// watch(() => form.remember, (newValue) => {
//     if (!newValue) {
//         localStorage.removeItem('admin_name');
//         localStorage.removeItem('admin_password');
//     }
// });
</script>