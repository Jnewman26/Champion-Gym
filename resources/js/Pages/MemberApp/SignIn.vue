<template>
    <NavbarLogout />
    <div class="flex justify-center items-center h-screen">
        <div
            class="w-10/12 md:w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="space-y-6" action="#">
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">Sign in to member</h5>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        email</label>
                    <input type="text" class="input">
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        password</label>
                    <input type="password" class="input">
                </div>
                <div class="flex items-start hidden">
                    <input id="remember" type="checkbox" value=""
                        class="w-4 h-4 border border-gray-300"
                        required checked disabled>
                </div>
                <button type="submit" class="w-full btn-primary">Login
                    to your account</button>
            </form>
        </div>
    </div>
    <Footer />
</template>

<script setup>
import NavbarLogout from '@/Components/Organisms/NavbarLogout.vue';
import Footer from '@/Components/Organisms/Footer.vue';
</script>