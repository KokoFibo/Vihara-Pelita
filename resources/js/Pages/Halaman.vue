<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';


</script>

<template>

    <Head title="Halaman" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Halaman
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!-- Start -->
                        <div class="mb-5">
                            <label class="mr-3">Nama</label>
                            <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
                        </div>
                        <div class="mb-5">
                            <label class="mr-3">Nama</label>
                            <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
                        </div>
                        
                       
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
