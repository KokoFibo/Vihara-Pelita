<template>
    <!-- Tab -->
    <div class="tabs">
        <div class="tabs">
            <Link href="/hal1" class="tab tab-lifted">Halaman 1</Link>
            <Link href="/hal2" class="tab tab-lifted ">Halaman 2</Link>
            <Link href="/hal3" class="tab tab-lifted tab-active">Halaman 3</Link>
        </div>
    </div>
    <h1>Halaman 3</h1>
    <Link href="/dashboard" class="btn btn-xs btn-success">Back to Dashboard</Link>

</template>
<script setup>
import { Link } from '@inertiajs/inertia-vue3';

</script>
<style scoped>
h1 {
    color: red;
    font-size: 30px;
    margin: auto;
}
</style>
