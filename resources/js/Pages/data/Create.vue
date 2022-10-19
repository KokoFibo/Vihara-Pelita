<template>
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
                                <div v-for="c in cabang" :key="c.id">
                                    isi = {{ c.kode_id }}

                                </div>
                                <div class="flex justify-evenly">
                                    <form @submit.prevent="form.post('store')">
                                        <!-- Kiri -->
                                        <div>
                                            <div>
                                                <select v-model="form.cabang_id"
                                                    class="select select-bordered  w-full max-w-xs">
                                                    <option selected>Open this select menu</option>


                                                    <option :value="c.id" v-for="c in cabang" :key="c.id">{{
                                                    c.kode_id }}</option>



                                                </select>
                                            </div>
                                            <!-- Nama -->
                                            <div>
                                                <input v-model="form.nama" type="text" placeholder="Nama"
                                                    class="input input-bordered w-full max-w-xs mt-5" />
                                            </div>
                                            <!-- Mandarin -->
                                            <div>
                                                <input v-model="form.mandarin" type="text" placeholder="中文名"
                                                    class="input input-bordered w-full max-w-xs mt-5" />
                                            </div>
                                            <!-- Email -->

                                            <!-- Jenis Kelamin -->
                                            <div class="flex justify-left">
                                                <div class="form-check form-check-inline mt-2 mr-5">
                                                    <input v-model="form.jenis_kelamin"
                                                        class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                        type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                                        value="Laki-laki">
                                                    <label class="form-check-label inline-block text-gray-800"
                                                        for="inlineRadio10">Laki-laki</label>
                                                </div>
                                                <div class="form-check form-check-inline mt-2">
                                                    <input v-model="form.jenis_kelamin"
                                                        class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                        type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                                        value="Perempuan">
                                                    <label class="form-check-label inline-block text-gray-800"
                                                        for="inlineRadio20">Perempuan</label>
                                                </div>
                                            </div>
                                            <!-- Umur -->
                                            <div>
                                                <input v-model="form.umur" type="number" placeholder="Umur"
                                                    class="input input-bordered w-full max-w-xs mt-5" />
                                            </div>
                                            <div>
                                                <textarea v-model="form.alamat" class="textarea textarea-bordered"
                                                    placeholder="Alamat"></textarea>
                                            </div>

                                        </div>
                                        <!-- Kanan -->
                                        <div class="ml-10">

                                            <div>
                                                <input v-model="form.kota" type="text" placeholder="Kota"
                                                    class="input input-bordered w-full max-w-xs mt-5" />
                                            </div>
                                            <div>
                                                <input v-model="form.telp" type="text" placeholder="Telepon"
                                                    class="input input-bordered w-full max-w-xs mt-5" />
                                            </div>
                                            <div>
                                                <input v-model="form.hp" type="text" placeholder="Handphone"
                                                    class="input input-bordered w-full max-w-xs mt-5" />
                                            </div>
                                            <div>
                                                <input v-model="form.email" type="email" placeholder="Email"
                                                    class="input input-bordered w-full max-w-xs mt-5" />
                                            </div>
                                            <div>
                                                <input v-model="form.tgl_mohonTao" type="date"
                                                    placeholder="Tanggal Mohon Tao"
                                                    class="input input-bordered w-full max-w-xs mt-5" />
                                            </div>
                                            <div>
                                                <input v-model="form.keterangan" type="number" placeholder="Keterangan"
                                                    class="input input-bordered w-full max-w-xs mt-5" />
                                            </div>
                                        </div>
                                        <!-- button save -->
                                        <div class="card-actions justify-end">
                                            <button type="submit" @click="hideAdd" class="btn btn-success">Save</button>
                                        </div>
                                    </form>
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
    umur: "",
    alamat: "",
    kota: "",
    telp: "",
    hp: "",
    email: "",
    tgl_mohonTao: "",
    keterangan: 0,
    cabang_id: null




});
// function hideAdd() {
//     document.querySelector(".show").style.display = 'none';
// }
</script>

