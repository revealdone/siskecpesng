<script setup lang="ts">
import { Head,  } from '@inertiajs/vue3';

</script>

<template>
    
    <Head title="Welcome" >
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
        <link rel="stylesheet" href="/asd.css" />
         <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    </Head>
    <div class="flex min-h-screen flex-col items-center bg-[#FDFDFC] p-6 text-[#1b1b18] dark:bg-[#0a0a0a] lg:justify-center lg:p-8" style="background-image: url('/jaksel1.jpeg')">
        <header class="not-has-[nav]:hidden mb-6 w-full max-w-[335px] text-sm lg:max-w-4xl">
            <!-- <nav class="flex items-center justify-end gap-4">
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                    class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                >
                    Dashboard
                </Link>
                <template v-else>
                    <Link
                        :href="route('login')"
                        class="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]"
                    >
                        Log in
                    </Link>
                    <Link
                        :href="route('register')"
                        class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                    >
                        Register
                    </Link>
                </template>
            </nav> -->
        <nav class="fixed top-0 left-0 w-full z-50 bg-white text-black px-4 py-3 shadow-md">
  <div class="max-w-6xl mx-auto flex items-center justify-between">
    <!-- Logo -->
    <div class="flex items-center">
      <img src="/jaksel.png" alt="Logo Jaksel" class="h-15 w-auto" />
    </div>

    <!-- Judul Tengah -->
    <div class="flex-1 text-center">
      <h1 class="text-lg font-bold font-[Montserrat]">Aplikasi Arsip Kec.PESANGGRAHAN</h1>
    </div>

    <!-- Login dan Register -->
    <div class="flex gap-2">
      <a href="/login" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded">Login</a>
      <a href="/register" class="bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded">Register</a>
    </div>
  </div>
</nav>
        </header>
<div class="mt-20 w-full max-w-6xl mx-auto">

      <div
        class="relative h-96 bg-cover bg-center"
        style="background-image: url('/upload/slide/202211041340-visi---misi.jpeg')"
      >
        <div class="absolute top-4 right-4 z-10">
          <a href="#cuaca-tomorrow">
            <img src="https://selatan.jakarta.go.id/public/assets/images/logo/cuaca.png" alt="Cuaca" class="w-12 h-12" />
          </a>
        </div>
        <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
          <div class="text-white text-center px-4 font-[Montserrat]">
            <h1 class="text-3xl font-bold">Sukses Jakarta Untuk Indonesia</h1>
          </div>
        </div>
      </div>
 
</div>


        <!-- <div class="h-14.5 hidden lg:block"></div> -->
         
    </div>
    <!--  -->

    <section class="partner-section">
        <div class="auto-container">
            <div class="sec-title with-separator centered">
                          <div class="text-black text-center px-4">
            <h1 class="text-3xl font-bold font-[Montserrat]">Partner Wilayah</h1>
          </div>
            <!-- <h2 class="ml-1 grid flex-1 text-left text-sm">Partner Wilayah</h2> -->
            <div class="separator">
                <span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span>
            </div>
        </div>

        <div class="partner-logos">
            <a href="https://jakarta.go.id" target="_blank">
                <img src="https://selatan.jakarta.go.id/public/assets/images/logo/jakarta-raya.png" alt="Jakarta Raya" loading="lazy">
            </a>
            <a href="https://pusat.jakarta.go.id" target="_blank">
                <img src="https://selatan.jakarta.go.id/public/assets/images/logo/jakarta-pusat.png" alt="Jakarta Pusat" loading="lazy">
            </a>
            <a href="https://timur.jakarta.go.id" target="_blank">
                <img src="https://selatan.jakarta.go.id/public/assets/images/logo/jakarta-timur.png" alt="Jakarta Timur" loading="lazy">
            </a>
            <a href="https://barat.jakarta.go.id" target="_blank">
                <img src="https://selatan.jakarta.go.id/public/assets/images/logo/jakarta-barat.png" alt="Jakarta Barat" loading="lazy">
            </a>
            <a href="https://utara.jakarta.go.id" target="_blank">
                <img src="https://selatan.jakarta.go.id/public/assets/images/logo/jakarta-utara.png" alt="Jakarta Utara" loading="lazy">
            </a>
            <a href="https://pulauseribu.jakarta.go.id" target="_blank">
                <img src="https://selatan.jakarta.go.id/public/assets/images/logo/kepulauan-seribu.png" alt="Kepulauan Seribu" loading="lazy">
            </a>
            <a href="https://satudata.jakarta.go.id" target="_blank">
                <img src="https://selatan.jakarta.go.id/public/assets/images/logo/satu-data2.png" alt="Satu Data Jakarta" loading="lazy">
            </a>
            <a href="https://jdih.kpu.go.id/dkijakarta/jaksel/profil" target="_blank">
                <img src="https://selatan.jakarta.go.id/public/assets/images/logo/kpu.png" alt="KPU" loading="lazy">
            </a>
            <a href="https://jdih.jakarta.go.id/Jakarta-Selatan" target="_blank">
                <img src="https://selatan.jakarta.go.id/public/assets/images/logo/jdih.png" alt="JDIH" loading="lazy">
            </a>
            <a href="https://pantaubanjir.jakarta.go.id/" target="_blank">
                <img src="https://selatan.jakarta.go.id/public/assets/images/logo/banjir.png" alt="Pantau Banjir Jakarta" loading="lazy">
            </a>
        </div>
    </div>
