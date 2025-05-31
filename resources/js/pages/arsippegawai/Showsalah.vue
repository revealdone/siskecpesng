<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps<{
    pegawai: {
        nama: string;
        nrk: string;
        lokasi_rak: string;
        jabatan?: string | null;
        keterangan?: string | null;
        tempattugas?: string | null;
        sk_cpns?: string | null;
        sk_pns?: string | null;
        sk_golongan?: string | null;
        sk_jabatan?: string | null;
        buku_nikah?: string | null;
        akte_kelahiran?: string | null;
        kartu_pegawai?: string | null;
        kartu_istri?: string | null;
        akte_suami?: string | null;
        akte_istri?: string | null;
        akte_anak_1?: string | null;
        akte_anak_2?: string | null;
        akte_anak_3?: string | null;
        akte_anak_4?: string | null;
        akte_anak_5?: string | null;
        // Tambahkan keterangan field jika ada!
        [key: string]: string | null | undefined;
    };
}>();

// Objek untuk daftar file PDF
const pdfFields = {
    sk_cpns: props.pegawai.sk_cpns,
    sk_pns: props.pegawai.sk_pns,
    sk_golongan: props.pegawai.sk_golongan,
    sk_jabatan: props.pegawai.sk_jabatan,
    buku_nikah: props.pegawai.buku_nikah,
    akte_suami: props.pegawai.akte_suami,
    akte_istri: props.pegawai.akte_istri,
    akte_anak1: props.pegawai.akte_anak_1,
    akte_anak2: props.pegawai.akte_anak_2,
    akte_anak3: props.pegawai.akte_anak_3,
    akte_anak4: props.pegawai.akte_anak_4,
    akte_anak5: props.pegawai.akte_anak_5,
    kartu_pegawai: props.pegawai.kartu_pegawai,
    kartu_istri: props.pegawai.kartu_istri,
};

// Objek untuk keterangan file PDF
// Misalnya field keterangan di-backend dinamai "keterangan_sk_cpns", dll.
const pdfKeteranganFields: { [key: string]: string | null } = {};
for (const key in pdfFields) {
    const keteranganKey = 'keterangan_' + key;
    pdfKeteranganFields[key] = props.pegawai[keteranganKey] ?? null;
}

// Ubah label key menjadi format judul
function formatLabel(key: string): string {
    return key.replace(/_/g, ' ').replace(/\b\w/g, (l) => l.toUpperCase());
}
</script>

<template>
    <Head title="Detail Arsip Pegawai" />
    <AppLayout>
        <div class="p-6">
            <div class="mb-6 flex items-center justify-between">
                <h1 class="text-2xl font-bold">📁 Detail Arsip Pegawai</h1>
                <a href="/arsip-pegawai" class="rounded bg-gray-200 px-3 py-1 text-sm text-gray-800 shadow hover:bg-gray-300"> ⬅️ Kembali </a>
            </div>

            <!-- Info Pegawai -->
            <div class="mb-6 grid gap-4 text-gray-700 md:grid-cols-2">
                <div class="rounded-xl bg-white p-4 shadow-sm">
                    <p class="font-semibold">Nama</p>
                    <p>{{ pegawai.nama }}</p>
                </div>
                <div class="rounded-xl bg-white p-4 shadow-sm">
                    <p class="font-semibold">NRK</p>
                    <p>{{ pegawai.nrk }}</p>
                </div>
                <div class="rounded-xl bg-white p-4 shadow-sm">
                    <p class="font-semibold">Lokasi Rak</p>
                    <p>{{ pegawai.lokasi_rak }}</p>
                </div>
                <div class="rounded-xl bg-white p-4 shadow-sm">
                    <p class="font-semibold">Tempat tugas</p>
                    <!-- <p class="text-sm text-gray-500">Contoh(Kelurahan Ulujami)</p> -->
                    <p>{{ pegawai.tempattugas }}</p>
                </div>
                <div class="rounded-xl bg-white p-4 shadow-sm">
                    <p class="font-semibold">Jabatan & Tanggal Menjabat</p>
                    <!-- <p class="text-sm text-gray-500">Contoh(Kasubbag Umum / 01/02/2025)</p> -->
                    <p>{{ pegawai.jabatan }}</p>
                </div>
                <div class="rounded-xl bg-white p-4 shadow-sm">
                    <p class="font-semibold">keterangan</p>
                    <!-- <p class="text-sm text-gray-500">Contoh(Kasubbag Umum / 01/02/2025)</p> -->
                    <p>{{ pegawai.keterangan }}</p>
                </div>
            </div>

            <!-- Berkas PDF -->
            <h2 class="mb-4 text-xl font-semibold text-gray-800">📎 Berkas PDF</h2>
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <div v-for="(value, key) in pdfFields" :key="key" class="rounded-xl bg-white p-4 shadow-md transition hover:shadow-lg">
                    <div class="flex items-start space-x-2">
                        <div class="text-2xl text-blue-600">📄</div>
                        <div>
                            <p class="font-medium text-gray-800">{{ formatLabel(key) }}</p>
                            <div v-if="value">
                                <a :href="`/storage/${value}`" target="_blank" class="text-sm text-blue-600 underline hover:text-blue-800">
                                    Preview / Download
                                </a>
                                <!-- Tampilkan keterangan -->
                                <p class="text-sm text-gray-600 italic">{{ props.pegawai.keterangan }}</p>

                                <div v-if="pdfKeteranganFields[key]" class="mt-1 text-sm text-gray-600 italic">
                                    {{ pdfKeteranganFields[key] }}
                                </div>
                            </div>
                            <div v-else class="text-sm text-gray-500">Tidak tersedia</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jika semua file kosong -->
            <div v-if="Object.values(pdfFields).every((v) => !v)" class="mt-6 text-center text-gray-500">
                Tidak ada berkas PDF yang tersedia untuk pegawai ini.
            </div>

            <!-- Tampilkan keterangan -->
            <!-- <div class="mt-1 text-sm text-gray-600 italic">
                {{ form['keterangan_' + key] ?? '-' }}
            </div> -->
        </div>
    </AppLayout>
</template>
