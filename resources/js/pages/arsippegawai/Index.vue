<script setup lang="ts">
import { ref, computed } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { Head,  router } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3'

const props = defineProps<{ pegawai: { data: any[] } }>();

const search = ref('');

// Filter data berdasarkan nama atau nrk
const filteredData = computed(() => {
    return props.pegawai.data.filter((pegawai) =>
        pegawai.nama.toLowerCase().includes(search.value.toLowerCase()) ||
        pegawai.nrk.toLowerCase().includes(search.value.toLowerCase())
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
        <div class="p-4 space-y-4">
            <div class="flex justify-between items-center">
                <h1 class="text-xl font-bold">📂 Daftar Arsip Pegawai</h1>
                <Link href="/pegawai/create" class="bg-blue-600 text-white px-3 py-2 rounded">+ Tambah</Link>
            </div>

            <!-- Input Search -->
            <div class="mt-2">
                <input
                    v-model="search"
                    type="text"
                    placeholder="Cari nama atau NRK..."
                    class="w-full md:w-1/3 px-3 py-2 border rounded shadow-sm"
                />
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full border text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">NRK</th>
                            <th class="px-4 py-2 border">Nama</th>
                            <th class="px-4 py-2 border">Rak</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="pegawai in filteredData" :key="pegawai.id" class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">{{ pegawai.nrk }}</td>
                            <td class="px-4 py-2 border">{{ pegawai.nama }}</td>
                            <td class="px-4 py-2 border">{{ pegawai.lokasi_rak }}</td>
                            <td class="px-4 py-2 border space-x-2">
                                <Link :href="`/arsip-pegawai/${pegawai.id}`" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Lihat</Link>
                                <Link :href="`/arsip-pegawai/${pegawai.id}/edit`" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</Link>
                                <button @click="handleDelete(pegawai.id)" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>
