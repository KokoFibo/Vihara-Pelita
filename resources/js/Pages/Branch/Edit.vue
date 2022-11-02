<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    id: props.branch.id,

    kota_id: props.branch.kota_id,
    branch: props.branch.branch,
    kode_branch: props.branch.kode_branch,
});
const props = defineProps({
    kota: Array,
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
                                :href="route('branch.index')"
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
                        <h1>Update Branch</h1>

                        <!-- Drop Down -->
                        <form
                            @submit.prevent="
                                form.put(route('branch.update', form.id))
                            "
                        >
                            <p>Kota:</p>

                            <select
                                v-model="form.kota_id"
                                name="cars"
                                id="cars"
                            >
                                <option
                                    :value="k.id"
                                    v-for="k in kota"
                                    :key="k.id"
                                >
                                    {{ k.kota }}
                                </option>
                            </select>
                            <!-- Drop Down End -->
                            <div
                                class="relative flex w-full flex-wrap items-stretch mb-3"
                            >
                                <label for="" class="mb-2">Nama Branch</label>
                                <span
                                    class="z-10 h-full leading-snug font-normal absolute text-center text-slate-300 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3"
                                >
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input
                                    v-model="form.branch"
                                    type="text"
                                    placeholder="Nama Branch"
                                    class="px-3 py-3 placeholder-slate-300 text-slate-600 relative bg-white bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-full pl-10"
                                />
                            </div>
                            <div
                                class="relative flex w-full flex-wrap items-stretch mb-3"
                            >
                                <label for="" class="mb-2"
                                    >Kode Branch Branch</label
                                >
                                <span
                                    class="z-10 h-full leading-snug font-normal absolute text-center text-slate-300 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3"
                                >
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input
                                    v-model="form.kode_branch"
                                    type="text"
                                    class="px-3 py-3 placeholder-slate-300 text-slate-600 relative bg-white bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-full pl-10"
                                />
                            </div>
                            <button
                                type="submit"
                                class="bg-blue-500 text-white hover:bg-blue-700 rounded-lg mx-2 px-3 py-1"
                            >
                                Update
                            </button>
                            <Link
                                :href="route('branch.index')"
                                class="bg-orange-500 text-white hover:bg-orange-700 mx-2 px-3 py-1 rounded-lg"
                                >Cancel</Link
                            >
                        </form>
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
