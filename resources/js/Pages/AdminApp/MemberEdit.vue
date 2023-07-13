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

        <h1 class="text-xl font-medium text-slate-500 mt-14 mb-5">Member</h1>
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <form>
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="firstName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            First name
                        </label>
                        <input type="text" name="firstName" id="firstName" class="input" placeholder="John"
                            v-model="member_first.member_first_name" disabled>
                    </div>
                    <div>
                        <label for="lastName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                            name</label>
                        <input type="text" name="lastName" id="lastName" class="input" placeholder="Doe"
                            v-model="member_first.member_last_name" disabled>
                    </div>
                    <div>
                        <label for="ktp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">KTP
                            number</label>
                        <input type="number" name="ktp" id="ktp" class="input" placeholder="number of id card"
                            v-model="member_first.member_ktp" disabled>
                    </div>
                    <div>
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" class="input" placeholder="johndoe@gmail.com"
                            v-model="member_first.member_email" disabled>
                    </div>
                    <div>
                        <label for="phoneNumber" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                            number</label>
                        <input type="number" class="input" placeholder="08123456789"
                            v-model="member_first.member_phone_number" disabled>
                    </div>
                    <div>
                        <label for="membership" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Member
                            join date</label>
                        <input v-model="member_first.membership_join_date" type="text" class="input" disabled>
                    </div>
                </div>
                <div class="flex justify-end">
                    <div v-if="new Date(member_first.membership_end_date) >= new Date().setHours(0, 0, 0, 0)">
                        <button data-modal-toggle="renewalCheck" class="btn-primary" type="button">
                            <i class="fas fa-sparkles"></i> Renewal member
                        </button>
                    </div>
                    <div v-else>
                        <button data-modal-toggle="renewalMember" class="btn-primary" type="button">
                            <i class="fas fa-sparkles"></i> Renewal member
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-4">

            <div class="relative overflow-x-auto sm:rounded-lg p-5 border-8 border-white">
                <DataTable class="display">
                    <thead>
                        <tr>
                            <th>Payment status</th>
                            <th>Member status</th>
                            <th>Payment type</th>
                            <th>Personal trainer</th>
                            <th>Promotion discount</th>
                            <th>Membership join date</th>
                            <th>Membership end date</th>
                            <th>Membership type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="member in members">
                            <td>
                                <div v-if="member.sales_status == 'paid'">
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400 capitalize">
                                        {{ member.sales_status }}
                                    </span>
                                </div>
                                <div v-else>
                                    <span
                                        class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-400 border border-yellow-400 capitalize">
                                        {{ member.sales_status }}
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div
                                    v-if="member.sales_status === 'paid' && new Date(member.membership_end_date) >= new Date().setHours(0, 0, 0, 0)">
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400 capitalize me-16">
                                        active
                                    </span>
                                </div>
                                <div v-else>
                                    <div class="flex">
                                        <span
                                            class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400 capitalize">
                                            Non active
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>{{ member.payment_type }}</td>
                            <td>{{ member.personal_trainer_price }}</td>
                            <td>{{ member.promotion_discount }}</td>
                            <td>{{ member.membership_join_date }}</td>
                            <td>{{ member.membership_end_date }}</td>
                            <td>{{ member.membership_name }}</td>
                            <td>
                                <button type="button" class="btn-danger flex"
                                    v-bind:data-modal-toggle="'#deletemember-' + member.sales_id">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Payment status</th>
                            <th>Member status</th>
                            <th>Payment type</th>
                            <th>Personal trainer</th>
                            <th>Promotion discount</th>
                            <th>Membership join date</th>
                            <th>Membership end date</th>
                            <th>Membership type</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </DataTable>
            </div>
        </div>

        <!-- create member modal -->
        <div id="renewalMember" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full bg-slate-500/50">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <!-- Modal header -->
                    <div
                        class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Renewal member
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="renewalMember">
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
                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                            <div>
                                <label for="membership"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Membership</label>
                                <select v-model="selectedDuration" id="membership" class="input">
                                    <option v-for="membership in membership" :value="membership">
                                        {{ membership.membership_name }} - {{ membership.membership_duration }} month
                                    </option>
                                </select>
                                <p class="text-rose-500 text-xs mt-1 -mb-2" v-if="errors.membership_name">
                                    {{ errors.membership_name }}
                                </p>
                            </div>
                            <div>
                                <label for="promo"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Promo</label>
                                <select v-model="selectedPromotion" class="input">
                                    <option value="" selected>Tidak menggunakan promo</option>
                                    <option v-for="promotion in promotion" :value="promotion.promotion_discount">
                                        {{ promotion.promotion_name }} - Rp {{ promotion.promotion_discount }}
                                    </option>
                                </select>
                            </div>
                            <div>
                                <label for="promo"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Personal
                                    Trainer</label>
                                <select v-model="selectedPersonalTrainer" class="input">
                                    <option value="" selected>Tidak menggunakan PT</option>
                                    <option v-for="personalTrainer in personalTrainer" :value="personalTrainer">
                                        {{ personalTrainer.personal_trainer_session }} Session /
                                        {{ personalTrainer.personal_trainer_duration }} month -
                                        Rp {{ personalTrainer.personal_trainer_price }}
                                    </option>
                                </select>
                            </div>
                            <div>
                                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Start membership
                                </label>
                                <input v-model="member.member_join_date" type="date" name="date" id="date" class="input">
                                <p class="text-rose-500 text-xs mt-1 -mb-2" v-if="errors.member_join_date">
                                    {{ errors.member_join_date }}
                                </p>
                            </div>
                            <div class="col-span-2">
                                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Payment type
                                </label>
                                <select v-model="member.member_payment_type" class="input">
                                    <option value="QRIS">QRIS</option>
                                    <option value="ShopeePay">ShopeePay</option>
                                    <option value="Dana">Dana</option>
                                    <option value="Gopay">Gopay</option>
                                    <option value="Ovo">Ovo</option>
                                    <option value="Debit Card">Debit Card</option>
                                    <option value="Cerdit Card">Cerdit Card</option>
                                </select>
                                <p class="text-rose-500 text-xs mt-1 -mb-2" v-if="errors.member_payment_type">
                                    {{ errors.member_payment_type }}
                                </p>
                            </div>
                            <div class="col-span-2">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Detail sign up
                                </label>
                                <div class="grid grid-cols-2">
                                    <div class="col-span-2 md:col-span-1">
                                        <h1>Membership duration</h1>
                                        <p>{{ member.member_join_date }} - {{ calculateEndDate() }}</p>
                                    </div>
                                    <div class="col-span-2 md:col-span-1">
                                        <h1>Total transaction</h1>
                                        <p>Rp {{ calculatedAmount() }}</p>
                                    </div>
                                    <input type="hidden" name="salesTotal" ref="salesTotalInput"
                                        :value="calculatedAmount()">
                                </div>
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

        <!-- Renewal check modal -->
        <div id="renewalCheck" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full bg-slate-500/75">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 rounded-lg bg-red-100 border-red-500">
                        <h3 class="text-xl font-semibold text-red-500">
                            Cannot extend an active membership!
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="renewalCheck">
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

        <!-- delete member modal -->
        <div v-for="member_first in members" v-bind:id="'#deletemember-' + member_first.sales_id" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full bg-slate-500/50">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                        v-bind:data-modal-hide="'#deletemember-' + member_first.sales_id">
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
                            Are you sure you want to delete this member?
                        </h3>
                        <button data-modal-hide="deleteAdmin" type="button"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2"
                            @click="deleteMember(member_first.sales_id)">
                            Yes, I'm sure
                        </button>
                        <button v-bind:data-modal-hide="'#deletemember-' + member_first.sales_id" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                            cancel</button>
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

