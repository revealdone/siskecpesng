<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, router, useForm } from '@inertiajs/vue3';

const props = defineProps<{ pegawai: any }>();

type PegawaiForm = {
    nrk: string;
    nama: string;
    lokasi_rak: string;
    sk_cpns: File | null;
    sk_pns: File | null;
    sk_golongan: File | null;
    sk_jabatan: File | null;
    buku_nikah: File | null;
    akte_suami: File | null;
    akte_istri: File | null;
    akte_anak_1: File | null;
    akte_anak_2: File | null;
    akte_anak_3: File | null;
    akte_anak_4: File | null;
    akte_anak_5: File | null;
    kartu_pegawai: File | null;
    kartu_istri: File | null;
};

const form = useForm<PegawaiForm>({
    nrk: props.pegawai.nrk,
    nama: props.pegawai.nama,
    lokasi_rak: props.pegawai.lokasi_rak,
    sk_cpns: null,
    sk_pns: null,
    sk_golongan: null,
    sk_jabatan: null,
    buku_nikah: null,
    akte_suami: null,
    akte_istri: null,
    akte_anak_1: null,
    akte_anak_2: null,
    akte_anak_3: null,
    akte_anak_4: null,
    akte_anak_5: null,
    kartu_pegawai: null,
    kartu_istri: null,
});

function handleFileChange(e: Event, field: keyof PegawaiForm) {
    const target = e.target as HTMLInputElement;
    if (target?.files?.[0]) {
        form[field] = target.files[0] as never;
    }
}

function submit() {
    const payload = new FormData();
    payload.append('_method', 'PUT');
    payload.append('nrk', form.nrk);
    payload.append('nama', form.nama);
    payload.append('lokasi_rak', form.lokasi_rak);

    const fileFields: (keyof PegawaiForm)[] = [
        'sk_cpns',
        'sk_pns',
        'sk_golongan',
        'sk_jabatan',
        'buku_nikah',
        'kartu_pegawai',
        'kartu_istri',
        'akte_suami',
        'akte_istri',
        'akte_anak_1',
        'akte_anak_2',
        'akte_anak_3',
        'akte_anak_4',
        'akte_anak_5',
    ];

    fileFields.forEach((field) => {
        if (form[field]) {
            payload.append(field, form[field] as Blob);
        }
    });

    router.post(`/arsip-pegawai/${props.pegawai.id}`, payload, {
        forceFormData: true,
        preserveScroll: true,
    });

    // form.post(`/arsip-pegawai/${props.pegawai.id}`, {
    //   method: 'put', // atau 'patch'
    //   forceFormData: true,
    //   preserveScroll: true,
    //   // data: payload,
    // });
}
</script>

<template>
    <Head title="Edit Arsip Pegawai" />
    <AppLayout>
        <div class="mx-auto max-w-4xl space-y-6 rounded bg-white p-6 shadow">
            <div class="flex items-center justify-between">
                <h1 class="text-xl font-bold">✏️ Edit Arsip Pegawai</h1>
                <a href="/arsip-pegawai" class="text-sm text-gray-600 hover:underline">⬅️ Kembali</a>
            </div>

            <form @submit.prevent="submit" class="space-y-4">
                <input v-model="form.nrk" type="text" placeholder="NRK" class="w-full rounded border px-3 py-2" />
                <input v-model="form.nama" type="text" placeholder="Nama" class="w-full rounded border px-3 py-2" />
                <input v-model="form.lokasi_rak" type="text" placeholder="Lokasi Rak" class="w-full rounded border px-3 py-2" />

                <div class="grid grid-cols-2 gap-4">
                    <div
                        v-for="field in ['sk_cpns', 'sk_pns', 'sk_golongan', 'sk_jabatan', 'buku_nikah', 'kartu_pegawai', 'kartu_istri']"
                        :key="field"
                    >
                        <label class="block text-sm capitalize">{{ field.replace('_', ' ') }}</label>
                        <input type="file" @change="(e) => handleFileChange(e, field as keyof PegawaiForm)" />
                        <div v-if="props.pegawai[field]" class="mt-1 text-xs text-gray-500">
                            <a :href="`/storage/${props.pegawai[field]}`" target="_blank" class="text-blue-500 underline">Lihat File Lama</a>
                        </div>
                    </div>

                    <!-- Akte -->
                    <div
                        v-for="field in ['akte_suami', 'akte_istri', 'akte_anak_1', 'akte_anak_2', 'akte_anak_3', 'akte_anak_4', 'akte_anak_5']"
                        :key="field"
                    >
                        <label class="block text-sm capitalize">{{ field.replace('_', ' ') }}</label>
                        <input type="file" @change="(e) => handleFileChange(e, field as keyof PegawaiForm)" />
                        <div v-if="props.pegawai[field]" class="mt-1 text-xs text-gray-500">
                            <a :href="`/storage/${props.pegawai[field]}`" target="_blank" class="text-blue-500 underline">Lihat File Lama</a>
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="rounded bg-green-600 px-4 py-2 text-white hover:bg-green-700">💾 Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
