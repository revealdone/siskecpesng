<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

const props = defineProps<{ pegawai: { data: any[] } }>();

const search = ref('');

// Filter data berdasarkan nama atau nrk
const filteredData = computed(() => {
    return props.pegawai.data.filter(
        (pegawai) =>
            pegawai.nama.toLowerCase().includes(search.value.toLowerCase()) || pegawai.nrk.toLowerCase().includes(search.value.toLowerCase()),
    );
});
function handleDelete(id: number) {
    if (confirm('Yakin ingin menghapus data ini?')) {
        router.delete(`/arsip-pegawai/${id}`);
    }
}
</script>

<template>
    <Head title="Daftar Arsip Pegawai" />
    <AppLayout>
        <div class="space-y-4 p-4">
            <div class="flex items-center justify-between">
                <h1 class="text-xl font-bold">📂 Daftar Arsip Pegawai</h1>
                <Link href="/pegawai/create" class="rounded bg-blue-600 px-3 py-2 text-white">+ Tambah</Link>
            </div>

            <!-- Input Search -->
            <div class="mt-2">
                <input v-model="search" type="text" placeholder="Cari nama atau NRK..." class="w-full rounded border px-3 py-2 shadow-sm md:w-1/3" />
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full border text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">NRK</th>
                            <th class="border px-4 py-2">Nama</th>
                            <th class="border px-4 py-2">Rak</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="pegawai in filteredData" :key="pegawai.id" class="hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ pegawai.nrk }}</td>
                            <td class="border px-4 py-2">{{ pegawai.nama }}</td>
                            <td class="border px-4 py-2">{{ pegawai.lokasi_rak }}</td>
                            <td class="space-x-2 border px-4 py-2">
                                <Link :href="`/arsip-pegawai/${pegawai.id}`" class="rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600"
                                    >Lihat</Link
                                >
                                <Link
                                    :href="`/arsip-pegawai/${pegawai.id}/edit`"
                                    class="rounded bg-yellow-500 px-4 py-2 text-white hover:bg-yellow-600"
                                    >Edit</Link
                                >
                                <button @click="handleDelete(pegawai.id)" class="rounded bg-red-500 px-4 py-2 text-white hover:bg-red-600">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>
