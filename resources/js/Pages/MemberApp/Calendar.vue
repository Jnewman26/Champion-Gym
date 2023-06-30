<template>
    <NavbarLogin />

    <div class="mt-24 grid grid-cols-1 gap-8">
        <card>
            <div
                class="rounded-t-lg bg-rose-500 w-10/12 mx-auto max-w-sm border border-gray-200 shadow p-3 text-center font-medium text-white">
                2023
            </div>
            <div class="w-10/12 mx-auto max-w-sm bg-white border border-gray-200 rounded-b-lg shadow p-5">
                <div class="grid grid-cols-3 gap-4">
                    <div class="flex h-20 w-full bg-emerald-500 text-white  text-xs rounded-lg justify-center items-center">
                        <div>
                            <p class="font-medium text-sm text-center">20 Feb</p>
                            <p>2023-07-01</p>
                        </div>
                    </div>

                    <div class="flex h-20 w-full bg-emerald-500 text-white  text-xs rounded-lg justify-center items-center">
                        <div>
                            <p class="font-medium text-sm text-center">20 Feb</p>
                            <p>2023-07-01</p>
                        </div>
                    </div>

                    <div class="flex h-20 w-full bg-emerald-500 text-white  text-xs rounded-lg justify-center items-center">
                        <div>
                            <p class="font-medium text-sm text-center">20 Feb</p>
                            <p>2023-07-01</p>
                        </div>
                    </div>

                    <div class="flex h-20 w-full bg-emerald-500 text-white  text-xs rounded-lg justify-center items-center">
                        <div>
                            <p class="font-medium text-sm text-center">20 Feb</p>
                            <p>2023-07-01</p>
                        </div>
                    </div>
                </div>
            </div>
        </card>
    </div>

    <BottomNavigation />
</template>

<script setup>
import NavbarLogin from '@/Components/Organisms/NavbarLogin.vue';
import BottomNavigation from '@/Components/Organisms/BottomNavigation.vue';
</script>