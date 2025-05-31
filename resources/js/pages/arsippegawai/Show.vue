<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import dayjs from 'dayjs';
import { computed, onMounted, ref } from 'vue';

const props = defineProps<{
    archives1: {
        id: number;
        title: string;
        physical_location: string;
        stored_at: string;
        pdf_path: string;
    }[];
    archives2: {
        id: number;
        title: string;
        physical_location: string;
        stored_at: string;
        pdf_path: string;
    }[];
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
        // sk_jabatan?: string | null;
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
        // sk_jabatan_1?: string | null;
        // keterangan_sk_jabatan_1?: string | null;
    };
}>();

// Objek untuk daftar file PDF
// const pdfFields = {
//   sk_cpns: props.pegawai.sk_cpns,
//   sk_pns: props.pegawai.sk_pns,
//   sk_golongan: props.pegawai.sk_golongan,
//   sk_jabatan: props.pegawai.sk_jabatan,
//   buku_nikah: props.pegawai.buku_nikah,
//   akte_kelahiran: props.pegawai.akte_kelahiran,
//   kartu_pegawai: props.pegawai.kartu_pegawai,
//   kartu_istri: props.pegawai.kartu_istri,
const pdfFields = {
    // sk_jabatan_1: {
    //     file: props.pegawai.sk_jabatan_1,
    //     keterangan: props.pegawai.keterangan_sk_jabatan_1,
    // },
    // sk_jabatan_1: props.pegawai.sk_jabatan_1,
    sk_cpns: props.pegawai.sk_cpns,
    // jabatan: props.pegawai.jabatan,
    // tempattugas: props.pegawai.tempattugas,
    sk_pns: props.pegawai.sk_pns,
    sk_golongan: props.pegawai.sk_golongan,
    // sk_jabatan: props.pegawai.sk_jabatan,
    kartu_pegawai: props.pegawai.kartu_pegawai,
    kartu_istri: props.pegawai.kartu_istri,
    buku_nikah: props.pegawai.buku_nikah,
    akte_suami: props.pegawai.akte_suami,
    akte_istri: props.pegawai.akte_istri,
    akte_anak1: props.pegawai.akte_anak_1,
    akte_anak2: props.pegawai.akte_anak_2,
    akte_anak3: props.pegawai.akte_anak_3,
    akte_anak4: props.pegawai.akte_anak_4,
    akte_anak5: props.pegawai.akte_anak_5,
};

const search = ref('');
const archives1 = props.archives1;
const archives2 = props.archives2;
const arsipPegawai = props.pegawai;
onMounted(() => {
    // Saat halaman dimuat, kolom search otomatis terisi dengan nrk
    search.value = arsipPegawai.nrk;
});

// Filtering
const filteredArchives1 = computed(() => {
    return archives1.filter(
        (archive1) =>
            archive1.physical_location.toLowerCase().includes(search.value.toLowerCase()) ||
            archive1.title.toLowerCase().includes(search.value.toLowerCase()) ||
            archive1.pdf_path.toLowerCase().includes(search.value.toLowerCase()),
    );
});
// Filtering
const filteredArchives2 = computed(() => {
    return archives2.filter(
        (archive) =>
            archive.physical_location.toLowerCase().includes(search.value.toLowerCase()) ||
            archive.title.toLowerCase().includes(search.value.toLowerCase()) ||
            archive.pdf_path.toLowerCase().includes(search.value.toLowerCase()),
    );
});

// const filteredArchives1 = computed(() => {
//     return props.archives1.filter(
//         (archive) =>
//             archive.title.toLowerCase().includes(search.value.toLowerCase()) || archive.pdf_path.toLowerCase().includes(search.value.toLowerCase()),
//     );
// });

const isExpired = (date: string) => {
    return dayjs().diff(dayjs(date), 'year') >= 2;
};

const deleteArchive1 = (id: number) => {
    if (confirm('Yakin ingin menghapus arsip ini?')) {
        router.delete(`/archives1/${id}`);
    }
};

const deleteArchive2 = (id: number) => {
    if (confirm('Yakin ingin menghapus arsip ini?')) {
        router.delete(`/archives1/${id}`);
    }
};

// Ubah label key menjadi format judul
function formatLabel(key: string): string {
    return key.replace(/_/g, ' ').replace(/\b\w/g, (l) => l.toUpperCase());
}
</script>

