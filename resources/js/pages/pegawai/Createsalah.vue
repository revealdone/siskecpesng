<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

type FileKeteranganPair = {
    file: File | null;
    keterangan: string;
};

type PegawaiForm = {
    nrk: string;
    nama: string;
    jabatan: string;
    tempattugas: string;
    lokasi_rak: string;

    // file + keterangan
    sk_cpns: File | null;
    sk_cpns_keterangan: string;
    sk_pns: File | null;
    sk_pns_keterangan: string;
    sk_golongan: File | null;
    sk_golongan_keterangan: string;
    sk_jabatan: File | null;
    sk_jabatan_keterangan: string;
    buku_nikah: File | null;
    buku_nikah_keterangan: string;
    kartu_pegawai: File | null;
    kartu_pegawai_keterangan: string;
    kartu_istri: File | null;
    kartu_istri_keterangan: string;
    akte_suami: File | null;
    akte_suami_keterangan: string;
    akte_istri: File | null;
    akte_istri_keterangan: string;
    akte_anak_1: File | null;
    akte_anak_1_keterangan: string;
    akte_anak_2: File | null;
    akte_anak_2_keterangan: string;
    akte_anak_3: File | null;
    akte_anak_3_keterangan: string;
    akte_anak_4: File | null;
    akte_anak_4_keterangan: string;
    akte_anak_5: File | null;
    akte_anak_5_keterangan: string;
    [key: string]: any;
};

const form = useForm<PegawaiForm>({
    nrk: '',
    nama: '',
    jabatan: '',
    tempattugas: '',
    lokasi_rak: '',
    sk_cpns: null,
    sk_cpns_keterangan: '',
    sk_pns: null,
    sk_pns_keterangan: '',
    sk_golongan: null,
    sk_golongan_keterangan: '',
    sk_jabatan: null,
    sk_jabatan_keterangan: '',
    buku_nikah: null,
    buku_nikah_keterangan: '',
    kartu_pegawai: null,
    kartu_pegawai_keterangan: '',
    kartu_istri: null,
    kartu_istri_keterangan: '',
    akte_suami: null,
    akte_suami_keterangan: '',
    akte_istri: null,
    akte_istri_keterangan: '',
    akte_anak_1: null,
    akte_anak_1_keterangan: '',
    akte_anak_2: null,
    akte_anak_2_keterangan: '',
    akte_anak_3: null,
    akte_anak_3_keterangan: '',
    akte_anak_4: null,
    akte_anak_4_keterangan: '',
    akte_anak_5: null,
    akte_anak_5_keterangan: '',
});

function handleFileChange(e: Event, field: keyof PegawaiForm) {
    const target = e.target as HTMLInputElement;
    if (target?.files?.length) {
        form[field] = target.files[0] as never;
    }
}

function submit() {
    const payload = new FormData();
    payload.append('nrk', form.nrk);
    payload.append('nama', form.nama);
    payload.append('jabatan', form.jabatan);
    payload.append('tempattugas', form.tempattugas);
    payload.append('lokasi_rak', form.lokasi_rak);

    const fileKeteranganPairs: { file: keyof PegawaiForm; keterangan: keyof PegawaiForm }[] = [
        { file: 'sk_cpns', keterangan: 'sk_cpns_keterangan' },
        { file: 'sk_pns', keterangan: 'sk_pns_keterangan' },
        { file: 'sk_golongan', keterangan: 'sk_golongan_keterangan' },
        { file: 'sk_jabatan', keterangan: 'sk_jabatan_keterangan' },
        { file: 'buku_nikah', keterangan: 'buku_nikah_keterangan' },
        { file: 'kartu_pegawai', keterangan: 'kartu_pegawai_keterangan' },
        { file: 'kartu_istri', keterangan: 'kartu_istri_keterangan' },
        { file: 'akte_suami', keterangan: 'akte_suami_keterangan' },
        { file: 'akte_istri', keterangan: 'akte_istri_keterangan' },
        { file: 'akte_anak_1', keterangan: 'akte_anak_1_keterangan' },
        { file: 'akte_anak_2', keterangan: 'akte_anak_2_keterangan' },
        { file: 'akte_anak_3', keterangan: 'akte_anak_3_keterangan' },
        { file: 'akte_anak_4', keterangan: 'akte_anak_4_keterangan' },
        { file: 'akte_anak_5', keterangan: 'akte_anak_5_keterangan' },
    ];

    fileKeteranganPairs.forEach(({ file, keterangan }) => {
        const fileData = form[file];
        const ketData = form[keterangan];
        payload.append(keterangan.toString(), ketData ?? '');
        if (fileData instanceof File) {
            payload.append(file.toString(), fileData);
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
            <h2 class="text-lg font-bold">Tambah Arsip Pegawai</h2>

            <input v-model="form.nrk" type="text" placeholder="NRK" class="w-full rounded border px-3 py-2" />
            <input v-model="form.nama" type="text" placeholder="Nama" class="w-full rounded border px-3 py-2" />
            <input v-model="form.jabatan" type="text" placeholder="Jabatan" class="w-full rounded border px-3 py-2" />
            <input v-model="form.tempattugas" type="text" placeholder="Tempat Tugas" class="w-full rounded border px-3 py-2" />
            <input v-model="form.lokasi_rak" type="text" placeholder="Lokasi Rak" class="w-full rounded border px-3 py-2" />

            <div class="grid grid-cols-1 gap-4">
                <div
                    v-for="field in [
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
                    ]"
                    :key="field"
                    class="rounded border p-2"
                >
                    <label class="block text-sm capitalize">{{ field.replace('_', ' ') }}</label>
                    <input type="file" @change="(e) => handleFileChange(e, field as keyof PegawaiForm)" class="mb-1" />
                    <input
                        v-model="form[field + '_keterangan']"
                        type="text"
                        placeholder="Keterangan untuk {{ field.replace('_', ' ') }}"
                        class="w-full rounded border px-3 py-1 text-sm"
                    />
                </div>
            </div>

            <button type="submit" class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">Simpan</button>
        </form>
    </AppLayout>
</template>
