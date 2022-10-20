<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <!-- batas -->
                    <div class="show">
                        
                        <div class="card w-3/5 bg-green-100 shadow-xl mx-auto">
                            <div class="card-body">
                                <h2 class="card-title mx-auto">Add Data</h2>
                                <!-- Cabang ID -->

                                <form class="w-full max-w-lg mx-auto" @submit.prevent="form.post('store')">
                                    <div class="flex flex-wrap -mx-3 mb-3">
                                        <div class="w-full md:w-1/2 px-3 mb-3 md:mb-0">

                                            <select class="select select-bordered  w-full max-w-xs"
                                                v-model="form.cabang_id">
                                                <option disabled selected>Open this select menu</option>
                                                <option :value="c.id" v-for="c in cabang" :key="c.id">{{
                                                c.kode_id }}</option>
                                            </select>
                                            <p class="text-red-500 text-xs italic" v-if="$page.props.errors.cabang_id">
                                                {{
                                                $page.props.errors.cabang_id }}</p>
                                        </div>
                                        <!-- <div class="w-full md:w-1/2 px-3">

                                    <input
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-last-name" type="text" placeholder="中文名">
                                </div> -->
                                    </div>
                                    <div class="flex flex-wrap -mx-3 mb-3">
                                        <div class="w-full md:w-1/2 px-3 mb-3 md:mb-0">
                                            <input v-model="form.nama"
                                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                id="grid-first-name" type="text" placeholder="Nama">
                                            <p class="text-red-500 text-xs italic" v-if="$page.props.errors.nama">{{
                                            $page.props.errors.nama }}</p>
                                        </div>
                                        <div class="w-full md:w-1/2 px-3">

                                            <input v-model="form.mandarin"
                                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="grid-last-name" type="text" placeholder="中文名">
                                            <p class="text-red-500 text-xs italic" v-if="$page.props.errors.mandarin">{{
                                            $page.props.errors.mandarin }}</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap -mx-3 mb-3">
                                        <div class="w-full md:w-1/2 px-3 mb-3 md:mb-0">

                                            <input v-model="form.umur"
                                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                id="grid-first-name" type="number" placeholder="Umur">
                                            <p class="text-red-500 text-xs italic" v-if="$page.props.errors.umur">{{
                                            $page.props.errors.umur }}</p>
                                        </div>
                                        <div class="w-full md:w-1/2 px-3">

                                            <input v-model="form.kota"
                                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="grid-last-name" type="text" placeholder="Kota">
                                            <p class="text-red-500 text-xs italic" v-if="$page.props.errors.kota">{{
                                            $page.props.errors.kota }}</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap -mx-3 mb-3">
                                        <div class="w-full px-3">

                                            <input v-model="form.alamat"
                                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="grid-password" type="text" placeholder="Alamat">
                                            <p class="text-red-500 text-xs italic" v-if="$page.props.errors.alamat">{{
                                            $page.props.errors.alamat }}</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap -mx-3 mb-3">
                                        <div class="w-full md:w-1/2 px-3 mb-3 md:mb-0">

                                            <input v-model="form.telp"
                                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                id="grid-first-name" type="text" placeholder="Telepon">
                                            <p class="text-red-500 text-xs italic" v-if="$page.props.errors.telp">{{
                                            $page.props.errors.telp }}</p>
                                        </div>
                                        <div class="w-full md:w-1/2 px-3">

                                            <input v-model="form.hp"
                                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="grid-last-name" type="text" placeholder="Handphone">
                                            <p class="text-red-500 text-xs italic" v-if="$page.props.errors.hp">{{
                                            $page.props.errors.hp }}</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap -mx-3 mb-3">
                                        <div class="w-full md:w-1/2 px-3 mb-3 md:mb-0">

                                            <input v-model="form.email"
                                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                id="grid-first-name" type="email" placeholder="Email">
                                            <p class="text-red-500 text-xs italic" v-if="$page.props.errors.email">{{
                                            $page.props.errors.email }}</p>
                                        </div>
                                        <div class="w-full md:w-1/2 px-3 ">

                                            <div
                                                class="flex justify-left border-green-500 bg-gray-200 rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                                <div class="form-check form-check-inline mt-2 mr-5 ">
                                                    <input v-model="form.jenis_kelamin"
                                                        class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-green-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                        type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                                        value="Laki-laki">
                                                    <label class="form-check-label inline-block text-gray-800"
                                                        for="inlineRadio10">Laki-laki</label>
                                                </div>
                                                <div class="form-check form-check-inline mt-2">
                                                    <input v-model="form.jenis_kelamin"
                                                        class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-green-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                        type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                                        value="Perempuan">
                                                    <label class="form-check-label inline-block text-gray-800"
                                                        for="inlineRadio20">Perempuan</label>
                                                </div>
                                                <p class="text-red-500 text-xs italic"
                                                    v-if="$page.props.errors.jenis_kelamin">{{
                                                    $page.props.errors.jenis_kelamin }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap -mx-3 mb-3">
                                        <div class="w-full md:w-1/2 px-3 mb-3 md:mb-0">

                                            <input v-model="form.tgl_mohonTao"
                                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                                id="grid-first-name" type="date" placeholder="Tanggal mohon Tao">
                                            <p class="text-red-500 text-xs italic"
                                                v-if="$page.props.errors.tgl_mohonTao">{{
                                                $page.props.errors.tgl_mohonTao }}</p>
                                        </div>
                                        <div class="w-full md:w-1/2 px-3">

                                            <input v-model="form.keterangan"
                                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="grid-last-name" type="text" placeholder="Keterangan">
                                            <p class="text-red-500 text-xs italic" v-if="$page.props.errors.keterangan">
                                                {{
                                                $page.props.errors.keterangan }}</p>
                                        </div>
                                    </div>
                                    <!-- button save -->
                                    <div class="card-actions justify-end">
                                        <button type="submit" @click="hideAdd" class="btn btn-success">Save</button>
                                    </div>
                                </form>



                            </div>
                        </div>
                    </div>
                    <!-- batas Akhir -->

                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    cabang: Array,
});

const form = useForm({
    nama: "",
    mandarin: "",
    jenis_kelamin: "",
    umur: null,
    alamat: "",
    kota: "",
    telp: "",
    hp: "",
    email: "",
    tgl_mohonTao: "",
    keterangan: "",
    cabang_id: null
});
</script>

