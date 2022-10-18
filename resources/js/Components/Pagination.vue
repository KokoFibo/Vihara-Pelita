<script>
export default {
  name: "Pagination",
  props: {
    pagination: Object,
  },

  methods: {
    loadPage(page) {
      this.$inertia.get(this.$page.url, { page: page });
    },
  },
  computed: {
    noPreviousPage() {
      return this.pagination.current_page - 1 <= 0;
    },
    noNextPage() {
      return this.pagination.current_page + 1 > this.pagination.last_page;
    },
  },
};
</script>
<template>
  <!-- Pagination -->
  Showing {{ pagination.from }} to {{ pagination.to }} of
  {{ pagination.total }} results

  <div class="btn-group btn-sm mb-2">
    <button
      class="btn btn-sm"
      :disabled="noPreviousPage"
      @click="loadPage(pagination.current_page - 1)"
    >
      «
    </button>
    <button class="btn btn-sm">
      Page {{ pagination.current_page }} of {{ pagination.last_page }}
    </button>
    <button
      class="btn btn-sm"
      :disabled="noNextPage"
      @click="loadPage(pagination.current_page + 1)"
    >
      »
    </button>
  </div>
  <!-- Pagination End -->
</template>