<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { ref, watch, defineProps } from "vue";
import Pagination from "@/Components/Pagination.vue";
import debounce from "lodash/debounce";

const props = defineProps({
    datapelita: Object,
    filters: Object,
});

const perPage = ref(10);

let search = ref(props.filters.search);

watch(
    search,
    debounce(function (value) {
        Inertia.get(
            "/datapelita",
            { search: value, prePage: perPage.value },
            {
                preserveState: true,
                replace: true,
            }
        );
    }, 300)
);

function getPage() {
    Inertia.get(
        "/datapelita",
        { perPage: perPage.value, search: search.value },
        {
            preserveState: true,
            replace: true,
        }
    );
}

function showAdd() {
    alert("test1");
    document.querySelector(".showAdd").style.display = "none";
    document.querySelector(".showAdd").style.display = "inline";
}

function umur_sekarang(dt, umur) {
    var today = new Date();
    var yesterday = new Date(dt);

    var y2 = today.getFullYear();
    var y1 = yesterday.getFullYear();
    return y2 - y1 + umur;
}

function check_JK(jk, umur) {
    if (jk == 1 && umur <= 16) return "童 - Anak Laki-Laki";
    else if (jk == 1 && umur > 16) return "乾 - Laki-Laki";
    else if (jk == 2 && umur <= 16) return "女 - Anak Perempuan";
    else return "坤 - Perempuan";
}
</script>

<template>
    <Head title="Data" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Data Pelita
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- Tab -->
                    <div class="tabs mb-5">
                        <div class="tabs">
                            <Link
                                href="/datapelita"
                                class="tab tab-lifted tab-active"
                                >Master Data</Link
                            >
                            <Link
                                :href="route('branch.index')"
                                class="tab tab-lifted"
                                >Tambah Branch</Link
                            >
                            <Link
                                :href="route('kota.index')"
                                class="tab tab-lifted"
                                >Tambah Kota</Link
                            >
                        </div>
                    </div>
                    <!-- end Tab -->
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!-- Search Bar -->

                        <input
                            type="text"
                            v-model="search"
                            placeholder="Search..."
                            class="input input-bordered input-sm w-full max-w-xs mr-5"
                        />
                        <Pagination :pagination="datapelita" />

                        <!-- Table Start -->
                        <div class="overflow-x-auto">
                            <table
                                class="table table-compact w-full mt-2 table-zebra"
                            >
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>中文名</th>
                                        <th>Umur</th>
                                        <th>Tgl Chiu Tao</th>
                                        <th>Jenis Kelamin</th>
                                        <th>
                                            <Link
                                                :href="
                                                    route('datapelita.create')
                                                "
                                                class="btn btn-xs btn-success"
                                                >Add</Link
                                            >
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="d in datapelita.data"
                                        :key="d.id"
                                    >
                                        <td>{{ d.nama }}</td>
                                        <td>{{ d.mandarin }}</td>
                                        <td>
                                            {{
                                                umur_sekarang(
                                                    d.tgl_mohonTao,
                                                    d.umur
                                                )
                                            }}
                                        </td>
                                        <td>{{ d.tgl_mohonTao }}</td>
                                        <td>
                                            {{
                                                check_JK(
                                                    d.jenis_kelamin,
                                                    umur_sekarang(
                                                        d.tgl_mohonTao,
                                                        d.umur
                                                    )
                                                )
                                            }}
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <Link
                                                    :href="
                                                        route(
                                                            'datapelita.show',
                                                            d.id
                                                        )
                                                    "
                                                    class="btn btn-xs btn-info"
                                                >
                                                    Show
                                                </Link>
                                                <Link
                                                    :href="
                                                        route(
                                                            'datapelita.edit',
                                                            d.id
                                                        )
                                                    "
                                                    class="btn btn-xs btn-warning"
                                                >
                                                    Edit
                                                </Link>
                                                <Link
                                                    :href="
                                                        route(
                                                            'datapelita.destroy',
                                                            d.id
                                                        )
                                                    "
                                                    class="btn btn-xs btn-error"
                                                    method="delete"
                                                >
                                                    Delete</Link
                                                >
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Table End -->
                        <div class="mt-5 flex justify-between">
                            <div class="mt-2">
                                <div>Per Page:</div>
                                <select
                                    v-model="perPage"
                                    @change="getPage"
                                    class="select select-info max-w-xs"
                                >
                                    <option disabled selected>10</option>
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                </select>
                            </div>

                            <div class="mt-2 ml-5">
                                <div>Umur:</div>
                                <input type="text" placeholder="10-50" />
                            </div>
                            <div class="mt-2 ml-5">
                                <div>Tanggal chiu Tao</div>
                                <input type="date" /> -
                                <input type="date" />
                            </div>
                            <div class="mt-2 ml-5">
                                <div>Jenis Kelamin:</div>
                                <select class="select select-info max-w-xs">
                                    <option disabled selected>Semua</option>
                                    <option>Semua</option>
                                    <option>乾 - Laki-Laki</option>
                                    <option>坤 - Perempuan</option>
                                    <option>童 - Anak Laki-Laki</option>
                                    <option>女 - Anak Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-for="c in cabang" :key="c.id">isi = {{ c.kode_id }}</div>
    </AuthenticatedLayout>
</template>

<style>
.showAdd,
.showEdit {
    display: none;
}
</style>
