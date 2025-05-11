<div id="tentang-kami" class="w-full md:h-screen p-5 md:px-20 md:py-10 ">
  {{-- HERO --}}
  <div class="flex items-center justify-center  rounded  md:h-[50%] text-text-primary text-center p-5 md:py-10 " style="background-image: url('{{ asset('img/aset/bgnav.png') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <div class="max-w-2xl mx-auto text-center"> <!-- Container pembatas lebar -->
      <p class="capitalize font-bold text-xl md:text-[40px] mb-3 leading-tight">Sangat mudah untuk bergabung bersama kami</p>
      <p class="capitalize mb-5 line-clamp-3">Mulailah dengan mendaftarkan diri anda, dan nikmati perjalanan menuju digitalisasi bersama kami.</p>
      <a href="/admin" class="inline-block btn bg-secondary rounded px-2 py-1 md:px-4 md:py-2 shadow-xl text-text-primary hover:bg-text-primary hover:text-primary transition-colors duration-200">daftar sekarang</a>
    </div>
  </div>

  {{-- DETAIL --}}
  <div class="py-4 px-4 md:py-8 md:px-13 h-[50%]">
    <hr class="mb-10 mt-6 border-t border-primary">
    <div class="max-w-6xl mx-auto">
      <div class="flex flex-col md:flex-row gap-8 text-text-light">
        <!-- Kolom 1: Kontak -->
        <div class="md:w-1/3">
          <h3 class="text-xl font-bold mb-4 text-text-secondary">HIMA TI.</h3>
          <address class="not-italic">
            <p class="mb-2 leading-8 max-w-[70%] hover:underline"> <a href="https://maps.app.goo.gl/CKTYSW3dYXXKwwoU9" target="_blank">Jalan Cipto Mangunkusumo Kampus Gunung Panjang Samarinda 75131</a></p>
            {{-- <p class="mb-2">Kampus Gunung Panjang</p>
            <p class="mb-4">Samarinda 75131</p> --}}
            <p class="lowercase text-primary hover:underline"><a href="mailto:himati@polnes.ac.id">himati@polnes.ac.id</a></p>
          </address>
        </div>
  
        <!-- Kolom 2: Layanan -->
        <div class="md:w-1/3">
          <h3 class="font-bold mb-4">Layanan</h3>
          <ul class="space-y-2">
            <li><a href="/admin/pengaduans">Advokasi</a></li>
            <li><a href="/admin/penyewaans">Penyewaan Inventaris</a></li>
            <li><a href="/admin/pengajuan-surats">Pembuatan Surat</a></li>
            <li><a href="/admin/kegiatans">Penjadwalan Kegiatan</a></li>
          </ul>
        </div>
  
        <!-- Kolom 3: Tentang Kami -->
        <div class="md:w-1/3">
          <h3 class="font-bold mb-4">Tentang Kami</h3>
          <ul class="space-y-2">
            <li>Kontak</li>
            <li>Kerjasama</li>
          </ul>
        </div>
      </div>
    </div>
</div>