<template>
    <Head title="Detail Arsip Pegawai" />
    <AppLayout>
        <div class="p-6">
            <div class="mb-6 flex items-center">
                <h1 class="text-2xl font-bold">📁 Detail Arsip Pegawai</h1>
                <a href="/archives1/create" class="ml-50 rounded bg-blue-600 px-3 py-1 text-sm text-white hover:bg-blue-700"> + Tambah Sk Jabatan </a>
                <a href="/archives2/create" class="ml-3 rounded bg-blue-600 px-3 py-1 text-sm text-white hover:bg-blue-700">
                    + Tambah Sertifikat Diklat
                </a>
                <a href="/arsip-pegawai" class="ml-30 rounded bg-gray-200 px-3 py-1 text-sm text-gray-800 shadow hover:bg-gray-300"> ⬅️ Kembali </a>
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
                <!-- <div class="rounded-xl bg-white p-4 shadow-sm">
                    <p class="font-semibold">keterangan</p>
                    <p class="text-sm text-gray-500">Contoh(Kasubbag Umum / 01/02/2025)</p>
                    <p>{{ pegawai.keterangan }}</p>
                </div> -->
            </div>

            <!-- Berkas PDF -->
            <h2 class="mb-4 text-xl font-semibold text-gray-800">📎 Berkas PDF</h2>
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <div v-for="(value, key) in pdfFields" :key="key" class="rounded-xl bg-white p-4 shadow-md transition hover:shadow-lg">
                    <div class="flex items-start space-x-2">
                        <div class="text-2xl text-blue-600">📄</div>
                        <div>
                            <!-- <p v-if="pegawai.keterangan" class="text-sm text-gray-600 italic">Keterangan: {{ pegawai.keterangan_sk_jabatan_1 }}</p> -->
                            <p class="font-medium text-gray-800">{{ formatLabel(key) }}</p>
                            <div v-if="value">
                                <a :href="`/storage/${value}`" target="_blank" class="text-sm text-blue-600 underline hover:text-blue-800">
                                    Preview / Download
                                </a>
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
            <!-- daf -->
            <div class="space-y-4 p-4">
                <div class="flex items-center justify-between">
                    <!-- <div class="mb-6 flex items-center justify-between">
                        <h2 class="text-2xl font-semibold">Daftar Arsip</h2>
                        <a href="/dashboard" class="ml-3 rounded bg-gray-200 px-3 py-1 text-sm text-gray-800 shadow hover:bg-gray-300">
                            ⬅️ Kembali
                        </a>
                    </div> -->

                    <input v-model="search" id="search-input" placeholder="Cari judul arsip..." class="rounded border p-2" />
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full rounded border border-gray-300 shadow-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left">SK Jabatan</th>
                                <th class="px-4 py-2 text-left">Nrk</th>
                                <th class="px-4 py-2 text-left">Tanggal Awal Menjabat</th>
                                <th class="px-4 py-2 text-left">Status</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="a in filteredArchives1" :key="a.id" class="border-t">
                                <td class="px-4 py-2">{{ a.title }}</td>
                                <td class="px-4 py-2">{{ a.physical_location }}</td>
                                <td class="px-4 py-2">{{ dayjs(a.stored_at).format('DD MMM YYYY') }}</td>
                                <td class="px-4 py-2">
                                    <span v-if="isExpired(a.stored_at)" class="font-bold text-red-600">> 2 Tahun</span>
                                    <span v-else class="text-green-600">Aktif</span>
                                </td>
                                <td class="px-4 py-2 text-center">
                                    <a :href="`/storage/${a.pdf_path}`" target="_blank" class="mr-2 text-blue-600 underline">Lihat</a>
                                    <button @click="deleteArchive1(a.id)" class="text-red-600 underline">Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- daf 2 -->
            <div class="space-y-4 p-4">
                <div class="flex items-center justify-between">
                    <!-- <div class="mb-6 flex items-center justify-between">
                        <h2 class="text-2xl font-semibold">Daftar Arsip</h2>
                        <a href="/dashboard" class="ml-3 rounded bg-gray-200 px-3 py-1 text-sm text-gray-800 shadow hover:bg-gray-300">
                            ⬅️ Kembali
                        </a>
                    </div> -->

                    <input v-model="search" id="search-input2" placeholder="Cari judul arsip..." class="rounded border p-2" />
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full rounded border border-gray-300 shadow-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left">Ket Diklat</th>
                                <th class="px-4 py-2 text-left">Nrk</th>
                                <th class="px-4 py-2 text-left">Tanggal Diklat dilaksanakan</th>
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
        </div>
    </AppLayout>
</template>
