<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import Pagination from '@/Components/Pagination.vue'
import Create from '@/Pages/data/Create.vue'
import Edit from '@/Pages/data/Edit.vue'

export default {
  components: {
    AuthenticatedLayout,
    Head,
    Link,
    Pagination,
    Create,
    Edit,
  },

  props: {
    datapelita: Object,
    filters: Object,
    msg: String,
  },

  data() {
    return {
      params: {
        search: this.filters.search,
      },
    }
  },
  methods: {
    showAdd() {
      alert('test1');
      document.querySelector(".showAdd").style.display = 'none';
      document.querySelector(".showAdd").style.display = 'inline';
    },
    umur_sekarang(dt, umur) {
      var today = new Date();
      var yesterday = new Date(dt);

      var y2 = today.getFullYear();
      var y1 = yesterday.getFullYear();
      return (y2 - y1) + umur;

    }
  },
  watch: {
    params: {
      handler() {
        this.$inertia.get(this.route('datapelita'), this.params, {
          replace: true,
          preserveState: true,
        })
      },
      deep: true,
    },
  },
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
              <Link href="/datapelita" class="tab tab-lifted tab-active">Master Data</Link>
              <Link href="/daerah" class="tab tab-lifted ">Tambah Daerah</Link>
              <Link href="/kota" class="tab tab-lifted">Tambah Kota</Link>
            </div>
          </div>
          <!-- end Tab -->
          <div class="p-6 bg-white border-b border-gray-200">

            <!-- Search Bar -->

            <input type="text" v-model="params.search" placeholder="Search..."
              class="input input-bordered input-sm w-full max-w-xs mr-5" />
            <Pagination :pagination="datapelita" />

            <!-- Table Start -->
            <div class="overflow-x-auto">
              <table class=" table table-compact w-full mt-2 table-zebra">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>中文名</th>
                    <th>Umur</th>
                    <th>Tgl Chiu Tao</th>
                    <th>Jenis Kelamin</th>
                    <th>
                      <Link :href="route('datapelita.create')" class="btn btn-xs btn-success">Add</Link>


                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="d in datapelita.data" :key="d.id">
                    <td>{{ d.nama }}</td>
                    <td>{{ d.mandarin }}</td>
                    <td>{{ umur_sekarang(d.tgl_mohonTao, d.umur ) }}</td>
                    <td>{{ d.tgl_mohonTao }}</td>
                    <td>{{ d.jenis_kelamin }}</td>
                    <td>
                      <div class="btn-group">
                        <Link :href="route('datapelita.show', d.id)" class="btn btn-xs btn-info">
                        Show
                        </Link>
                        <Link :href="route('datapelita.edit', d.id)" class="btn btn-xs btn-warning">
                        Edit
                        </Link>
                        <Link :href="route('datapelita.destroy', d.id)" class="btn btn-xs btn-error" method="delete">
                        Delete</Link>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- Table End -->
          </div>
        </div>
      </div>
    </div>
    <div v-for="c in cabang" :key="c.id">
      isi = {{ c.kode_id }}

    </div>
  </AuthenticatedLayout>
</template>



<style>
.showAdd,
.showEdit {
  display: none;
}
</style>
