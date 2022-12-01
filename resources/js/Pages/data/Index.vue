<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { ref, watch, reactive } from "vue";
import Pagination from "@/Components/Pagination.vue";
import { debounce, pickBy } from "lodash";

const pelitaFilters = reactive({
    search: props.filters.search,
    perPage: props.filters.perPage,
    column: props.filters.column,
    direction: props.filters.direction,
    jenisKelamin: props.filters.jenisKelamin,
    umur1: props.filters.umur1,
    umur2: props.filters.umur2,
    tgl1: props.filters.tgl1,
    tgl2: props.filters.tgl2,
});

const props = defineProps({
    datapelita: Object,
    filters: Object,
});

watch(
    pelitaFilters,
    debounce(() => {
        let query = pickBy(pelitaFilters);
        let queryRoute = route(
            "datapelita.index",
            Object.keys(query).length ? query : { remember: "forget" }
        );

        Inertia.get(
            queryRoute,
            {},
            {
                preserveState: true,
                replace: true,
            }
        );
    }, 300),
    {
        deep: true,
    }
);
function sort(col) {
    pelitaFilters.column = col;
    pelitaFilters.direction =
        pelitaFilters.direction === "asc" ? "desc" : "asc";
}

function getPage() {
    Inertia.get(
        "route('datapelita.index')",
        {
            perPage: pelitaFilters.perPage,
            search: pelitaFilters.search,
            jenisKelamin: pelitaFilters.jenisKelamin,
            umur1: pelitaFilters.umur1,
            umur2: pelitaFilters.umur2,
            tgl1: pelitaFilters.tgl1,
            tgl2: pelitaFilters.tgl2,
        },
        {
            preserveState: true,
            replace: true,
        }
    );
}
function getumur1() {
    Inertia.get(
        "route('datapelita.index')",
        {
            perPage: pelitaFilters.perPage,
            search: pelitaFilters.search,
            jenisKelamin: pelitaFilters.jenisKelamin,
            umur1: pelitaFilters.umur1,
            umur2: pelitaFilters.umur2,
            tgl1: pelitaFilters.tgl1,
            tgl2: pelitaFilters.tgl2,
        },
        {
            preserveState: true,
            replace: true,
        }
    );
}
function getumur2() {
    Inertia.get(
        "route('datapelita.index')",
        {
            perPage: pelitaFilters.perPage,
            search: pelitaFilters.search,
            jenisKelamin: pelitaFilters.jenisKelamin,
            umur1: pelitaFilters.umur1,
            umur2: pelitaFilters.umur2,
            tgl1: pelitaFilters.tgl1,
            tgl2: pelitaFilters.tgl2,
        },
        {
            preserveState: true,
            replace: true,
        }
    );
}

function getTgl1() {
    Inertia.get(
        "route('datapelita.index')",
        {
            perPage: pelitaFilters.perPage,
            search: pelitaFilters.search,
            jenisKelamin: pelitaFilters.jenisKelamin,
            umur1: pelitaFilters.umur1,
            umur2: pelitaFilters.umur2,
            tgl1: pelitaFilters.tgl1,
            tgl2: pelitaFilters.tgl2,
        },
        {
            preserveState: true,
            replace: true,
        }
    );
}
function getTgl2() {
    Inertia.get(
        "route('datapelita.index')",
        {
            perPage: pelitaFilters.perPage,
            search: pelitaFilters.search,
            jenisKelamin: pelitaFilters.jenisKelamin,
            umur1: pelitaFilters.umur1,
            umur2: pelitaFilters.umur2,
            tgl1: pelitaFilters.tgl1,
            tgl2: pelitaFilters.tgl2,
        },
        {
            preserveState: true,
            replace: true,
        }
    );
}

