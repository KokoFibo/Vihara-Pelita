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
                            <Link
                                :href="route('branch.index')"
                                class="tab tab-lifted"
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
                                <form
                                    @submit.prevent="
                                        form.post(route('kota.store'))
                                    "
                                >
                                    <input
                                        v-model="form.kota"
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                        type="text"
                                        placeholder="Nama Kota"
                                    />
                                    <span
                                        class="text-red-500"
                                        v-if="$page.props.errors.kota"
                                        >{{ $page.props.errors.kota }}</span
                                    >

                                    <div class="card-actions justify-end">
                                        <button
                                            type="submit"
                                            class="bg-blue-500 text-white hover:bg-blue-700 rounded-lg mx-2 px-3 py-1"
                                        >
                                            Save
                                        </button>
                                        <Link
                                            :href="route('kota.index')"
                                            class="bg-orange-500 text-white hover:bg-orange-700 mx-2 px-3 py-1 rounded-lg"
                                            >Cancel</Link
                                        >
                                    </div>
                                </form>
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
