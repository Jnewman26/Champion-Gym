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

        <h1 class="text-xl font-medium text-slate-500 mt-14 mb-5">Admin</h1>
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5">
                <div class="mb-5">
                    <div class="mb-5">
                        <button data-modal-toggle="createAdmin" class="btn-primary" type="button">
                            <i class="fas fa-plus"></i> Admin
                        </button>
                    </div>
                </div>
                <DataTable class="display">
                    <thead>
                        <tr>
                            <th>Admin name</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="admin in admins">
                            <td>{{ admin.admin_name }}</td>
                            <td>{{ admin.admin_role }}</td>
                            <td>
                                <a :href="`/admin-edit/${admin.admin_id}/edit`" class="btn-primary ms-2">
                                    <i class="fa-solid fa-list-ol"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Admin name</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </DataTable>
            </div>
        </div>
        <FooterAdmin />
    </DashboardLayout>

    <!-- create admin modal -->
    <div id="createAdmin" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full bg-slate-500/50">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Add admin
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="createAdmin">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form @submit.prevent="submit">
                    <div class="grid gap-4 mb-4 sm:grid-cols-1">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Admin
                                name</label>
                            <input type="text" name="name" id="name" class="input" v-model="admin.admin_name">
                        </div>
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Admin role
                            </label>
                            <select id="promo" class="input" v-model="admin.admin_role">
                                <option selected>Select role</option>
                                <option value="admin">Admin</option>
                                <option value="super admin">Super Admin</option>
                            </select>
                        </div>
                        <div>
                            <label for="price"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="price" id="price" class="input" v-model="admin.admin_password">
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
        admins: Array,
        errors: Object
    },
    mounted() {
        this.autoRefresh();
    },
    watch: {
        '$page.props.flash.message': {
            immediate: true,
            handler() {
                this.autoRefresh();
            },
        },
    },
    data() {
        return {
            selectedAdminsId: null,
            admin: {
                admin_name: '',
                admin_role: '',
                admin_password: '',
            },
        }
    },
    methods: {
        submit() {
            this.$inertia.post('/admin', this.admin)
        },
        closeBanner() {
            this.$page.props.flash.message = '';
        },
        deleteadmin() {
            this.$inertia.delete(`/admin-delete/${this.admins.admin_id}`)
        },
        autoRefresh() {
            if (this.$page.props.flash.message) {
                setTimeout(() => {
                    location.reload();
                }, 500);
            }
        },
    }
}
</script>

<style>
@import 'datatables.net-dt';
</style>