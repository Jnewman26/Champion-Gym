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
                        <tr>
                            <td>
                                <h1>John Doe</h1>
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded border border-green-400">
                                    Active
                                </span>
                            </td>
                            <td>J20230201_member</td>
                            <td>2906837457645</td>
                            <td>johndoe@gmail.com</td>
                            <td>09123456789</td>
                            <td>2023-02-26</td>
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
                <form action="#">
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="firstName"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
                            <input type="text" name="firstName" id="firstName" class="input" placeholder="John" required>
                        </div>
                        <div>
                            <label for="lastName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                                name</label>
                            <input type="text" name="lastName" id="lastName" class="input" placeholder="Doe" required>
                        </div>
                        <div class="col-span-2">
                            <label for="ktp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">KTP
                                number</label>
                            <input type="number" name="ktp" id="ktp" class="input" placeholder="number of id card" required>
                        </div>
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email" class="input" placeholder="johndoe@gmail.com"
                                required>
                        </div>
                        <div>
                            <label for="phoneNumber"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone number</label>
                            <input type="number" name="phoneNumber" id="phoneNumber" class="input" placeholder="08123456789"
                                required>
                        </div>
                        <div>
                            <label for="membership"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Membership</label>
                            <select v-model="selectedDuration" id="membership" class="input">
                                <option selected>Select membership</option>
                                <option v-for="packageItem in packages" :value="packageItem">{{ packageItem.name }}</option>
                            </select>
                        </div>
                        <div>
                            <label for="promo"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Promo</label>
                            <select id="promo"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected>Select category</option>
                                <option value="TV">TV/Monitors</option>
                                <option value="PC">PC</option>
                                <option value="GA">Gaming/Console</option>
                                <option value="PH">Phones</option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start
                                membership</label>
                            <input v-model="member.MEMBER_JOIN_DATE" type="date" name="date" id="date" class="input"
                                required>
                        </div>
                        <div class="col-span-2">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Detail sign up</label>
                            <div class="grid grid-cols-2">
                                <div class="col-span-2 md:col-span-1">
                                    <h1>Membership duration</h1>
                                    <p>{{ member.MEMBER_JOIN_DATE }} - {{ calculateEndDate() }}</p>
                                </div>
                                <div class="col-span-2 md:col-span-1">
                                    <h1>Total transaction</h1>
                                    <p>{{ selectedDuration.price }}</p>
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

    <!-- member detail modal -->
    <div id="detailMember" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full bg-slate-500/50">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto overflow-y-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Detail member
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="detailMember">
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
                <div class="flex flex-col items-center justify-center my-2">
                    <a href="#"
                        class="block max-w-sm p-0 bg-gradient-to-r from-rose-500 from-30% via- black via-60% to-rose-500 rounded-lg shadow mb-2">
                        <div class="grid grid-cols-2">
                            <div class="flex items-end">
                                <div>
                                    <h1 class="ms-4 mb-2 text-xl text-white font-medium">John Doe</h1>
                                    <img src="@/Assets/Images/barcode/barcode.png" alt="" class="ms-4 mb-4 w-46 h-20">
                                </div>
                            </div>
                            <div class="relative">
                                <img src="@/Assets/Images/Illustration/muscle.png" alt="" class="">
                                <img src="@/Assets/Images/Logo/logo-white.png" alt="" class="w-14 absolute right-4 top-4">
                            </div>
                        </div>
                    </a>
                </div>

                <form action="#">
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="firstName"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
                            <input type="text" name="firstName" id="firstName" class="input" placeholder="John" required>
                        </div>
                        <div>
                            <label for="lastName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                                name</label>
                            <input type="text" name="lastName" id="lastName" class="input" placeholder="Doe" required>
                        </div>
                        <div class="col-span-2">
                            <label for="ktp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">KTP
                                number</label>
                            <input type="number" name="ktp" id="ktp" class="input" placeholder="number of id card" required>
                        </div>
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email" class="input" placeholder="johndoe@gmail.com"
                                required>
                        </div>
                        <div>
                            <label for="phoneNumber"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone number</label>
                            <input type="number" name="phoneNumber" id="phoneNumber" class="input" placeholder="08123456789"
                                required>
                        </div>
                        <div>
                            <label for="membership"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Membership</label>
                            <select v-model="selectedDuration" id="membership" class="input">
                                <option selected>Select membership</option>
                                <option v-for="packageItem in packages" :value="packageItem">{{ packageItem.name }}</option>
                            </select>
                        </div>
                        <div>
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Membership
                                duration</label>
                            <div class="col-span-2 md:col-span-1">
                                <p>{{ member.MEMBER_JOIN_DATE }} - {{ calculateEndDate() }}</p>
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

// datatable
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net';

DataTable.use(DataTablesCore);
</script>

<script>
export default {
    props: {
        packages: Array
    },
    data() {
        return {
            member: {
                MEMBER_JOIN_DATE: '',
            },
            selectedDuration: ''
        }
    },
    methods: {
        calculateEndDate() {
            if (this.member.MEMBER_JOIN_DATE && this.selectedDuration.duration) {
                const startDate = new Date(this.member.MEMBER_JOIN_DATE);
                const endDate = new Date(startDate.getTime());

                // Add months to the end date based on the selected duration
                endDate.setMonth(endDate.getMonth() + parseInt(this.selectedDuration.duration));

                // Format the end date as 'YYYY-MM-DD'
                const formattedEndDate = endDate.toISOString().split('T')[0];
                return formattedEndDate;
            }

            return '';
        }
    }
}
</script>

<style>
@import 'datatables.net-dt';
</style>