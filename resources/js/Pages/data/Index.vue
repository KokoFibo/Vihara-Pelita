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
    cabang: Array,
    filters: Object,
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
          <div class="p-6 bg-white border-b border-gray-200">
            <!-- Component Create -->
            <div class="showAdd">

              <Create />
            </div>
            <!-- Search Bar -->

            <input type="text" v-model="params.search" placeholder="Search..."
              class="input input-bordered input-sm w-full max-w-xs mr-5" />
            <Pagination :pagination="datapelita" />

            <!-- Table Start -->
            <table class="table">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>中文名</th>
                  <th>Umur</th>
                  <th>Kota</th>
                  <th>Telepon</th>
                  <th>HP</th>
                  <th>
                    <Link :href="route('datapelita.create')" class="btn btn-sm btn-success">Add</Link>


                  </th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="d in datapelita.data" :key="d.id">
                  <td>{{ d.nama }}</td>
                  <td>{{ d.mandarin }}</td>
                  <td>{{ d.umur }}</td>
                  <td>{{ d.kota }}</td>
                  <td>{{ d.telp }}</td>
                  <td>{{ d.hp }}</td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-sm btn-info">
                        Show
                      </button>
                      <button class="btn btn-sm btn-warning">
                        Edit
                      </button>
                      <button class="btn btn-sm btn-error">
                        Delete
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
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
