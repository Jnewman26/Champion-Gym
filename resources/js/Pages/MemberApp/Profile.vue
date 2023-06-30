<template>
    <NavbarLogin />

    <div class="mt-24 grid grid-cols-1 gap-8">
        <div class="w-10/12 mx-auto max-w-sm bg-white border border-gray-200 rounded-lg shadow">
            <div class="flex flex-col items-center p-10">
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg border-2 border-rose-500"
                    src="@/Assets/Images/Illustration/profile-1.png" />
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Bonnie Green</h5>
                <span class="text-sm text-gray-500">Basic member</span>

                <hr class="w-4 h-1 my-2 mx-auto bg-gray-200 border-0 rounded dark:bg-gray-700">

                <span class="text-sm text-gray-500">Membership duration</span>
                <span class="text-sm text-gray-500 font-medium">
                    2023-06-30 - 2023-07-30
                </span>
            </div>
        </div>


        <div class="w-10/12 mx-auto max-w-sm text-gray-900 bg-white border border-gray-200 rounded-lg shadow">
            <a href="" type="button"
                class="relative inline-flex items-center w-full px-4 py-3 text-sm font-medium border-b border-gray-200 rounded-t-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                <i class="fa-duotone fa-user-pen me-2"></i>
                Edit Profile
            </a>
            <a href="" type="button"
                class="relative inline-flex items-center w-full px-4 py-3 text-sm font-medium border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                <i class="fa-duotone fa-phone me-2"></i>
                Contact
            </a>
            <a href="" type="button"
                class="relative inline-flex items-center w-full px-4 py-3 text-sm font-medium border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                <i class="fa-duotone fa-code-compare me-2"></i>
                App Version
            </a>
        </div>

    </div>

    <BottomNavigation />
</template>

<script setup>
import NavbarLogin from '@/Components/Organisms/NavbarLogin.vue';
import BottomNavigation from '@/Components/Organisms/BottomNavigation.vue';
</script>