import dayjs from 'dayjs';
import 'dayjs/locale/id';

// datatable
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net';

DataTable.use(DataTablesCore);
</script>

<script>
export default {
    props: {
        members: Array,
        member_first: Array,
        membership: Array,
        promotion: Array,
        personalTrainer: Array,
        errors: Object
    },
    data() {
        return {
            member: {
                member_id: this.member_first.member_id,
                member_first_name: this.member_first.member_first_name,
                member_last_name: '',
                member_ktp: '',
                member_email: '',
                member_phone_number: '',
                member_password: '',
                membership_name: '',
                membership_price: '',
                promotion_discount: '',
                personal_trainer_price: '',
                member_join_date: '',
                member_end_date: '',
                sales_total: '',
            },
            selectedDuration: '',
            selectedPromotion: '',
            selectedPersonalTrainer: '',
            totalPurchaseAmount: 0,
        }
    },
    watch: {
        mounted() {
            this.autoRefresh();
        },
        '$page.props.flash.message': {
            immediate: true,
            handler() {
                this.autoRefresh();
            },
        },
        selectedDuration: 'updateSalesTotal',
        selectedPromotion: 'updateSalesTotal',
        selectedPromotion: 'updateMemberPromo',
        'member.member_join_date': 'updateMemberEndDate',
        selectedDuration: 'updateMemberEndDate',
        // selectedDuration(newVal) {
        //     this.updateSalesTotal();
        //     this.updateMembershipName(newVal);
        // },
        selectedDuration(newVal) {
            this.updateSalesTotal();
            this.updateMembershipName(newVal);
            this.updateMembershipPrice(newVal);
        },
        selectedPersonalTrainer: 'updatePersonalTrainerPrice',
    },
    methods: {
        updateMemberEndDate() {
            this.member.member_end_date = this.calculateEndDate();
        },
        calculateEndDate() {
            if (this.member.member_join_date && this.selectedDuration.membership_duration) {
                const startDate = new Date(this.member.member_join_date);
                const endDate = new Date(startDate.getTime());

                // Add months to the end date based on the selected duration
                endDate.setMonth(endDate.getMonth() + parseInt(this.selectedDuration.membership_duration));

                // Format the end date as 'YYYY-MM-DD'
                const formattedEndDate = endDate.toISOString().split('T')[0];
                return formattedEndDate;
            }

            return '';
        },
        updateMembershipName(newVal) {
            this.member.membership_name = newVal ? newVal.membership_name : '';
        },
        updateMembershipPrice(newVal) {
            this.member.membership_price = newVal ? newVal.membership_price : '';
        },
        updatePersonalTrainerPrice() {
            this.member.personal_trainer_price = this.selectedPersonalTrainer ? this.selectedPersonalTrainer.personal_trainer_price : '';
        },
        updateSalesTotal() {
            this.member.sales_total = this.calculatedAmount();
        },
        updateMemberPromo() {
            this.member.promotion_discount = this.selectedPromotion;
        },
        calculatedAmount() {
            let totalAmount = 0;

            if (this.selectedDuration && this.selectedDuration.membership_price) {
                totalAmount = this.selectedDuration.membership_price;
            }

            if (this.selectedPromotion && this.selectedPromotion) {
                totalAmount -= this.selectedPromotion;
            }

            if (this.selectedPersonalTrainer && this.selectedPersonalTrainer.personal_trainer_price) {
                totalAmount += this.selectedPersonalTrainer.personal_trainer_price;
            }

            return totalAmount;
        },
        submit() {
            // const joinDate = dayjs(this.member.member_join_date).format('DD-MM-YYYY');
            // const endDate = dayjs(this.member.member_end_date).format('DD-MM-YYYY');

            // // Atur properti dengan tanggal yang sudah diubah formatnya
            // this.member.member_join_date = joinDate;
            // this.member.member_end_date = endDate;

            this.member.sales_total = this.$refs.salesTotalInput.value;
            this.$inertia.post('/member-admin-renew', this.member)
        },
        autoRefresh() {
            if (this.$page.props.flash.message) {
                setTimeout(() => {
                    location.reload();
                }, 500);
            }
        },
        generateBarcodes() {
            this.members.forEach((member) => {
                JsBarcode(this.$refs[`barcode_${member.member_id}`][0], member.member_id, {
                    format: 'CODE128',
                    displayValue: true, // Ubah menjadi true
                });
            });
        },
        deleteMember(salesId) {
            this.$inertia.delete(`/member-admin-delete/${salesId}`)
                .then(() => {
                    // Tindakan setelah penghapusan berhasil dilakukan
                })
                .catch((error) => {
                    // Tangani kesalahan jika ada
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