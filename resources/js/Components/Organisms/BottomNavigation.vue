<template>
    <div
        class="fixed z-50 w-10/12 h-16 max-w-lg -translate-x-1/2 bg-white border border-gray-200 rounded-full bottom-4 left-1/2 dark:bg-gray-700 dark:border-gray-600">
        <div class="grid h-full max-w-lg grid-cols-5 mx-auto">
            <a href="/home" data-tooltip-target="tooltip-home" type="button"
                class="inline-flex flex-col items-center justify-center px-5 rounded-l-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <i class="fad fa-house text-slate-500 text-xl" :class="{ activeBottom: activePage === 'home' }"></i>
                <div v-if="activePage === 'home'" class="p-0.5 bg-rose-500 rounded-full -mb-1"></div>
            </a>
            <div id="tooltip-home" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Home
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <a href="/calendar" data-tooltip-target="tooltip-wallet" type="button"
                class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <i class="fa-duotone fa-calendar-days text-slate-500 text-xl" :class="{ activeBottom: activePage === 'calendar' }"></i>
                <div v-if="activePage === 'calendar'" class="p-0.5 bg-rose-500 rounded-full -mb-1"></div>
            </a>
            <div id="tooltip-wallet" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Calendar
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <div class="flex items-center justify-center">
                <a href="/member" data-tooltip-target="tooltip-new" type="button"
                    class="inline-flex items-center justify-center w-10 h-10 font-medium bg-rose-500 rounded-full hover:bg-rose-600 group focus:ring-4 focus:ring-blue-300 focus:outline-none">
                    <i class="fas fa-dumbbell text-white"></i>
                </a>
            </div>
            <div id="tooltip-new" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Member
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <a href="/membership-member" data-tooltip-target="tooltip-settings" type="button"
                class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <i class="fad fa-bag-shopping text-slate-500 text-2xl" :class="{ activeBottom: activePage === 'membership' }"></i>
                <div v-if="activePage === 'membership'" class="p-0.5 bg-rose-500 rounded-full -mb-1"></div>
            </a>
            <div id="tooltip-settings" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Membership
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <a href="/profile" data-tooltip-target="tooltip-profile" type="button"
                class="inline-flex flex-col items-center justify-center px-5 rounded-r-full hover:bg-gray-50 dark:hover:bg-gray-800 group text-slate-500">
                <i class="fad fa-user text-xl" :class="{ activeBottom: activePage === 'profile' }"></i>
                <div v-if="activePage === 'profile'" class="p-0.5 bg-rose-500 rounded-full -mb-1"></div>
            </a>
            <div id="tooltip-profile" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Profile
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed } from 'vue'

const activePage = computed(() => {
    return window.location.pathname.split('/')[1]
})
</script>