<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>

<template>
    <AppLayout title="Business Profile">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Business Profile
            </h2>
        </template>
        <div class="resource">
            <nav class="sidebar">
                <ul class="px-6 py-6">
                    <li class="nav-item">
                        <ul class="text-sm space-y-1 -mx-3 text-gray-700">
                            <li>
                                <a href=""
                                    class="flex items-center justify-center gap-3 px-3 py-2 rounded-lg font-medium transition bg-primary-500 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M2 5a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm14 1a1 1 0 11-2 0 1 1 0 012 0zM2 13a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2zm14 1a1 1 0 11-2 0 1 1 0 012 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <div class="flex flex-1">
                                        <span>
                                            Adapters
                                        </span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <ul class="text-sm space-y-1 -mx-3 text-gray-700">
                            <li>
                                <a href=""
                                    class="flex items-center justify-center gap-3 px-3 py-2 rounded-lg font-medium transition bg-primary-500 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M2 5a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm14 1a1 1 0 11-2 0 1 1 0 012 0zM2 13a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2zm14 1a1 1 0 11-2 0 1 1 0 012 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <div class="flex flex-1">
                                        <span>
                                            Services
                                        </span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <ul class="text-sm space-y-1 -mx-3 text-gray-700">
                            <li>
                                <a href=""
                                    class="flex items-center justify-center gap-3 px-3 py-2 rounded-lg font-medium transition bg-primary-500 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M2 5a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm14 1a1 1 0 11-2 0 1 1 0 012 0zM2 13a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2zm14 1a1 1 0 11-2 0 1 1 0 012 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <div class="flex flex-1">
                                        <span>
                                            Orders
                                        </span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="meta">
                <div class="statuses">
                    <ul class="px-3 py-3">
                        <li class="nav-item">
                            <ul class="text-sm -mx-3 text-gray-700">
                                <li>
                                    <div
                                        class="flex items-center justify-center gap-3 px-3 py-2 rounded-lg font-medium transition bg-primary-500 text-white">

                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <ul class="meta-list">
                    <div class="meta-item">
                        <div class="meta-item-title">

                        </div>
                        <div class="meta-item-content">

                        </div>
                    </div>
                </ul>
            </div>
            <div class="main">
                <div class="slot">
                    Slot
                </div>
                <div class="footer">
                    T&C Apply
                </div>
            </div>
        </div>
    </AppLayout>
</template>
