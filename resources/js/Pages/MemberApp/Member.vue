<template>
    <NavbarLogin />

    <div class="flex items-center h-screen bg-white">
        <div class="z-0" v-for="member in members">
            <div
                class="block w-10/12 mx-auto p-0 bg-gradient-to-r from-rose-500 from-30% via- black via-60% to-rose-500 rounded-lg shadow mb-2">
                <div class="grid grid-cols-2">
                    <div class="flex items-end">
                        <div>
                            <h1 class="ms-4 mb-2 text-lg text-white font-medium">{{ member.member_first_name }} {{
                                member.member_last_name }}</h1>
                            <img src="@/Assets/Images/barcode/barcode.png" alt="" class="ms-4 mb-4 w-46 h-20">
                        </div>
                    </div>
                    <div class="relative">
                        <img src="@/Assets/Images/Illustration/muscle.png" alt="" class="">
                        <img src="@/Assets/Images/Logo/logo-white.png" alt="" class="w-14 absolute right-4 top-4">
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <div>
                    <svg class="w-80" :ref="`barcode_${member.member_id}`"></svg>
                    <button data-modal-target="defaultModal" v-bind:data-modal-toggle="'#defaultModal-' + member.member_id" class="btn-primary" type="button">
                        Zoom barcode
                    </button>

                    <!-- Main modal -->
                    <div v-bind:id="'#defaultModal-' + member.member_id" tabindex="-1" aria-hidden="true"
                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full bg-slate-800/75">
                        <div class="relative w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                    <svg class="w-80" :ref="`barcodes_${member.member_id}`"></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <BottomNavigation />
</template>

<script setup>
import NavbarLogin from '@/Components/Organisms/NavbarLogin.vue';
import BottomNavigation from '@/Components/Organisms/BottomNavigation.vue';
</script>

<script>
import Qrcode from 'qrcode.vue'
export default {
    props: {
        members: Array,
    },
    mounted() {
        this.generateBarcodes();
        this.generateBarcode();
    },
    methods: {
        generateBarcodes() {
            this.members.forEach((member) => {
                JsBarcode(this.$refs[`barcode_${member.member_id}`][0], member.member_id, {
                    format: 'CODE128',
                    displayValue: true, // Ubah menjadi true
                });
            });
        },
        generateBarcode() {
            this.members.forEach((member) => {
                JsBarcode(this.$refs[`barcodes_${member.member_id}`][0], member.member_id, {
                    format: 'CODE128',
                    displayValue: true, // Ubah menjadi true
                });
            });
        },
    }
}
</script>