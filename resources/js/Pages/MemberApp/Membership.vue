<template>
    <NavbarLogin />

    <div class="w-10/12 mx-auto mt-24 grid grid-cols-1 gap-8">

        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">Basic Package</h5>
            <div class="flex items-baseline text-gray-900 dark:text-white">
                <span class="text-2xl font-semibold">Rp</span>
                <span class="text-4xl font-extrabold tracking-tight ms-2">175.000</span>
                <span class="ml-1 text-xl font-normal text-gray-500 dark:text-gray-400">/month</span>
            </div>
            <!-- List -->
            <ul role="list" class="space-y-5 my-7">
                <li class="flex space-x-3">
                    <!-- Icon -->
                    <i class="fas fa-circle-check text-blue-500"></i>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">2 team members</span>
                </li>
                <li class="flex space-x-3">
                    <!-- Icon -->
                    <i class="fas fa-circle-check text-blue-500"></i>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">20GB Cloud
                        storage</span>
                </li>
                <li class="flex space-x-3">
                    <!-- Icon -->
                    <i class="fas fa-circle-check text-blue-500"></i>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Integration
                        help</span>
                </li>
                <li class="flex space-x-3 line-through decoration-gray-500">
                    <!-- Icon -->
                    <i class="fa-duotone fa-circle-check text-gray-500"></i>
                    <span class="text-base font-normal leading-tight text-gray-500">Sketch Files</span>
                </li>
                <li class="flex space-x-3 line-through decoration-gray-500">
                    <!-- Icon -->
                    <i class="fa-duotone fa-circle-check text-gray-500"></i>
                    <span class="text-base font-normal leading-tight text-gray-500">API Access</span>
                </li>
                <li class="flex space-x-3 line-through decoration-gray-500">
                    <!-- Icon -->
                    <i class="fa-duotone fa-circle-check text-gray-500"></i>
                    <span class="text-base font-normal leading-tight text-gray-500">Complete documentation</span>
                </li>
                <li class="flex space-x-3 line-through decoration-gray-500">
                    <!-- Icon -->
                    <i class="fa-duotone fa-circle-check text-gray-500"></i>
                    <span class="text-base font-normal leading-tight text-gray-500">24×7 phone & email support</span>
                </li>
            </ul>
            <button type="button"
                class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Choose
                plan</button>
        </div>

        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">Basic Package</h5>
            <div class="flex items-baseline text-gray-900 dark:text-white">
                <span class="text-2xl font-semibold">Rp</span>
                <span class="text-4xl font-extrabold tracking-tight ms-2">175.000</span>
                <span class="ml-1 text-xl font-normal text-gray-500 dark:text-gray-400">/month</span>
            </div>
            <!-- List -->
            <ul role="list" class="space-y-5 my-7">
                <li class="flex space-x-3">
                    <!-- Icon -->
                    <i class="fas fa-circle-check text-blue-500"></i>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">2 team members</span>
                </li>
                <li class="flex space-x-3">
                    <!-- Icon -->
                    <i class="fas fa-circle-check text-blue-500"></i>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">20GB Cloud
                        storage</span>
                </li>
                <li class="flex space-x-3">
                    <!-- Icon -->
                    <i class="fas fa-circle-check text-blue-500"></i>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400">Integration
                        help</span>
                </li>
                <li class="flex space-x-3 line-through decoration-gray-500">
                    <!-- Icon -->
                    <i class="fa-duotone fa-circle-check text-gray-500"></i>
                    <span class="text-base font-normal leading-tight text-gray-500">Sketch Files</span>
                </li>
                <li class="flex space-x-3 line-through decoration-gray-500">
                    <!-- Icon -->
                    <i class="fa-duotone fa-circle-check text-gray-500"></i>
                    <span class="text-base font-normal leading-tight text-gray-500">API Access</span>
                </li>
                <li class="flex space-x-3 line-through decoration-gray-500">
                    <!-- Icon -->
                    <i class="fa-duotone fa-circle-check text-gray-500"></i>
                    <span class="text-base font-normal leading-tight text-gray-500">Complete documentation</span>
                </li>
                <li class="flex space-x-3 line-through decoration-gray-500">
                    <!-- Icon -->
                    <i class="fa-duotone fa-circle-check text-gray-500"></i>
                    <span class="text-base font-normal leading-tight text-gray-500">24×7 phone & email support</span>
                </li>
            </ul>
            <button type="button"
                class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">Choose
                plan</button>
        </div>
    </div>

    <BottomNavigation />

    <div class="h-24"></div>
</template>

<script setup>
import NavbarLogin from '@/Components/Organisms/NavbarLogin.vue';
import BottomNavigation from '@/Components/Organisms/BottomNavigation.vue';
</script>