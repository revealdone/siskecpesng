<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    title: '',
    physical_location: '',
    stored_at: '',
    pdf_file: null as File | null,
});

const submit = () => {
    form.post('/archives', {
        forceFormData: true,
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
};
</script>

<template>
    <Head title="Tambah Arsip" />
    <AppLayout>
        <div class="max-w-xl mx-auto p-4 space-y-4 bg-white shadow rounded-xl dark:bg-gray-800">
            <h2 class="text-xl font-semibold">Tambah Arsip Baru</h2>
            
            <form @submit.prevent="submit" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium">Judul Arsip</label>
                    <input v-model="form.title" type="text" class="w-full p-2 border rounded" />
                    <span v-if="form.errors.title" class="text-red-500 text-sm">{{ form.errors.title }}</span>
                </div>
                <div>
                    <label class="block text-sm font-medium">Lokasi Fisik (Rak/Kotak)</label>
                    <input v-model="form.physical_location" type="text" class="w-full p-2 border rounded" />
                    <span v-if="form.errors.physical_location" class="text-red-500 text-sm">{{ form.errors.physical_location }}</span>
                </div>
                <div>
                    <label class="block text-sm font-medium">Tanggal Disimpan</label>
                    <input v-model="form.stored_at" type="date" class="w-full p-2 border rounded" />
                    <span v-if="form.errors.stored_at" class="text-red-500 text-sm">{{ form.errors.stored_at }}</span>
                </div>
                <div>
                    <label class="block text-sm font-medium">File PDF</label>
                    <input type="file" accept="application/pdf" @change="e => form.pdf_file = (e.target as HTMLInputElement)?.files?.[0] || null" />
                    <span v-if="form.errors.pdf_file" class="text-red-500 text-sm">{{ form.errors.pdf_file }}</span>
                </div>
                <div>
                    <div class="flex items-center justify-between mb-6">
                                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan Arsip</button>

  <a
    href="/dashboard"
    class="bg-gray-200 hover:bg-gray-300 text-sm text-gray-800 px-4 py-2 ml-3 rounded shadow"
  >
    ⬅️ Kembali
  </a>
</div>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
