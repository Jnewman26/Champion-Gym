<template>
    <Navbar />
    <Sidebar />

    <DashboardLayout>
        <h1 class="text-xl font-medium text-slate-500 mt-14 mb-5">Member</h1>
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-5">
                <div class="mb-5">
                    <div class="mb-5">
                        <button data-modal-toggle="createMember" class="btn-primary" type="button">
                            <i class="fas fa-plus"></i> Member
                        </button>
                        <button data-modal-toggle="createMember" class="btn-primary ms-2" type="button">
                            <i class="fas fa-sparkles"></i> Renewal member
                        </button>
                    </div>
                </div>
                <DataTable class="display">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Member id</th>
                            <th>KTP number</th>
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>Join date</th>
                            <th>Exp date</th>
                            <th>Membership type</th>
                            <th>Renewal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="member in members">
                            <td>
                                <h1>{{ member.member_first_name }}</h1>
                                <h1 class="hidden">{{ member.member_id }}</h1>
                            </td>
                            <td>
                                <svg class="w-80" :ref="`barcode_${member.member_id}`"></svg>
                            </td>
                            <td>{{ member.member_ktp }}</td>
                            <td>{{ member.member_email }}</td>
                            <td>{{ member.member_phone_number }}</td>
                            <td>{{ member.member_join_date }}</td>
                            <td>2023-03-26</td>
                            <td>Basic</td>
                            <td>0</td>
                            <td>
                                <button class="btn-primary ms-2" data-modal-toggle="detailMember" type="button">
                                    <i class="fa-duotone fa-id-card"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Member id</th>
                            <th>KTP number</th>
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>Join date</th>
                            <th>Exp date</th>
                            <th>Membership type</th>
                            <th>Renewal</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </DataTable>
            </div>
        </div>
        <FooterAdmin />
    </DashboardLayout>

    <!-- create member modal -->
    <div id="createMember" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full bg-slate-500/50">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Add member
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="createMember">
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
                            <label for="firstName"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
                            <input type="text" name="firstName" id="firstName" class="input" placeholder="John"
                                v-model="member.member_first_name">
                        </div>
                        <div>
                            <label for="lastName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                                name</label>
                            <input type="text" name="lastName" id="lastName" class="input" placeholder="Doe"
                                v-model="member.member_last_name">
                        </div>
                        <div>
                            <label for="ktp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">KTP
                                number</label>
                            <input type="number" name="ktp" id="ktp" class="input" placeholder="number of id card"
                                v-model="member.member_ktp">
                        </div>
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email" class="input" placeholder="johndoe@gmail.com"
                                v-model="member.member_email">
                        </div>
                        <div>
                            <label for="phoneNumber"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone number</label>
                            <input type="number" name="phoneNumber" id="phoneNumber" class="input" placeholder="08123456789"
                                v-model="member.member_phone_number">
                        </div>
                        <div>
                            <label for="membership"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Membership</label>
                            <select v-model="selectedDuration" id="membership" class="input">
                                <option v-for="membership in membership" :value="membership">
                                    {{ membership.membership_name }} - {{ membership.membership_duration }} month
                                </option>
                            </select>
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
                            <label for="promo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Personal
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
                        </div>
                        <div>
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
                        </div>
                        <div class="col-span-2">
                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Password
                            </label>
                            <input type="password" class="input" v-model="member.member_password">
                        </div>
                        <div class="col-span-2">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Detail sign up</label>
                            <div class="grid grid-cols-2">
                                <div class="col-span-2 md:col-span-1">
                                    <h1>Membership duration</h1>
                                    <p>{{ member.member_join_date }} - {{ calculateEndDate() }}</p>
                                </div>
                                <div class="col-span-2 md:col-span-1">
                                    <h1>Total transaction</h1>
                                    <p>Rp {{ calculatedAmount() }}</p>
                                </div>
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
</template>

<script setup>
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import Navbar from '@/Components/Organisms/Navbar.vue';
import Sidebar from '@/Components/Organisms/Sidebar.vue';
import FooterAdmin from '@/Components/Organisms/FooterAdmin.vue';
import JsBarcode from 'jsbarcode';

// datatable
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net';

DataTable.use(DataTablesCore);
</script>

<script>
import Qrcode from 'qrcode.vue'
export default {
    props: {
        members: Array,
        membership: Array,
        promotion: Array,
        personalTrainer: Array
    },
    mounted() {
        this.generateBarcodes();
    },
    data() {
        return {
            member: {
                member_first_name: '',
                member_last_name: '',
                member_ktp: '',
                member_email: '',
                member_phone_number: '',
                member_password: '',
                membership_name: '',
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
        selectedDuration(newVal) {
            this.updateSalesTotal();
            this.updateMembershipName(newVal);
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
            this.$inertia.post('/member-admin', this.member)
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
    }
}
</script>

<style>
@import 'datatables.net-dt';
</style>