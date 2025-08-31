<div id="tentang-kami" class="w-full md:h-screen">
  {{-- HERO --}}
  <div class="relative w-full bg-gradient-to-br from-[#030c1a] to-[#0a4d78] overflow-hidden">
    <div class="absolute inset-0 bg-[url('{{ asset('img/aset/bgnav.png') }}')] bg-cover bg-center opacity-10"></div>
    <div class="relative z-10 max-w-3xl mx-auto px-4 py-12 md:py-16 text-center">
      <div class="space-y-6">
        <h2 class="font-bold text-2xl md:text-[42px] text-text-primary leading-tight">
          Sangat Mudah Untuk Bergabung dan Berkolaborasi Bersama
        </h2>
        <p class="text-text-primary/90 max-w-2xl mx-auto text-sm md:text-lg">
          Mulailah dengan mendaftarkan diri anda, dan nikmati perjalanan menuju digitalisasi bersama kami.
        </p>
        <div class="pt-4">
          <a href="/admin" class="inline-flex items-center px-6 py-3 text-sm font-semibold bg-secondary rounded-full shadow-xl text-text-primary transform transition duration-300 ease-in-out hover:bg-text-primary hover:text-primary hover:scale-105 hover:-translate-y-1 hover:shadow-2xl group">
            Daftar Sekarang
          </a>
        </div>
      </div>
    </div>
  </div>
  

  {{-- DETAIL --}}
  <div class="py-4 px-4 md:py-8 md:px-13 h-[50%]">
    <hr class="mb-10 mt-6 border-t border-primary">
    <div class="max-w-6xl mx-auto">
      <div class="flex flex-col md:flex-row gap-8 text-text-light">
        <!-- Kolom 1: Kontak -->
        <div class="md:w-1/3">
          <h3 class="text-md md:text-xl font-bold mb-4 text-text-secondary">HIMA TI.</h3>
          <address class="not-italic">
            <p class="text-xs md:text-lg mb-2 leading-8 max-w-[70%] hover:underline"> <a href="https://maps.app.goo.gl/CKTYSW3dYXXKwwoU9" target="_blank">Jalan Cipto Mangunkusumo Kampus Gunung Panjang Samarinda 75131</a></p>
            <p class="text-xs md:text-lg lowercase text-primary hover:underline"><a href="mailto:himati@polnes.ac.id">himati@polnes.ac.id</a></p>
          </address>
        </div>
  
        <!-- Kolom 2: Layanan -->
        <div class="md:w-1/3">
          <h3 class="text-sm md:text-lg font-bold mb-4">Layanan</h3>
          <ul class="space-y-2 text-xs md:text-lg">
            <li><a href="/admin/pengaduans">Advokasi</a></li>
            <li><a href="/admin/penyewaans">Penyewaan Inventaris</a></li>
            <li><a href="/admin/pengajuan-surats">Pembuatan Surat</a></li>
            <li><a href="/admin/kegiatans">Penjadwalan Kegiatan</a></li>
          </ul>
        </div>
  
        <!-- Kolom 3: Tentang Kami -->
        <div class="md:w-1/3">
          <h3 class="font-bold mb-4 text-sm md:text-lg">Tentang Kami</h3>
          <ul class="space-y-2 text-xs md:text-lg">
            <li>Kontak</li>
            <li>Kerjasama</li>
          </ul>
        </div>
      </div>
    </div>
</div>