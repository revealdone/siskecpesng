<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { type BreadcrumbItem } from '@/types';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';

const props = defineProps<{
    summary: {
        total: number;
        expired: number;
        this_year: number;
    };
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Welcome Admin KECAMATAN PESANGGRAHAN',
        href: '/dashboard',
    },
];
</script>

<template>
    <Head title="Dashboard" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex flex-1 flex-col gap-4 rounded-xl p-4">
<div class="flex items-center gap-2">
    <Link
        href="/archives/create"
        class="bg-blue-600 text-white px-3 py-1.5 text-sm rounded hover:bg-blue-700"
    >
        + Tambah Arsip
    </Link>
    <Link
        href="/archives"
        class="bg-gray-200 text-gray-800 px-3 py-1.5 text-sm rounded hover:bg-gray-300"
    >
        🔍 Lihat / Cari Arsip
    </Link>
</div>
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div class="rounded-xl bg-white p-4 shadow dark:bg-gray-800">
                    <h3 class="text-sm text-gray-500">Total Arsip</h3>
                    <p class="text-2xl font-bold text-blue-600">{{ props.summary.total }}</p>
                </div>
                <div class="rounded-xl bg-white p-4 shadow dark:bg-gray-800">
                    <h3 class="text-sm text-gray-500">Arsip > 2 Tahun</h3>
                    <p class="text-2xl font-bold text-red-600">{{ props.summary.expired }}</p>
                </div>
                <div class="rounded-xl bg-white p-4 shadow dark:bg-gray-800">
                    <h3 class="text-sm text-gray-500">Arsip Tahun Ini</h3>
                    <p class="text-2xl font-bold text-green-600">{{ props.summary.this_year }}</p>
                </div>
            </div>
            <!-- <div class="grid auto-rows-min gap-4 md:grid-cols-3">
  <div class="rounded-xl bg-white p-4 shadow">
    <h3 class="text-sm text-gray-500">Total Arsip Pegawai</h3>
    <p class="text-2xl font-bold text-blue-600">{{ props.summary.total }}</p>
  </div>
  <div class="rounded-xl bg-white p-4 shadow">
    <h3 class="text-sm text-gray-500">Arsip Pegawai > 2 Tahun</h3>
    <p class="text-2xl font-bold text-red-600">{{ props.summary.expired }}</p>
  </div>
  <div class="rounded-xl bg-white p-4 shadow">
    <h3 class="text-sm text-gray-500">Arsip Pegawai Tahun Ini</h3>
    <p class="text-2xl font-bold text-green-600">{{ props.summary.this_year }}</p>
  </div>
</div> -->

            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                <p class="p-6 text-gray-500 dark:text-gray-300">Selamat datang di dashboard arsip.</p>
            </div>
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                <PlaceholderPattern />
            </div>
        </div>
    </AppLayout>
</template>