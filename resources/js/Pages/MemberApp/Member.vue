<template>
    <NavbarLogin />

    <div class="flex items-center h-screen bg-white">
        <div class="z-0">
            <div
                class="block w-10/12 mx-auto p-0 bg-gradient-to-r from-rose-500 from-30% via- black via-60% to-rose-500 rounded-lg shadow mb-2">
                <div class="grid grid-cols-2">
                    <div class="flex items-end">
                        <div>
                            <h1 class="ms-4 mb-2 text-xl text-white font-medium">John Doe</h1>
                            <img src="@/Assets/Images/barcode/barcode.png" alt="" class="ms-4 mb-4 w-46 h-20">
                        </div>
                    </div>
                    <div class="relative">
                        <img src="@/Assets/Images/Illustration/muscle.png" alt="" class="">
                        <img src="@/Assets/Images/Logo/logo-white.png" alt="" class="w-14 absolute right-4 top-4">
                    </div>
                </div>
            </div>
            <img src="@/Assets/Images/barcode/barcode.png" alt="" class="mx-auto w-10/12 h-28 mt-10">
        </div>
    </div>

    <BottomNavigation />
</template>

<script setup>
import NavbarLogin from '@/Components/Organisms/NavbarLogin.vue';
import BottomNavigation from '@/Components/Organisms/BottomNavigation.vue';
</script>