function getJenisKelamin($tgl, $umur) {
    Inertia.get(
        "route('datapelita.index')",
        {
            perPage: pelitaFilters.perPage,
            search: pelitaFilters.search,
            jenisKelamin: pelitaFilters.jenisKelamin,
            umur1: pelitaFilters.umur1,
            umur2: pelitaFilters.umur2,
            tgl1: pelitaFilters.tgl1,
            tgl2: pelitaFilters.tgl2,
        },
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
            <div class="w-full mx-auto sm:px-6 lg:px-8">
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
                            v-model="pelitaFilters.search"
                            placeholder="Search..."
                            class="input input-bordered input-sm w-full max-w-xs mr-5"
                        />
                        <Pagination :pagination="datapelita" />
                        <Link
                            class="bg-blue-500 text-white rounded-lg hover:bg-blue-700 px-2 py-1"
                            :href="route('datapelita.index')"
                        >
                            Reset
                        </Link>

                        <!-- Table Start -->
                        <div class="overflow-x-auto">
                            <table
                                class="table table-compact w-full mt-2 table-zebra"
                            >
                                <thead>
                                    <tr>
                                        <th class="bg-purple-500 text-white">
                                            <span
                                                class="inline-flex w-full justify-between"
                                                @click="sort('nama')"
                                                >Nama

                                                <svg
                                                    v-if="
                                                        pelitaFilters.column ==
                                                            'nama' &&
                                                        pelitaFilters.direction ==
                                                            'desc'
                                                    "
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                    class="w-4 h-4"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3"
                                                    />
                                                </svg>
                                                <!-- icon Asc -->
                                                <svg
                                                    v-if="
                                                        pelitaFilters.column ==
                                                            'nama' &&
                                                        pelitaFilters.direction ==
                                                            'asc'
                                                    "
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                    class="w-4 h-4"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M8.25 6.75L12 3m0 0l3.75 3.75M12 3v18"
                                                    />
                                                </svg>
                                            </span>
                                        </th>
                                        <th class="bg-purple-500 text-white">
                                            中文名
                                        </th>
                                        <th class="bg-purple-500 text-white">
                                            <span
                                                class="inline-flex w-full justify-between"
                                                @click="sort('umur')"
                                                >Umur
                                                <!-- icon Desc -->
                                                <svg
                                                    v-if="
                                                        pelitaFilters.column ==
                                                            'umur' &&
                                                        pelitaFilters.direction ==
                                                            'desc'
                                                    "
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                    class="w-4 h-4"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3"
                                                    />
                                                </svg>
                                                <!-- icon Asc -->
                                                <svg
                                                    v-if="
                                                        pelitaFilters.column ==
                                                            'umur' &&
                                                        pelitaFilters.direction ==
                                                            'asc'
                                                    "
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                    class="w-4 h-4"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M8.25 6.75L12 3m0 0l3.75 3.75M12 3v18"
                                                    />
                                                </svg>
                                            </span>
                                        </th>
                                        <th class="bg-purple-500 text-white">
                                            Tgl Chiu Tao
                                        </th>
                                        <th class="bg-purple-500 text-white">
                                            Jenis Kelamin
                                        </th>
                                        <th class="bg-purple-500 text-white">
                                            Pengajak
                                        </th>
                                        <th class="bg-purple-500 text-white">
                                            Penjamin
                                        </th>
                                        <th class="bg-purple-500 text-white">
                                            Pandita
                                        </th>
                                        <th class="bg-purple-500 text-white">
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
                                        <td>{{ d.umur_sekarang }}</td>
                                        <td>{{ d.tgl_mohonTao }}</td>
                                        <td>
                                            {{
                                                check_JK(
                                                    d.jenis_kelamin,
                                                    d.umur_sekarang
                                                )
                                            }}
                                        </td>
                                        <td>{{ d.pengajak }}</td>
                                        <td>{{ d.penjamin }}</td>
                                        <td>{{ d.pandita }}</td>
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
                                    v-model="pelitaFilters.perPage"
                                    @change="pelitaFilters.getPage"
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
                                <input
                                    class="w-14 rounded-lg"
                                    v-model="pelitaFilters.umur1"
                                    @change="pelitaFilters.getumur1"
                                    type="text"
                                />
                                -
                                <input
                                    class="w-14 rounded-lg"
                                    v-model="pelitaFilters.umur2"
                                    @change="pelitaFilters.getumur2"
                                    type="text"
                                />
                            </div>
                            <div class="mt-2 ml-5">
                                <div>Tanggal chiu Tao</div>
                                <input
                                    v-model="pelitaFilters.tgl1"
                                    @change="pelitaFilters.getTgl1"
                                    class="rounded-lg"
                                    type="date"
                                />
                                -
                                <input
                                    v-model="pelitaFilters.tgl2"
                                    @change="pelitaFilters.getTgl2"
                                    class="rounded-lg"
                                    type="date"
                                />
                            </div>
                            <div class="mt-2 ml-5">
                                <div>Jenis Kelamin:</div>
                                <select
                                    @change="pelitaFilters.getJenisKelamin"
                                    v-model="pelitaFilters.jenisKelamin"
                                    class="select select-info max-w-xs"
                                >
                                    <option disabled selected>Semua</option>
                                    <option value="">Semua</option>
                                    <option value="1">乾 - Laki-Laki</option>
                                    <option value="2">坤 - Perempuan</option>
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
