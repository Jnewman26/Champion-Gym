<template>
    <NavbarLogin />

    <div class="mt-24 w-10/12 mx-auto max-w-sm">
        <h1 class="text-3xl font-medium mb-4">Hi, Bonnie!</h1>
        <p>Absensi menggunakan barcode pada menu dengan dumble. Scan barcode pada scaner di resepsionis Champion GYM!</p>
        <img src="https://www.codereadr.com/wp-content/uploads/2020/12/Rapid-barcode-scanning_reduced.gif" alt="" class="mt-10">
    </div>

    <BottomNavigation />
    <div class="h-24"></div>
</template>

<script setup>
import NavbarLogin from '@/Components/Organisms/NavbarLogin.vue';
import BottomNavigation from '@/Components/Organisms/BottomNavigation.vue';
</script>