</section>

<!-- </section> -->

    <!--  -->
    <footer class="bg-[#111] text-[#999] text-sm font-[Montserrat] mt-10">
  <div class="max-w-7xl mx-auto px-4 py-10 text-center">
    <div class="flex flex-col items-center">
      <img src="/jaksel.png" loading="lazy" class="mb-4 w-70" />
      <div class="flex justify-center gap-4 mt-2">
        <a href="https://facebook.com/PemkotJakartaSelatan" target="_blank" class="text-white hover:text-blue-500"><i class="fab fa-facebook-f"></i></a>
        <a href="https://twitter.com/kotajaksel" target="_blank">
          <img src="https://selatan.jakarta.go.id/public/assets/images/icons/twitter-x-footer.png" alt="X" class="w-4 h-4 mt-1" loading="lazy" />
        </a>
        <a href="https://www.youtube.com/KominfotikJaksel" target="_blank" class="text-white hover:text-red-500"><i class="fab fa-youtube"></i></a>
        <a href="https://www.instagram.com/kotajakartaselatan/" target="_blank" class="text-white hover:text-pink-500"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </div>

  <div class="border-t border-[#333] py-10">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 text-left">
      <div>
        <h4 class="text-white font-semibold mb-2">Pelayanan Informasi</h4>
        <p>Pelayanan sistem informasi Smart Goverment menjadi kebutuhan pemerintah untuk memberikan informasi cepat, efektif dan efisien.</p>
      </div>
      <div>
        <h4 class="text-white font-semibold mb-2">Alamat</h4>
        <p>
          <a href="https://goo.gl/maps/1nXvQyajCZfXauPe7" target="_blank" class="hover:underline">
            Jl. Prapanca Raya No. 9, Kebayoran Baru, Jakarta Selatan, DKI Jakarta, 12170.
          </a>
        </p>
      </div>
      <div>
        <h4 class="text-white font-semibold mb-2">Kontak</h4>
        <ul>
          <li>(021) 727-866-29</li>
          <li><a href="mailto:walikota-jaksel@jakarta.go.id" class="hover:underline">walikota-jaksel@jakarta.go.id</a></li>
        </ul>
      </div>
      <div>
        <h4 class="text-white font-semibold mb-2">Jam Operasional</h4>
        <ul>
          <li>Senin - Jumat (07.30 - 16.00)</li>
          <li>Sabtu - Minggu (Tutup)</li>
        </ul>
      </div>
    </div>
  </div>

  <div class="bg-[#0a0a0a] text-center py-4 text-xs">
    Hak Cipta © 2025 <span class="text-white font-semibold">Pemerintah Kota Administrasi Jakarta Selatan</span>
  </div>
</footer>

</template>
