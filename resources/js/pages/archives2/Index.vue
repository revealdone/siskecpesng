<script setup lang="ts">
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import dayjs from 'dayjs';
import { computed, ref } from 'vue';

const props = defineProps<{
    archives2: {
        id: number;
        title: string;
        physical_location: string;
        stored_at: string;
        pdf_path: string;
    }[];
}>();

const search = ref('');

const filteredArchives2 = computed(() => {
    return props.archives2.filter(
        (archive2) =>
            archive2.title.toLowerCase().includes(search.value.toLowerCase()) || archive2.pdf_path.toLowerCase().includes(search.value.toLowerCase()),
    );
});

const isExpired = (date: string) => {
    return dayjs().diff(dayjs(date), 'year') >= 2;
};

const deleteArchive2 = (id: number) => {
    if (confirm('Yakin ingin menghapus arsip ini?')) {
        router.delete(`/archives2/${id}`);
    }
};
</script>

<template>
    <Head title="Daftar Arsip" />
    <AppLayout>
        <div class="space-y-4 p-4">
            <div class="flex items-center justify-between">
                <div class="mb-6 flex items-center justify-between">
                    <h2 class="text-2xl font-semibold">Daftar Arsip</h2>
                    <a href="/dashboard" class="ml-3 rounded bg-gray-200 px-3 py-1 text-sm text-gray-800 shadow hover:bg-gray-300"> ⬅️ Kembali </a>
                </div>

                <input v-model="search" placeholder="Cari judul arsip..." class="rounded border p-2" />
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full rounded border border-gray-300 shadow-sm">
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
                        <tr v-for="a in filteredArchives2" :key="a.id" class="border-t">
                            <td class="px-4 py-2">{{ a.title }}</td>
                            <td class="px-4 py-2">{{ a.physical_location }}</td>
                            <td class="px-4 py-2">{{ dayjs(a.stored_at).format('DD MMM YYYY') }}</td>
                            <td class="px-4 py-2">
                                <span v-if="isExpired(a.stored_at)" class="font-bold text-red-600">> 2 Tahun</span>
                                <span v-else class="text-green-600">Aktif</span>
                            </td>
                            <td class="px-4 py-2 text-center">
                                <a :href="`/storage/${a.pdf_path}`" target="_blank" class="mr-2 text-blue-600 underline">Lihat</a>
                                <button @click="deleteArchive2(a.id)" class="text-red-600 underline">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>
