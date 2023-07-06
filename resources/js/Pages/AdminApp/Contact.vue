<template>
    <Navbar />
    <Sidebar />

    <DashboardLayout>
        <div v-if="$page.props.flash.message" tabindex="-1" class="success-alert">
            <div class="flex flex-col items-start mb-3 mr-4 md:items-center md:flex-row md:mb-0">
                <p class="flex items-center text-sm font-normal">
                    {{ $page.props.flash.message }}
                </p>
            </div>
            <div class="flex items-center flex-shrink-0">
                <button>
                    <i class="fas fa-times" @click="closeBanner"></i>
                </button>
            </div>
        </div>

        <h1 class="text-xl font-medium text-slate-500 mt-14 mb-5">Contact</h1>
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5">
                <h1 class="text-xl mb-5 font-medium">Contact & Social Media</h1>
                <form @submit.prevent="update">
                    <div class="grid gap-4 mb-4 md:grid-cols-3" v-for="contact in contacts">
                        <input type="hidden" class="input" v-model="contact.contact_id">
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">WhatsApp</label>
                            <input type="number" class="input" v-model="contact.whatsapp">
                            <!-- <p class="text-rose-500 text-xs mt-1 -mb-2" v-if="errors.whatsapp">
                                {{ errors.whatsapp }}
                            </p> -->
                        </div>
                        <div>
                            <label for="price"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instagram</label>
                            <input type="text" class="input" v-model="contact.instagram">
                            <!-- <p class="text-rose-500 text-xs mt-1 -mb-2" v-if="errors.instagram">
                                {{ errors.instagram }}
                            </p> -->
                        </div>
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Facebook</label>
                            <input type="text" class="input" v-model="contact.facebook">
                            <!-- <p class="text-rose-500 text-xs mt-1 -mb-2" v-if="errors.facebook">
                                {{ errors.facebook }}
                            </p> -->
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="btn-primary flex">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <FooterAdmin />
    </DashboardLayout>
</template>

<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import Navbar from '@/Components/Organisms/Navbar.vue';
import Sidebar from '@/Components/Organisms/Sidebar.vue';
import FooterAdmin from '@/Components/Organisms/FooterAdmin.vue';

// datatable
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net';

DataTable.use(DataTablesCore);
</script>

<script>
export default {
    props: {
        contacts: Array
    },
    methods: {
        update() {
            // Mengirimkan permintaan pembaruan untuk setiap objek kontak
            this.contacts.forEach(contact => {
                const url = `/contact-admin/${contact.contact_id}`;
                this.$inertia.put(url, contact);
            });
        },
        closeBanner() {
            this.$page.props.flash.message = '';
        },
    }
}
</script>

<style>
@import 'datatables.net-dt';
</style>