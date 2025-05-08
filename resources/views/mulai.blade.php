<x-layout>

  {{-- HERO --}}
  <div class="w-full h-screen font-display" style="background-image: url('{{ asset('img/aset/bgnav.png') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <x-navbar></x-navbar>
    <div class="flex flex-col justify-center items-center text-center text-sm md:text-base space-y-8 mt-[25%] md:mt-[5%]">
      <p class="bg-white/20 backdrop-blur-md border border-white/30 pl-4 pr-4 pt-1 pb-1 rounded-4xl shadow-md text-text-primary">Mengumumkan Produk Beta Kami</p>
      <p class="font-[700] text-xl md:text-[48px]/15 w-[80%] md:w-[85%] text-text-primary ">Kelola Kebutuhanmu Dengan Mudah Dari Penyewaan Inventaris, Advokasi, Hingga Pembuatan Surat Dan Jadwal Kegiatan. Semua Dalam Satu Platform Terintegrasi.</p>
      <p class="w-[70%] md:w-['60%'] text-text-primary">Bersama HMJ TI, Wujudkan Organisasi Yang Aktif, Transparan, Dan Modern.</p>
      <a href="#" class="btn bg-secondary rounded pl-4 pr-4 pt-1 pb-1 shadow-xl text-text-primary">Mulai Petualangan</a>
    </div>
  </div>

  {{-- PROMOTION --}}
  <div class="bg-base p-20 w-full">
    <div class="md:flex text-center relative">
      <div class="absolute left-1/2 top-0 h-full md:border-l-2 border-dashed border-text-secondary"></div>
      <div class="md:w-1/2 pb-10 md:pr-10">
        <p class="font-bold text-9xl pb-4">200<sup class="text-4xl font-bold align-super">+</sup></p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea maiores eligendi sed, cupiditate odit libero minima tempore voluptates, dolores expedita debitis dolorum veritatis voluptate vero, quidem quis deserunt culpa dignissimos.</p>
      </div>

      <div class="md:w-1/2 md:pl-10">
        <p class="font-bold text-9xl pb-4">900<sup class="text-4xl font-bold align-super">+</sup></p>
        <p >Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor commodi doloribus aut unde quibusdam, incidunt praesentium a voluptas quam ex, obcaecati odit ab nemo delectus expedita numquam minima? Debitis, numquam.</p>
      </div>
    </div>
  </div>

  <div class="bg-text-primary w-full h-screen pt-5 p-20">
    {{-- FIREE --}}
    <div class="text-center">
      <p class="font-bold text-4xl mb-3">Dibuat Agar Anda Lebih Produktif</p>
      <p class="max-w-2xl mx-auto">Sekarang Anda Tidak Perlu Lagi Mengirim Surat Secara Konvensional Cukup Menginputkan Data Dan Boom! Anda Menjadi Lebih Hemat Waktu Dan Hemat Tenaga.</p>
    </div>

    {{-- CARD --}}
    <div>
      <div class="flex pt-5">
        <div class="w-1/2 pr-2.5">
          <div class="bg-yellow rounded h-full w-full p-5">
            <div id="label">
              <p class="bg-text-primary text-yellow pl-6 pr-6 rounded inline-block">Dosen</p>
            </div>
            <div id="deskripsi" class="pl-8 pr-8 pt-5 pb-5">
              <p class="font-bold text-text-light text-xl pb-2">Pengaduan Akademik</p>
              <p class="text-text-light">Belakangan ini marak sekali fasilitas yang tidak dikelola dengan baik, mulai dari wc yang tidak ada airnya, wifi yang lelet dll.</p>
            </div>
            <div id="link detail" class="pl-8 hover:underline text-text-light">
              <p>Read More &raquo;</p>
            </div>
          </div>
        </div>
        <div class="w-1/2 pl-2.5">
          <div class="bg-primary rounded h-full w-full p-5">
            <div id="label">
              <p class="bg-text-primary text-primary pl-6 pr-6 rounded inline-block">HMJ TI</p>
            </div>
            <div id="deskripsi" class="pl-8 pr-8 pt-5 pb-5">
              <p class="font-bold text-text-primary text-xl pb-2">Pengaduan Akademik</p>
              <p class="text-text-primary">Belakangan ini marak sekali fasilitas yang tidak dikelola dengan baik, mulai dari wc yang tidak ada airnya, wifi yang lelet dll.</p>
            </div>
            <div id="link detail" class="pl-8 hover:underline text-text-primary">
              <p>Read More &raquo;</p>
            </div>
          </div>
        </div>
      </div>
      <div class="flex pt-5">
        <div class="w-1/2 pr-2.5">
          <div class="bg-primary rounded h-full w-full p-5">
            <div id="label">
              <p class="bg-text-primary text-primary pl-6 pr-6 rounded inline-block">HMJ TI</p>
            </div>
            <div id="deskripsi" class="pl-8 pr-8 pt-5 pb-5">
              <p class="font-bold text-text-primary text-xl pb-2">Pengaduan Akademik</p>
              <p class="text-text-primary">Belakangan ini marak sekali fasilitas yang tidak dikelola dengan baik, mulai dari wc yang tidak ada airnya, wifi yang lelet dll.</p>
            </div>
            <div id="link detail" class="pl-8 hover:underline text-text-primary">
              <p>Read More &raquo;</p>
            </div>
          </div>
        </div>
        <div class="w-1/2 pl-2.5">
          <div class="bg-green rounded h-full w-full p-5">
            <div id="label">
              <p class="bg-text-primary text-green pl-6 pr-6 rounded inline-block">HMJ TI</p>
            </div>
            <div id="deskripsi" class="pl-8 pr-8 pt-5 pb-5">
              <p class="font-bold text-text-primary text-xl pb-2">Pengaduan Akademik</p>
              <p class="text-text-primary">Belakangan ini marak sekali fasilitas yang tidak dikelola dengan baik, mulai dari wc yang tidak ada airnya, wifi yang lelet dll.</p>
            </div>
            <div id="link detail" class="pl-8 hover:underline text-text-primary">
              <p>Read More &raquo;</p>
            </div>
          </div>
        </div>
      </div>
    </div>



</x-layout>