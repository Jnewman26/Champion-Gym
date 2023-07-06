<template>
    <Navbar />
    <Sidebar />

    <DashboardLayout>
        <h1 class="text-xl font-medium text-slate-500 mt-14 mb-5">Spending</h1>
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <form @submit.prevent="update">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Spending name
                        </label>
                        <input type="text" class="input" v-model="form.spending_name">
                        <p class="text-rose-500 text-xs mt-1 -mb-2" v-if="errors.spending_name">
                            {{ errors.spending_name }}
                        </p>
                    </div>
                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Spending total
                        </label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                Rp
                            </span>
                            <input type="number"
                                class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                v-model="form.spending_total">
                        </div>
                        <p class="text-rose-500 text-xs mt-1 -mb-2" v-if="errors.spending_total">
                            {{ errors.spending_total }}
                        </p>
                    </div>
                    <div class="col-span-2">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Spending description
                        </label>
                        <textarea type="text" class="input" v-model="form.spending_description" />
                        <p class="text-rose-500 text-xs mt-1 -mb-2" v-if="errors.spending_description">
                            {{ errors.spending_description }}
                        </p>
                    </div>
                </div>
                <div class="flex justify-between">
                    <button type="button" class="btn-danger flex"
                        v-bind:data-modal-toggle="'#deletespending-' + form.spending_id">
                        Delete
                    </button>
                    <button type="submit" class="btn-primary flex">
                        Update
                    </button>
                </div>
            </form>
        </div>

        <!-- delete spending modal -->
        <div v-bind:id="'#deletespending-' + spendings.spending_id" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full bg-slate-500/50">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                        v-bind:data-modal-hide="'#deletespending-' + spendings.spending_id">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                            Are you sure you want to delete this spending?
                        </h3>
                        <button data-modal-hide="deleteAdmin" type="button"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2"
                            @click="deleteSpending">
                            Yes, I'm sure
                        </button>
                        <button v-bind:data-modal-hide="'#deletespending-' + spendings.spending_id" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            No, cancel
                        </button>
                    </div>
                </div>
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
</script>

<script>
export default {
    props: {
        spendings: Object,
        errors: Object
    },
    data() {
        return {
            form: {
                spending_id: this.spendings.spending_id,
                spending_name: this.spendings.spending_name,
                spending_total: this.spendings.spending_total,
                spending_description: this.spendings.spending_description,
            }
        }
    },
    methods: {
        update() {
            this.$inertia.put('/spending-edit/' + this.spendings.spending_id, this.form)
        },
        deleteSpending() {
            this.$inertia.delete(`/spending-delete/${this.spendings.spending_id}`)
        },
    }
}
</script>