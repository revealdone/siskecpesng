<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

type PegawaiForm = {
    nrk: string;
    nama: string;
    jabatan: string;
    tempattugas: string;
    lokasi_rak: string;
    keterangan: string;
    sk_cpns: File | null;
    sk_pns: File | null;
    sk_golongan: File | null;
    // sk_jabatan: File | null;
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
    nrk: '',
    nama: '',
    jabatan: '',
    tempattugas: '',
    keterangan: '',
    lokasi_rak: '',
    sk_cpns: null,
    sk_pns: null,
    sk_golongan: null,
    // sk_jabatan: null,
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
    if (target?.files?.length) {
        const file = target.files[0];

        // Pastikan field tersebut memang bertipe File | null
        if (typeof form[field] !== 'string') {
            form[field] = file as never; // paksa assign karena TypeScript belum bisa infer dengan sempurna
        }
    }
}

function submit() {
    const payload = new FormData();
    payload.append('nrk', form.nrk);
    payload.append('nama', form.nama);
    payload.append('lokasi_rak', form.lokasi_rak);
    payload.append('jabatan', form.jabatan);
    payload.append('tempattugas', form.tempattugas);
    payload.append('keterangan', form.keterangan);

    const fileFields: (keyof PegawaiForm)[] = [
        'sk_cpns',
        'sk_pns',
        // 'jabatan',
        'sk_golongan',
        // 'sk_jabatan',
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
        const file = form[field];
        if (file instanceof File) {
            payload.append(field, file);
        }
    });

    form.post('/arsip-pegawai', {
        forceFormData: true,
        onSuccess: () => {
            console.log('Data pegawai berhasil dikirim');
        },
    });
}
</script>

<template>
    <Head title="Tambah Arsip Pegawai" />
    <AppLayout>
        <form @submit.prevent="submit" class="space-y-4 rounded bg-white p-6 shadow">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-bold">Tambah Arsip Pegawai</h2>
                <a href="/arsip-pegawai" class="text-sm text-gray-600 hover:underline">⬅️ Kembali</a>
            </div>
            <input v-model="form.nrk" type="text" placeholder="NRK" class="w-full rounded border px-3 py-2" />
            <input v-model="form.nama" type="text" placeholder="Nama" class="w-full rounded border px-3 py-2" />
            <input
                v-model="form.jabatan"
                type="text"
                placeholder="Jabatan/Tanggal Awal Menjabat (Kasubbag Umum / 02/02/2025)"
                class="w-full rounded border px-3 py-2"
            />
            <input
                v-model="form.tempattugas"
                type="text"
                placeholder="Tempat Tugas / Contoh(Kelurahan Ulujami)"
                class="w-full rounded border px-3 py-2"
            />
            <input v-model="form.lokasi_rak" type="text" placeholder="Lokasi Rak" class="w-full rounded border px-3 py-2" />
            <!-- <input v-model="form.keterangan" type="text" placeholder="keterangan" class="w-full rounded border px-3 py-2" /> -->

            <div class="grid grid-cols-2 gap-4">
                <div v-for="field in ['sk_cpns', 'sk_pns', 'sk_golongan', 'buku_nikah', 'kartu_pegawai', 'kartu_istri']" :key="field">
                    <label class="block text-sm capitalize">{{ field.replace('_', ' ') }}</label>
                    <input type="file" @change="(e) => handleFileChange(e, field as keyof PegawaiForm)" />
                </div>

                <!-- Akte Kelahiran (multi file) -->
                <!-- Akte Kelahiran -->
                <!-- Akte Kelahiran -->
                <div>
                    <label class="block text-sm">Akte Kelahiran Suami</label>
                    <input type="file" @change="(e) => handleFileChange(e, 'akte_suami')" />
                </div>
                <div>
                    <label class="block text-sm">Akte Kelahiran Istri</label>
                    <input type="file" @change="(e) => handleFileChange(e, 'akte_istri')" />
                </div>
                <!-- <div>
                    <label class="block text-sm">Sk Jabatan</label>
                    <input v-model="form.keterangan" type="text" placeholder="keterangan" class="w-full rounded border px-3 py-2" />
                    <input type="file" @change="(e) => handleFileChange(e, 'sk_jabatan')" />
                    <input v-model="form.keterangan" type="text" placeholder="keterangan" class="w-full rounded border px-3 py-2" />
                    <input type="file" @change="(e) => handleFileChange(e, 'sk_jabatan')" />
                    <input v-model="form.keterangan" type="text" placeholder="keterangan" class="w-full rounded border px-3 py-2" />
                    <input type="file" @change="(e) => handleFileChange(e, 'sk_jabatan')" />
                    <input v-model="form.keterangan" type="text" placeholder="keterangan" class="w-full rounded border px-3 py-2" />
                    <input type="file" @change="(e) => handleFileChange(e, 'sk_jabatan')" />
                </div> -->
                <div>
                    <label class="block text-sm">Akte Kelahiran Anak 1</label>
                    <input type="file" @change="(e) => handleFileChange(e, 'akte_anak_1')" />
                </div>
                <div>
                    <label class="block text-sm">Akte Kelahiran Anak 2</label>
                    <input type="file" @change="(e) => handleFileChange(e, 'akte_anak_2')" />
                </div>
                <div>
                    <label class="block text-sm">Akte Kelahiran Anak 3</label>
                    <input type="file" @change="(e) => handleFileChange(e, 'akte_anak_3')" />
                </div>
                <div>
                    <label class="block text-sm">Akte Kelahiran Anak 4</label>
                    <input type="file" @change="(e) => handleFileChange(e, 'akte_anak_4')" />
                </div>
                <div>
                    <label class="block text-sm">Akte Kelahiran Anak 5</label>
                    <input type="file" @change="(e) => handleFileChange(e, 'akte_anak_5')" />
                </div>
            </div>

            <button type="submit" class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">Simpan</button>
        </form>
    </AppLayout>
</template>
