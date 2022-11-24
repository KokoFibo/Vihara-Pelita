<template>
    <Head title="Add Data" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add Data
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <Link
                            :href="route('datapelita.index')"
                            class="bg-blue-500 text-white rounded px-3 ml-7 mt-4"
                            >Back</Link
                        >
                        <hr class="my-3" />
                        <!-- batas -->

                        <form
                            class="max-w-7xl mx-auto sm:px-6 lg:px-8"
                            @submit.prevent="form.post('store')"
                        >
                            <div class="flex items-center mb-3">
                                <div class="w-40">
                                    <label class="mr-3">Branch</label>
                                </div>
                                <div class="w-28">
                                    <select
                                        class="select select-bordered w-28"
                                        v-model="form.branch_id"
                                    >
                                        <!-- <option disabled selected>Open this select menu</option> -->
                                        <option
                                            :value="c.id"
                                            v-for="c in branch"
                                            :key="c.id"
                                        >
                                            {{ c.kode_branch }}
                                        </option>
                                    </select>
                                    <p
                                        class="text-red-500 text-xs italic"
                                        v-if="$page.props.errors.branch_id"
                                    >
                                        {{ $page.props.errors.branch_id }}
                                    </p>
                                </div>
                            </div>
                            <!-- Nama -->
                            <div class="flex items-center mb-3">
                                <div class="w-40">
                                    <label class="mr-3">Nama</label>
                                </div>
                                <div>
                                    <input
                                        v-model="form.nama"
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                        id="grid-first-name"
                                        type="text"
                                        placeholder="Nama"
                                    />
                                    <p
                                        class="text-red-500 text-xs italic"
                                        v-if="$page.props.errors.nama"
                                    >
                                        {{ $page.props.errors.nama }}
                                    </p>
                                </div>
                            </div>

                            <!-- Mandarin -->
                            <div class="flex items-center mb-3">
                                <div class="w-40">
                                    <label class="mr-3">Mandarin</label>
                                </div>
                                <div>
                                    <input
                                        v-model="form.mandarin"
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-last-name"
                                        type="text"
                                        placeholder="中文名"
                                    />
                                    <p
                                        class="text-red-500 text-xs italic"
                                        v-if="$page.props.errors.mandarin"
                                    >
                                        {{ $page.props.errors.mandarin }}
                                    </p>
                                </div>
                            </div>

                            <!-- Umur -->
                            <div class="flex items-center mb-3">
                                <div class="w-40">
                                    <label class="mr-3">Umur</label>
                                </div>
                                <div>
                                    <input
                                        v-model="form.umur"
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                        id="grid-first-name"
                                        type="number"
                                        placeholder="Umur"
                                    />
                                    <p
                                        class="text-red-500 text-xs italic"
                                        v-if="$page.props.errors.umur"
                                    >
                                        {{ $page.props.errors.umur }}
                                    </p>
                                </div>

                                <!-- Kota -->
                                <div class="flex items-center mb-3">
                                    <div class="w-48">
                                        <label class="ml-5">Kota</label>
                                    </div>
                                    <input
                                        v-model="form.kota"
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-last-name"
                                        type="text"
                                        placeholder="Kota"
                                    />
                                    <p
                                        class="text-red-500 text-xs italic"
                                        v-if="$page.props.errors.kota"
                                    >
                                        {{ $page.props.errors.kota }}
                                    </p>
                                </div>
                            </div>

                            <!-- Alamat -->
                            <div class="flex items-center mb-3">
                                <div class="w-40">
                                    <label class="mr-3">Alamat</label>
                                </div>
                                <div>
                                    <input
                                        v-model="form.alamat"
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-password"
                                        type="text"
                                        placeholder="Alamat"
                                    />
                                    <p
                                        class="text-red-500 text-xs italic"
                                        v-if="$page.props.errors.alamat"
                                    >
                                        {{ $page.props.errors.alamat }}
                                    </p>
                                </div>
                            </div>

                            <!-- Telepon -->
                            <div class="flex items-center mb-3">
                                <div class="w-40">
                                    <label class="mr-3">Telepon</label>
                                </div>
                                <div>
                                    <input
                                        v-model="form.telp"
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                        id="grid-first-name"
                                        type="text"
                                        placeholder="Telepon"
                                    />
                                    <p
                                        class="text-red-500 text-xs italic"
                                        v-if="$page.props.errors.telp"
                                    >
                                        {{ $page.props.errors.telp }}
                                    </p>
                                </div>

                                <!-- Handphone -->
                                <div class="flex items-center mb-3">
                                    <div class="w-48">
                                        <label class="ml-5">Handphone</label>
                                    </div>
                                    <input
                                        v-model="form.hp"
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-last-name"
                                        type="text"
                                        placeholder="Handphone"
                                    />
                                    <p
                                        class="text-red-500 text-xs italic"
                                        v-if="$page.props.errors.hp"
                                    >
                                        {{ $page.props.errors.hp }}
                                    </p>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="flex items-center mb-3">
                                <div class="w-40">
                                    <label class="mr-3">Email</label>
                                </div>
                                <div>
                                    <input
                                        v-model="form.email"
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                        id="grid-first-name"
                                        type="email"
                                        placeholder="Email"
                                    />
                                    <p
                                        class="text-red-500 text-xs italic"
                                        v-if="$page.props.errors.email"
                                    >
                                        {{ $page.props.errors.email }}
                                    </p>
                                </div>

                                <!-- Jenis Kelamin -->
                                <div class="flex items-center mb-3">
                                    <div class="w-32">
                                        <label class="ml-5"
                                            >Jenis Kelamin</label
                                        >
                                    </div>
                                    <div
                                        class="flex justify-left border-green-500 bg-gray-200 rounded py-2 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    >
                                        <div
                                            class="form-check form-check-inline mt-2 mr-5"
                                        >
                                            <input
                                                v-model="form.jenis_kelamin"
                                                class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-green-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                type="radio"
                                                name="inlineRadioOptions"
                                                id="inlineRadio1"
                                                value="1"
                                            />
                                            <label
                                                class="form-check-label inline-block text-gray-800"
                                                for="inlineRadio10"
                                                >Laki-laki</label
                                            >
                                        </div>
                                        <div
                                            class="form-check form-check-inline mt-2"
                                        >
                                            <input
                                                v-model="form.jenis_kelamin"
                                                class="form-check-input form-check-input appearance-none rounded-full h-4 w-4 border border-green-300 bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                type="radio"
                                                name="inlineRadioOptions"
                                                id="inlineRadio2"
                                                value="2"
                                            />
                                            <label
                                                class="form-check-label inline-block text-gray-800"
                                                for="inlineRadio20"
                                                >Perempuan</label
                                            >
                                        </div>
                                    </div>
                                    <p
                                        class="text-red-500 text-xs italic"
                                        v-if="$page.props.errors.jenis_kelamin"
                                    >
                                        {{ $page.props.errors.jenis_kelamin }}
                                    </p>
                                </div>
                            </div>

                            <!-- Tgl Mohon Tao -->
                            <div class="flex items-center mb-3">
                                <div class="w-40">
                                    <label class="mr-3"
                                        >Tanggal mohon Tao</label
                                    >
                                </div>
                                <div>
                                    <input
                                        v-model="form.tgl_mohonTao"
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                        id="grid-first-name"
                                        type="date"
                                        placeholder="Tanggal mohon Tao"
                                    />
                                    <p
                                        class="text-red-500 text-xs italic"
                                        v-if="$page.props.errors.tgl_mohonTao"
                                    >
                                        {{ $page.props.errors.tgl_mohonTao }}
                                    </p>
                                </div>
                                <div class="flex items-center mb-3">
                                    <div class="w-72">
                                        <label class="ml-16">Status</label>
                                    </div>
                                    <input
                                        v-model="form.status"
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-green-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-last-name"
                                        type="text"
                                        placeholder="Status"
                                    />
                                    <p
                                        class="text-red-500 text-xs italic"
                                        v-if="$page.props.errors.status"
                                    >
                                        {{ $page.props.errors.status }}
                                    </p>
                                </div>
                            </div>
                            <!-- button save -->
                            <hr class="my-3" />
                            <div class="card-actions justify-end">
                                <button
                                    type="submit"
                                    @click="hideAdd"
                                    class="btn btn-success"
                                >
                                    Save
                                </button>
                            </div>
                        </form>

                        <!-- batas Akhir -->
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm, Link } from "@inertiajs/inertia-vue3";

function tgl_hariIni() {
    const current = new Date();
    const date = `${
        current.getMonth() + 1
    }/${current.getDate()}/${current.getFullYear()}`;
    console.log(date);
    return date;
}

const props = defineProps({
    branch: Array,
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
    status: "Active",
    branch_id: null,
});
</script>
