<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    branch: Array,
});
</script>

<template>
    <Head title="Branch" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Branch
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
                            <Link
                                href="/branch"
                                class="tab tab-lifted tab-active"
                                >Tambah Daerah</Link
                            >

                            <Link href="/kota" class="tab tab-lifted"
                                >Tambah Kota</Link
                            >
                        </div>
                    </div>
                    <!-- end tab -->
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1 class="mb-2">Tambah Branch</h1>

                        <!-- table -->
                        <table class="table mt-4">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kota Id</th>
                                    <th>Branch</th>
                                    <th>Kode Branch</th>
                                    <th>
                                        <Link
                                            :href="route('branch.create')"
                                            class="bg-blue-500 text-white hover:bg-blue-700 px-3 py-1 rounded-lg"
                                            >Add Branch</Link
                                        >
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="b in branch" :key="b.id">
                                    <td>{{ b.id }}</td>
                                    <td>{{ b.kota_id }}</td>
                                    <td>{{ b.branch }}</td>
                                    <td>{{ b.kode_branch }}</td>
                                    <td>
                                        <Link
                                            :href="route('branch.edit', b.id)"
                                            class="bg-green-500 text-white hover:bg-green-700 px-2 m-2 rounded-lg"
                                            >Edit
                                        </Link>
                                        <Link
                                            :href="
                                                route('branch.destroy', b.id)
                                            "
                                            class="bg-red-500 text-white hover:bg-red-700 px-2 my-2 rounded-lg"
                                            >Delete
                                        </Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- table end -->
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
