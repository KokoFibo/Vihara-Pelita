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
                    <div class="p-6 bg-white border-b border-gray-200">

                        <!-- batas -->
                        <div class="show">
                            <div class="card w-192 bg-base-100 shadow-xl">
                                <div class="card-body">
                                    <h2 class="card-title">Add Data</h2>
                                    <!-- Cabang ID -->
                                    <div class="flex justify-evenly">
                                        <!-- Kiri -->
                                        <div>
                                            <div>
                                                <select class="select select-bordered  w-full max-w-xs">
                                                    <option disabled selected>JKT-1</option>
                                                    <option>MDN-1</option>
                                                    <option>SBY-1</option>
                                                </select>
                                            </div>
                                            <!-- Nama -->
                                            <div>
                                                <input type="text" placeholder="Nama"
                                                    class="input input-bordered w-full max-w-xs mt-5" />
                                            </div>
                                            <!-- Mandarin -->
                                            <div>
                                                <input type="text" placeholder="中文名"
                                                    class="input input-bordered w-full max-w-xs mt-5" />
                                            </div>
                                            <!-- Email -->

                                            <!-- Jenis Kelamin -->
                                            <div class="flex justify-left">
                                                <div class="form-check form-check-inline mt-2 mr-5">
                                                    <input
                                                        class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                        type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                                        value="option1">
                                                    <label class="form-check-label inline-block text-gray-800"
                                                        for="inlineRadio10">Laki-laki</label>
                                                </div>
                                                <div class="form-check form-check-inline mt-2">
                                                    <input
                                                        class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                        type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                                        value="option2">
                                                    <label class="form-check-label inline-block text-gray-800"
                                                        for="inlineRadio20">Perempuan</label>
                                                </div>
                                            </div>
                                            <!-- Umur -->
                                            <div>
                                                <input type="number" placeholder="Umur"
                                                    class="input input-bordered w-full max-w-xs mt-5" />
                                            </div>
                                            <div>
                                                <textarea class="textarea textarea-bordered"
                                                    placeholder="Alamat"></textarea>
                                            </div>

                                        </div>
                                        <!-- Kanan -->
                                        <div class="ml-10">

                                            <div>
                                                <input type="text" placeholder="Kota"
                                                    class="input input-bordered w-full max-w-xs mt-5" />
                                            </div>
                                            <div>
                                                <input type="text" placeholder="Telepon"
                                                    class="input input-bordered w-full max-w-xs mt-5" />
                                            </div>
                                            <div>
                                                <input type="text" placeholder="Handphone"
                                                    class="input input-bordered w-full max-w-xs mt-5" />
                                            </div>
                                            <div>
                                                <input type="email" placeholder="Email"
                                                    class="input input-bordered w-full max-w-xs mt-5" />
                                            </div>
                                            <div>
                                                <input type="date" placeholder="Tanggal Mohon Tao"
                                                    class="input input-bordered w-full max-w-xs mt-5" />
                                            </div>
                                            <div>
                                                <input type="number" placeholder="Keterangan"
                                                    class="input input-bordered w-full max-w-xs mt-5" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- button save -->
                                    <div class="card-actions justify-end">
                                        <button @click="hideAdd" class="btn btn-success">Save</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- batas Akhir -->

                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import TextInput from '@/Components/TextInput.vue'
import Create from '@/Pages/data/Create.vue'
import Edit from '@/Pages/data/Edit.vue'



</script>


