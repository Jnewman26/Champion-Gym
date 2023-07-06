<template>
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-10 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-3 font-medium text-slate-600">
                <span class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded border border-red-400">
                    {{ admin_role }}
                </span>
                <li>
                    <a href="/dashboard" class="flex items-center p-2 rounded-lg hover:bg-gray-100"
                        :class="{ active: activePage === 'dashboard' }">
                        <i class="fas fa-chart-pie"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/notification-admin" class="flex items-center p-2 rounded-lg hover:bg-gray-100"
                        :class="{ active: activePage === 'notification-admin' }">
                        <i class="fas fa-bell"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Notification</span>
                        <span
                            class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-rose-800 bg-rose-100 rounded-full">1</span>
                    </a>
                </li>
                <li>
                    <a href="/member-admin" class="flex items-center p-2 rounded-lg hover:bg-gray-100"
                        :class="{ active: activePage === 'member-admin' }">
                        <i class="fa-solid fa-dumbbell"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Member</span>
                    </a>
                </li>
                <li>
                    <a href="/personal-trainer" class="flex items-center p-2 rounded-lg hover:bg-gray-100"
                        :class="{ active: activePage === 'personal-trainer' }">
                        <i class="fa-solid fa-person"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Personal Trainer</span>
                    </a>
                </li>
                <li>
                    <a href="/membership-admin" class="flex items-center p-2 rounded-lg hover:bg-gray-100"
                        :class="{ active: activePage === 'membership-admin' }">
                        <i class="fa-solid fa-layer-group"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Membership</span>
                    </a>
                </li>
                <li>
                    <a href="/promotion" class="flex items-center p-2 rounded-lg hover:bg-gray-100"
                        :class="{ active: activePage === 'promotion' }">
                        <i class="fa-solid fa-badge-percent"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Promotion</span>
                    </a>
                </li>
                <div v-if="admin_role == 'super admin'">
                    <li>
                        <a href="/admin" class="flex items-center p-2 rounded-lg hover:bg-gray-100"
                            :class="{ active: activePage === 'admin' }">
                            <i class="fa-solid fa-user-tie-hair-long"></i>
                            <span class="flex-1 ml-3 whitespace-nowrap">Admin</span>
                        </a>
                    </li>
                </div>
                <div v-else>
                    <li>
                        <a data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                            class="flex items-center p-2 rounded-lg hover:bg-gray-100 cursor-pointer"
                            :class="{ active: activePage === 'admin' }">
                            <i class="fa-solid fa-user-tie-hair-long"></i>
                            <span class="flex-1 ml-3 whitespace-nowrap">Admin</span>
                        </a>
                    </li>
                </div>
                <li>
                    <a href="/bookkeeping" class="flex items-center p-2 rounded-lg hover:bg-gray-100"
                        :class="{ active: activePage === 'bookkeeping' }">
                        <i class="fa-solid fa-receipt"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Bookkeeping</span>
                    </a>
                </li>
                <li>
                    <a href="/contact-admin" class="flex items-center p-2 rounded-lg hover:bg-gray-100"
                        :class="{ active: activePage === 'contact-admin' }">
                        <i class="fa-solid fa-address-book"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Contact</span>
                    </a>
                </li>
                <li>
                    <a href="/spending" class="flex items-center p-2 rounded-lg hover:bg-gray-100"
                        :class="{ active: activePage === 'spending' }">
                        <i class="fa-solid fa-rupiah-sign"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Spending</span>
                    </a>
                </li>
            </ul>
            <div id="dropdown-cta" class="p-4 mt-6 rounded-lg bg-blue-50 dark:bg-blue-900" role="alert">
                <div class="flex items-center mb-3">
                    <span
                        class="bg-orange-100 text-orange-800 text-sm font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-orange-200 dark:text-orange-900">How
                        to use</span>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-900 rounded-lg focus:ring-2 focus:ring-blue-400 p-1 hover:bg-blue-200 inline-flex h-6 w-6 dark:bg-blue-900 dark:text-blue-400 dark:hover:bg-blue-800"
                        data-dismiss-target="#dropdown-cta" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <p class="mb-3 text-sm text-blue-800 dark:text-blue-400">
                    See the guide book below if you have any trouble of using this application! You can download the guide
                    book by press the link.
                </p>
                <a class="text-sm text-blue-800 underline font-medium hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300"
                    href="#">Download guide book</a>
            </div>
        </div>
    </aside>

    <!-- Main modal -->
    <div id="defaultModal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full bg-slate-500/75">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 rounded-lg bg-red-100 border-red-500">
                    <h3 class="text-xl font-semibold text-red-500">
                        Only super admin can access this menu!
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
import { Link } from '@inertiajs/vue3'
import { computed } from 'vue'

const activePage = computed(() => {
    return window.location.pathname.split('/')[1]
})
</script>

<script>
export default {
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