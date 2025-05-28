<script setup lang="ts">

import { Head, router } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import dayjs from 'dayjs';
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';

const props = defineProps<{
    archives: {
        id: number;
        title: string;
        physical_location: string;
        stored_at: string;
        pdf_path: string;
    }[];
}>();

const search = ref('');

const filteredArchives = computed(() => {
    return props.archives.filter(archive =>
        archive.title.toLowerCase().includes(search.value.toLowerCase()) ||
        archive.pdf_path.toLowerCase().includes(search.value.toLowerCase())
    );
});


const isExpired = (date: string) => {
    return dayjs().diff(dayjs(date), 'year') >= 2;
};

const deleteArchive = (id: number) => {
    if (confirm('Yakin ingin menghapus arsip ini?')) {
        router.delete(`/archives/${id}`);
    }
};
</script>

<template>
    <Head title="Daftar Arsip" />
    <AppLayout >
        <div class="p-4 space-y-4">
            <div class="flex justify-between items-center">
                
                <div class="flex items-center justify-between mb-6">
<h2 class="text-2xl font-semibold ">Daftar Arsip</h2>
  <a
    href="/dashboard"
    class="bg-gray-200 hover:bg-gray-300 text-sm text-gray-800 px-3 py-1 ml-3 rounded shadow"
  >
    ⬅️ Kembali
  </a>
</div>

                <input v-model="search" placeholder="Cari judul arsip..." class="border p-2 rounded" />
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 rounded shadow-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left">Judul</th>
                            <th class="px-4 py-2 text-left">Lokasi</th>
                            <th class="px-4 py-2 text-left">Tanggal Simpan</th>
                            <th class="px-4 py-2 text-left">Status</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="a in filteredArchives" :key="a.id" class="border-t">
                            <td class="px-4 py-2">{{ a.title }}</td>
                            <td class="px-4 py-2">{{ a.physical_location }}</td>
                            <td class="px-4 py-2">{{ dayjs(a.stored_at).format('DD MMM YYYY') }}</td>
                            <td class="px-4 py-2">
                                <span v-if="isExpired(a.stored_at)" class="text-red-600 font-bold">> 2 Tahun</span>
                                <span v-else class="text-green-600">Aktif</span>
                            </td>
                            <td class="px-4 py-2 text-center">
                                <a :href="`/storage/${a.pdf_path}`" target="_blank" class="text-blue-600 underline mr-2">Lihat</a>
                                <button @click="deleteArchive(a.id)" class="text-red-600 underline">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>