<template>
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                        type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="/dashboard" class="flex ml-2">
                        <img src="@/Assets/Images/Logo/logo-title.png" class="h-8 mr-3" alt="Champion Logo" />
                    </a>
                    <!-- <span
                        class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">Admin</span> -->
                </div>
                <div class="flex items-center">

                    <div class="flex items-center ml-3">

                        <button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification"
                            class="inline-flex items-center text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none dark:hover:text-white dark:text-gray-400"
                            type="button">
                            <i class="fas fa-bell text-slate-500 text-lg"></i>
                            <div class="relative flex">
                                <div
                                    class="relative inline-flex w-3 h-3 bg-red-500 border-2 border-white rounded-full -top-2 right-2">
                                </div>
                            </div>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNotification"
                            class="z-20 hidden w-full max-w-sm bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-800 dark:divide-gray-700"
                            aria-labelledby="dropdownNotificationButton">
                            <div
                                class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50 dark:bg-gray-800 dark:text-white">
                                Notifications
                            </div>
                            <div class="divide-y divide-gray-100 dark:divide-gray-700">
                                <a href="#" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <div class="flex-shrink-0">
                                        <img class="rounded-full w-11 h-11" src="/docs/images/people/profile-picture-1.jpg"
                                            alt="Jese image">
                                        <div
                                            class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-blue-600 border border-white rounded-full dark:border-gray-800">
                                            <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                                                </path>
                                                <path
                                                    d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="w-full pl-3">
                                        <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">New message from <span
                                                class="font-semibold text-gray-900 dark:text-white">Jese Leos</span>: "Hey,
                                            what's up? All set for the presentation?"</div>
                                        <div class="text-xs text-blue-600 dark:text-blue-500">a few moments ago</div>
                                    </div>
                                </a>
                                <a href="#" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <div class="flex-shrink-0">
                                        <img class="rounded-full w-11 h-11" src="/docs/images/people/profile-picture-2.jpg"
                                            alt="Joseph image">
                                        <div
                                            class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-gray-900 border border-white rounded-full dark:border-gray-800">
                                            <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="w-full pl-3">
                                        <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span
                                                class="font-semibold text-gray-900 dark:text-white">Joseph Mcfall</span> and
                                            <span class="font-medium text-gray-900 dark:text-white">5 others</span> started
                                            following you.
                                        </div>
                                        <div class="text-xs text-blue-600 dark:text-blue-500">10 minutes ago</div>
                                    </div>
                                </a>
                                <a href="#" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <div class="flex-shrink-0">
                                        <img class="rounded-full w-11 h-11" src="/docs/images/people/profile-picture-3.jpg"
                                            alt="Bonnie image">
                                        <div
                                            class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-red-600 border border-white rounded-full dark:border-gray-800">
                                            <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="w-full pl-3">
                                        <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span
                                                class="font-semibold text-gray-900 dark:text-white">Bonnie Green</span> and
                                            <span class="font-medium text-gray-900 dark:text-white">141 others</span> love
                                            your
                                            story. See it and view more stories.
                                        </div>
                                        <div class="text-xs text-blue-600 dark:text-blue-500">44 minutes ago</div>
                                    </div>
                                </a>
                                <a href="#" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <div class="flex-shrink-0">
                                        <img class="rounded-full w-11 h-11" src="/docs/images/people/profile-picture-4.jpg"
                                            alt="Leslie image">
                                        <div
                                            class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-green-400 border border-white rounded-full dark:border-gray-800">
                                            <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="w-full pl-3">
                                        <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span
                                                class="font-semibold text-gray-900 dark:text-white">Leslie Livingston</span>
                                            mentioned you in a comment: <span class="font-medium text-blue-500"
                                                href="#">@bonnie.green</span> what do you say?</div>
                                        <div class="text-xs text-blue-600 dark:text-blue-500">1 hour ago</div>
                                    </div>
                                </a>
                                <a href="#" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <div class="flex-shrink-0">
                                        <img class="rounded-full w-11 h-11" src="/docs/images/people/profile-picture-5.jpg"
                                            alt="Robert image">
                                        <div
                                            class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-purple-500 border border-white rounded-full dark:border-gray-800">
                                            <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="w-full pl-3">
                                        <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span
                                                class="font-semibold text-gray-900 dark:text-white">Robert Brown</span>
                                            posted a
                                            new video: Glassmorphism - learn how to implement the new design trend.</div>
                                        <div class="text-xs text-blue-600 dark:text-blue-500">3 hours ago</div>
                                    </div>
                                </a>
                            </div>
                            <a href="#"
                                class="block py-2 text-sm font-medium text-center text-gray-900 rounded-b-lg bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white">
                                <div class="inline-flex items-center ">
                                    <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                        <path fill-rule="evenodd"
                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    View all
                                </div>
                            </a>
                        </div>

                        <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName"
                            class="flex items-center text-sm font-medium text-gray-900 rounded-full hover:text-blue-600 dark:hover:text-blue-500 md:mr-0 focus:ring-4 focus:ring-gray-100"
                            type="button">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 mr-2 bg-rose-500 rounded-full"
                                src="@/Assets/Images/Illustration/profile-1.png" alt="user photo">
                            {{ admin_name }}
                            <svg class="w-4 h-4 mx-1.5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownAvatarName"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                                <div class="font-medium ">{{ admin_role }}</div>
                                <div class="truncate">{{ admin_name }}</div>
                            </div>
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                                <li>
                                    <a href="/dashboard"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                </li>
                                <li>
                                    <a href="/member"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Member</a>
                                </li>
                                <li>
                                    <a href="/spending"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Spending</a>
                                </li>
                            </ul>
                            <div class="py-2">
                                <Link href="/logout" method="post"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    Sign out
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
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