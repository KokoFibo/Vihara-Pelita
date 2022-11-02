<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
const form = useForm({
    kota: "",
});

const props = defineProps({
    kota: Array,
});
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
                            <Link href="/datapelita" class="tab tab-lifted"
                                >Master Data</Link
                            >
                            <Link href="/branch" class="tab tab-lifted"
                                >Tambah Daerah</Link
                            >
                            <Link href="/kota" class="tab tab-lifted tab-active"
                                >Tambah Kota</Link
                            >
                        </div>
                    </div>
                    <!-- End Tab -->
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1>Tambah Kota</h1>
                        <div class="flex flex-wrap -mx-3 mb-3">
                            <div class="w-full md:w-1/2 px-3 mb-3 md:mb-0">
                                <!-- Table -->
                                <Link
                                    :href="route('kota.create')"
                                    class="inline-block bg-blue-500 hover:bg-blue-800 text-white px-2 rounded-lg my-2"
                                >
                                    Add
                                </Link>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kota</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="k in kota" :key="k.id">
                                            <td>{{ k.id }}</td>
                                            <td>{{ k.kota }}</td>
                                            <td>
                                                <Link
                                                    :href="
                                                        route('kota.edit', k.id)
                                                    "
                                                    class="inline-block bg-green-500 text-white px-2 mx-1 rounded-lg hover:bg-green-800"
                                                >
                                                    Edit
                                                </Link>

                                                <Link
                                                    :href="
                                                        route(
                                                            'kota.destroy',
                                                            k.id
                                                        )
                                                    "
                                                    method="delete"
                                                    class="inline-block bg-red-500 hover:bg-red-800 text-white px-2 mx-1 rounded-lg"
                                                >
                                                    Delete
                                                </Link>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!-- Table End -->
                            </div>
                        </div>
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
