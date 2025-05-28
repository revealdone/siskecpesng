<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps<{
  pegawai: {
    nama: string;
    nrk: string;
    lokasi_rak: string;
    sk_cpns?: string | null;
    sk_pns?: string | null;
    sk_golongan?: string | null;
    sk_jabatan?: string | null;
    buku_nikah?: string | null;
    akte_kelahiran?: string | null;
    kartu_pegawai?: string | null;
    kartu_istri?: string | null;
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

// };

// Ubah label key menjadi format judul
function formatLabel(key: string): string {
  return key.replace(/_/g, ' ').replace(/\b\w/g, (l) => l.toUpperCase());
}
</script>

<template>
  <Head title="Detail Arsip Pegawai" />
  <AppLayout>
    <div class="p-6">
<div class="flex items-center justify-between mb-6">
  <h1 class="text-2xl font-bold">📁 Detail Arsip Pegawai</h1>
  <a
    href="/arsip-pegawai"
    class="bg-gray-200 hover:bg-gray-300 text-sm text-gray-800 px-3 py-1 rounded shadow"
  >
    ⬅️ Kembali
  </a>
</div>


      <!-- Info Pegawai -->
      <div class="grid md:grid-cols-2 gap-4 mb-6 text-gray-700">
        <div class="bg-white p-4 rounded-xl shadow-sm">
          <p class="font-semibold">Nama</p>
          <p>{{ pegawai.nama }}</p>
        </div>
        <div class="bg-white p-4 rounded-xl shadow-sm">
          <p class="font-semibold">NRK</p>
          <p>{{ pegawai.nrk }}</p>
        </div>
        <div class="bg-white p-4 rounded-xl shadow-sm">
          <p class="font-semibold">Lokasi Rak</p>
          <p>{{ pegawai.lokasi_rak }}</p>
        </div>
      </div>

      <!-- Berkas PDF -->
      <h2 class="text-xl font-semibold text-gray-800 mb-4">📎 Berkas PDF</h2>
      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
        <div
          v-for="(value, key) in pdfFields"
          :key="key"
          class="bg-white rounded-xl shadow-md p-4 hover:shadow-lg transition"
        >
          <div class="flex items-start space-x-2">
            <div class="text-blue-600 text-2xl">📄</div>
            <div>
              <p class="font-medium text-gray-800">{{ formatLabel(key) }}</p>
              <div v-if="value">
                <a
                  :href="`/storage/${value}`"
                  target="_blank"
                  class="text-sm text-blue-600 underline hover:text-blue-800"
                >
                  Preview / Download
                </a>
              </div>
              <div v-else class="text-sm text-gray-500">Tidak tersedia</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Jika semua file kosong -->
      <div
        v-if="Object.values(pdfFields).every((v) => !v)"
        class="text-gray-500 mt-6 text-center"
      >
        Tidak ada berkas PDF yang tersedia untuk pegawai ini.
      </div>
    </div>
  </AppLayout>
</template>
