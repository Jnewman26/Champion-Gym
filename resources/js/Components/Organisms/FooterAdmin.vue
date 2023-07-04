<template>
    <div class="relative h-96">
        <footer class="absolute w-full bottom-0 bg-white rounded-lg shadow my-4">
            <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <a href="/dashboard" class="flex items-center mb-4 sm:mb-0">
                        <img src="@/Assets/Images/Logo/logo.jpg" class="h-10 mr-3" alt="Champion Logo" />
                    </a>
                    <ul
                        class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                        <li>
                            <a href="/dashboard" class="mr-4 hover:underline md:mr-6 ">Dashboard</a>
                        </li>
                        <li>
                            <a href="/notification-admin" class="mr-4 hover:underline md:mr-6">Notification</a>
                        </li>
                        <li>
                            <a href="/member" class="mr-4 hover:underline md:mr-6 ">Member</a>
                        </li>
                        <li>
                            <a href="/promotion" class="hover:underline">Promotion</a>
                        </li>
                    </ul>
                </div>
                <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a
                        href="https://flowbite.com/" class="hover:underline">Flowbite™</a>. All Rights Reserved.</span>
            </div>
        </footer>
    </div>
</template>