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

        <div v-if="$page.props.flashs.messages" tabindex="-1" class="danger-alert md:w-2/6">
            <div class="flex flex-col items-start mb-3 mr-4 md:items-center md:flex-row md:mb-0">
                <p class="flex items-center text-sm font-normal">
                    {{ $page.props.flashs.messages }}
                </p>
            </div>
            <div class="flex items-center flex-shrink-0">
                <button>
                    <i class="fas fa-times" @click="closeBanner"></i>
                </button>
            </div>
        </div>

        <h1 class="text-xl font-medium text-slate-500 mt-14 mb-5">Presence</h1>
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5 mb-4">
                <h1 class="text-xl mb-5 font-medium">Input Presence</h1>
                <form @submit.prevent="submit">
                    <div class="grid gap-4 mb-4">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Member id
                            </label>
                            <input type="text" class="input" v-model="presence.member_id" autofocus>
                            <p class="text-rose-500 text-xs mt-1 -mb-2" v-if="errors.member_id">
                                {{ errors.member_id }}
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
                            <th>Member id</th>
                            <th>Member presence at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="presence in presences">
                            <td>{{ presence.member_id }}</td>
                            <td>{{ presence.presence_date_created }}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Member id</th>
                            <th>Member presence at</th>
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
                        Only super admin can edit presence menu!
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
        presences: Array,
        errors: Object
    },
    data() {
        return {
            presence: {
                presence_id: '',
                member_id: '',
                presence_date_created: '',
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
        '$page.props.flash.messages': {
            immediate: true,
            handler() {
                this.autoRefresh();
            },
        },
    },
    methods: {
        submit() {
            this.$inertia.post('/presence', this.presence)
        },
        autoRefresh() {
            if (this.$page.props.flash.message) {
                setTimeout(() => {
                    location.reload();
                }, 1);
            } else if (this.$page.props.flashs.messages) {
                setTimeout(() => {
                    location.reload();
                }, 4000);
            }
        },
        closeBanner() {
            this.$page.props.flashs.messages = '';
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