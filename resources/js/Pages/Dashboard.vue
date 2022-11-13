<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
const props = defineProps({
    totalUmat: String,
    pria: String,
    wanita: String,
    priaDewasa: String,
    wanitaDewasa: String,
    anakLaki: String,
    anakPerempuan: String,
    umatTahunIni: String,
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-slate-50 border-b border-gray-200">
                        <div
                            class="w-80 h-80 bg-white text-black shadow-xl border-l-8 border-l-blue-500"
                        >
                            <h1 class="text-center text-2xl p-5">Total Umat</h1>
                            <p class="text-left text-xl text-blue-800">
                                Total Umat : {{ props.totalUmat }} Orang
                            </p>
                            <p class="text-left text-xl text-blue-800">
                                Pria : {{ props.pria }} Orang
                            </p>
                            <p class="text-left text-xl text-blue-800">
                                Wanita : {{ props.wanita }} Orang
                            </p>
                            <p class="text-left text-xl text-blue-800">
                                Pria Dewasa : {{ props.priaDewasa }} Orang
                            </p>
                            <p class="text-left text-xl text-blue-800">
                                Wanita Dewasa : {{ props.wanitaDewasa }} Orang
                            </p>
                            <p class="text-left text-xl text-blue-800">
                                Anak Laki-Laki : {{ props.anakLaki }} Orang
                            </p>
                            <p class="text-left text-xl text-blue-800">
                                Anak Perempuan : {{ props.anakPerempuan }} Orang
                            </p>
                            <p class="text-left text-xl text-blue-800">
                                Total Umat tahun ini :
                                {{ props.umatTahunIni }} Orang
                            </p>
                        </div>
                        <br /><br />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<style>
.card {
    width: 300px;
    height: 100px;
    background-color: greenyellow;
    color: black;
    border-top: 10px solid pink;
    box-shadow: 20px;
}
</style>
