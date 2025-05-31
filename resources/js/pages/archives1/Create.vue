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
    form.post('/archives1', {
        forceFormData: true,
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
};
</script>

<template>
    <Head title="Tambah Arsip" />
    <AppLayout>
        <div class="mx-auto max-w-xl space-y-4 rounded-xl bg-white p-4 shadow dark:bg-gray-800">
            <h2 class="text-xl font-semibold">Tambah Sk Jabatan</h2>

            <form @submit.prevent="submit" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium">Keterangan Golongan Cth(III A)</label>
                    <input v-model="form.title" type="text" class="w-full rounded border p-2" />
                    <span v-if="form.errors.title" class="text-sm text-red-500">{{ form.errors.title }}</span>
                </div>
                <div>
                    <label class="block text-sm font-medium">Nrk (Wajib Masukan Nrk dengan benar)</label>
                    <input v-model="form.physical_location" type="text" class="w-full rounded border p-2" />
                    <span v-if="form.errors.physical_location" class="text-sm text-red-500">{{ form.errors.physical_location }}</span>
                </div>
                <div>
                    <label class="block text-sm font-medium">Tanggal Keluar SK Jabatan / Tanggal Awal</label>
                    <input v-model="form.stored_at" type="date" class="w-full rounded border p-2" />
                    <span v-if="form.errors.stored_at" class="text-sm text-red-500">{{ form.errors.stored_at }}</span>
                </div>
                <div>
                    <label class="block text-sm font-medium">File PDF</label>
                    <input
                        type="file"
                        accept="application/pdf"
                        @change="(e) => (form.pdf_file = (e.target as HTMLInputElement)?.files?.[0] || null)"
                    />
                    <span v-if="form.errors.pdf_file" class="text-sm text-red-500">{{ form.errors.pdf_file }}</span>
                </div>
                <div>
                    <div class="mb-6 flex items-center justify-between">
                        <button type="submit" class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">Simpan Arsip</button>

                        <a href="/arsip-pegawai" class="ml-3 rounded bg-gray-200 px-4 py-2 text-sm text-gray-800 shadow hover:bg-gray-300">
                            ⬅️ Kembali
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
