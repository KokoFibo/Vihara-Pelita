<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
</script>

<template>

    <Head title="Daerah" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Kota
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- Tab -->
                    <div class="tabs mb-5">
                        <div class="tabs">
                            <Link href="/datapelita" class="tab tab-lifted ">Master Data</Link>
                            <Link href="/daerah" class="tab tab-lifted ">Tambah Daerah</Link>
                            <Link href="/kota" class="tab tab-lifted tab-active">Tambah Kota</Link>
                        </div>
                    </div>
                    <!-- End Tab -->
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1>Tambah Kota</h1>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<style>
h1 {
    color: red;
    margin: auto;
    font-size: 30px;

}
</style>
