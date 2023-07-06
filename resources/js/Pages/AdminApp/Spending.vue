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

        <h1 class="text-xl font-medium text-slate-500 mt-14 mb-5">Spending</h1>
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5 mb-4">
                <h1 class="text-xl mb-5 font-medium">Input Spending</h1>
                <form @submit.prevent="submit">
                    <div class="grid md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Spending name
                            </label>
                            <input type="text" class="input" v-model="spending.spending_name">
                            <p class="text-rose-500 text-xs mt-1 -mb-2" v-if="errors.spending_name">
                                {{ errors.spending_name }}
                            </p>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Spending total
                            </label>
                            <div class="flex">
                                <span
                                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                    Rp
                                </span>
                                <input type="number"
                                    class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="" v-model="spending.spending_total">
                            </div>
                            <p class="text-rose-500 text-xs mt-1 -mb-2" v-if="errors.spending_total">
                                {{ errors.spending_total }}
                            </p>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Speding Description
                            </label>
                            <textarea class="input" v-model="spending.spending_description"></textarea>
                            <p class="text-rose-500 text-xs mt-1 -mb-2" v-if="errors.spending_description">
                                {{ errors.spending_description }}
                            </p>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="btn-primary flex">
                            Submit
                        </button>
                    </div>
                </form>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5">
                <DataTable class="display">
                    <thead>
                        <tr>
                            <th>Spending name</th>
                            <th>Spending total</th>
                            <th>Spending description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="spending in spendings">
                            <td>{{ spending.spending_name }}</td>
                            <td>Rp {{ spending.spending_total }}</td>
                            <td>{{ spending.spending_description }}</td>
                            <td>
                                <div v-if="admin_role == 'super admin'">
                                    <a :href="`/spending-edit/${spending.spending_id}/edit`" class="btn-primary ms-2"
                                        data-modal-toggle="detailPackage" type="button">
                                        <i class="fa-duotone fa-pen-to-square"></i>
                                    </a>
                                </div>
                                <div v-else>
                                    <a data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                                        class="btn-primary ms-2" type="button">
                                        <i class="fa-duotone fa-pen-to-square"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Spending name</th>
                            <th>Spending total</th>
                            <th>Spending description</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </DataTable>
            </div>
        </div>
        <FooterAdmin />
    </DashboardLayout>

    <!-- Main modal -->
    <div id="defaultModal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full bg-slate-500/75">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 rounded-lg bg-red-100 border-red-500">
                    <h3 class="text-xl font-semibold text-red-500">
                        Only super admin can edit spending menu!
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="defaultModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
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
        spendings: Array,
        errors: Object
    },
    data() {
        return {
            spending: {
                spending_name: '',
                spending_total: '',
                spending_description: '',
            },
        }
    },
    watch: {
        '$page.props.flash.message': {
            immediate: true,
            handler() {
                this.autoRefresh();
            },
        },
    },
    methods: {
        submit() {
            this.$inertia.post('/spending', this.spending)
        },
        autoRefresh() {
            if (this.$page.props.flash.message) {
                setTimeout(() => {
                    location.reload();
                }, 500);
            }
        },
    },
    computed: {
        auth() {
            return this.$page.props.auth;
        },
        admin_id() {
            return this.auth ? this.auth.admin_id : null;
        },
        admin_name() {
            return this.auth ? this.auth.admin_name : null;
        },
        admin_role() {
            return this.auth ? this.auth.admin_role : null;
        }
    },
}
</script>

<style>
@import 'datatables.net-dt';
</style>