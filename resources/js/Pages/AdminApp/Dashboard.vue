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

        <h1 class="text-xl font-medium text-slate-500 mt-14 mb-5">Dashboard</h1>
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">

                <a href="#"
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl md:text-4xl font-extrabold">73M+
                    </dt>
                    <dd class="font-light text-gray-500 dark:text-gray-400">active member
                        <strong>/month</strong>
                    </dd>
                </a>

                <a href="#"
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl md:text-4xl font-extrabold">73M+
                    </dt>
                    <dd class="font-light text-gray-500 dark:text-gray-400">non active member
                        <strong>/month</strong>
                    </dd>
                </a>

                <a href="#"
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl md:text-4xl font-extrabold">73M+</dt>
                    <dd class="font-light text-gray-500 dark:text-gray-400">new member
                        <strong>/month</strong>
                    </dd>
                </a>

                <a href="#"
                    class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl md:text-4xl font-extrabold">73M+</dt>
                    <dd class="font-light text-gray-500 dark:text-gray-400">visit member
                        <strong>/month</strong>
                    </dd>
                </a>

                <a href="#"
                    class="block md:col-span-2 p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex flex-col items-center justify-center">
                    <dt class="mb-2 text-3xl md:text-4xl font-extrabold">73M+</dt>
                    <dd class="font-light text-gray-500 dark:text-gray-400">total profit
                        <strong>/month</strong>
                    </dd>
                </a>

            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div class="flex items-center justify-center rounded bg-gray-50 h-56">
                    <Bar :data="chartData" class="w-full" />
                </div>
                <div class="flex items-center justify-center rounded bg-gray-50 h-56">
                    <Bar :data="chartData" class="w-full" />
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
import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

export default {
    name: 'BarChart',
    components: { Bar },
    props: {
        pages: Object,
        // Chart
        salesDatesAllBranch: Array,
        totalSalesDataAllBranch: Array,
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
    watch: {
        '$page.props.flash.message': {
            immediate: true,
            handler() {
                this.autoRefresh();
            },
        },
    },
    methods: {
        autoRefresh() {
            if (this.$page.props.flash.message) {
                setTimeout(() => {
                    location.reload();
                }, 1000);
            }
        },
    },
    components: { Navbar },
    data() {
        return {
            chartData: {
                chartOptions: {
                    responsive: true
                },
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [
                    {
                        data: [40, 20, 12, 35, 42, 50, 60, 55, 48, 30, 22, 15],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)',
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                        ],
                        borderWidth: 1,
                    }
                ]
            }
        }
    }
}
</script>