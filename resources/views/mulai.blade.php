<x-layout>

  {{-- HERO --}}
  <div class="w-full md:h-screen font-display" style="background-image: url('{{ asset('img/aset/bgnav.png') }}'); background-size: cover; background-repeat: no-repeat; background-position: center; padding-bottom: 20px;">
    <x-navbar></x-navbar>
    <div class="flex flex-col justify-center items-center text-center text-sm md:text-text-primary space-y-8 md:px-32.5  md:mt-[5%]">
      <p class="bg-white/20 backdrop-blur-md border border-white/30 pl-4 pr-4 pt-1 pb-1 rounded-4xl shadow-md text-text-primary">Mengumumkan Produk Beta Kami</p>
      <p class="font-[700] text-xl md:text-[40px]/15 w-[80%] md:w-[100%] text-text-primary ">Kelola Kebutuhanmu Dengan Mudah Dari Penyewaan Inventaris, Advokasi, Hingga Pembuatan Surat Dan Jadwal Kegiatan. Semua Dalam Satu Platform Terintegrasi.</p>
      <p class="w-[70%] md:w-['60%'] text-text-primary">Bersama HMJ TI, Wujudkan Organisasi Yang Aktif, Transparan, Dan Modern.</p>
      <a href="#" class="btn bg-secondary rounded pl-4 pr-4 pt-1 pb-1 shadow-xl text-text-primary hover:bg-text-primary hover:text-primary">Mulai Petualangan</a>
    </div>
  </div>

  {{-- PROMOTION --}}
  <div class="bg-base md:p-5 w-full p-10">
    <div class="md:flex text-center relative">
      <div class="absolute left-1/2 top-0 h-full md:border-l-2 border-dashed border-text-secondary"></div>
      <div class="md:w-1/2 pb-10 md:p-0 md:pr-10 flex justify-center">
        <div class="max-w-2xl">
          <p class="font-bold text-5xl pb-4">200<sup class="text-4xl font-bold align-super">+</sup></p>
          <p class="max-w-md">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea maiores eligendi sed, cupiditate odit libero minima tempore voluptates, dolores expedita debitis dolorum veritatis voluptate vero, quidem quis deserunt culpa dignissimos.</p>
        </div>
      </div>
      <div class="md:w-1/2 md:pl-10 flex justify-center">
        <div class="max-w-2xl">
          <p class="font-bold text-5xl pb-4">900<sup class="text-4xl font-bold align-super">+</sup></p>
          <p class="max-w-md">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor commodi doloribus aut unde quibusdam, incidunt praesentium a voluptas quam ex, obcaecati odit ab nemo delectus expedita numquam minima? Debitis, numquam.</p>
        </div>
      </div>
    </div>
  </div>

  {{-- CARD PENGADUAN AKADEMIK--}}
  <div class="bg-text-primary w-full md:h-screen pt-5 p-5 md:px-20 md:py-10">
    {{-- FIREE --}}
    <div class="text-center text-text-light">
      <p class="font-bold text-4xl mb-3">Dibuat Agar Anda Lebih Produktif</p>
      <p class="max-w-2xl mx-auto">Sekarang Anda Tidak Perlu Lagi Mengirim Surat Secara Konvensional Cukup Menginputkan Data Dan Boom! Anda Menjadi Lebih Hemat Waktu Dan Hemat Tenaga.</p>
    </div>

    {{-- CARD --}}
    <div>
      <div class="md:flex pt-5">
        <div class="md:w-1/2 md:pr-2.5">
          <div class="bg-yellow rounded h-full w-full p-5">
            <div id="label">
              <p class="bg-text-primary text-yellow pl-2 pr-2 md:pl-6 md:pr-6 rounded inline-block">Dosen</p>
            </div>
            <div id="deskripsi" class="md:pl-7.5 md:pr-8 pt-3 md:pt-5 pb-5">
              <p class="font-bold text-text-light text-xl pb-2">Pengaduan Akademik</p>
              <p class="text-text-light">{{ Str::limit('Belakangan ini marak sekali fasilitas yang tidak dikelola dengan baik, mulai dari wc yang tidak ada airnya, wifi yang lelet dll.', 85, '...') }}</p>
            </div>
            <div id="link detail" class="md:pl-7.5 hover:underline text-text-light">
              <p>Read More &raquo;</p>
            </div>
          </div>
        </div>
        <div class="md:w-1/2 md:pl-2.5 mt-3 md:mt-0">
          <div class="bg-primary rounded h-full w-full p-5">
            <div id="label">
              <p class="bg-text-primary text-primary pl-2 pr-2 md:pl-6 md:pr-6 rounded inline-block">HMJ TI</p>
            </div>
            <div id="deskripsi" class="md:pl-8 md:pr-8 pt-3 md:pt-5 pb-5">
              <p class="font-bold text-text-primary text-xl pb-2">Pengaduan Akademik</p>
              <p class="text-text-primary">{{ Str::limit('Belakangan ini marak sekali fasilitas yang tidak dikelola dengan baik, mulai dari wc yang tidak ada airnya, wifi yang lelet dll.', 85, '...') }}</p>
            </div>
            <div id="link detail" class="md:pl-8 hover:underline text-text-primary">
              <p>Read More &raquo;</p>
            </div>
          </div>
        </div>
      </div>
      <div class="md:flex pt-3 md:pt-5">
        <div class="md:w-1/2 md:pr-2.5">
          <div class="bg-yellow rounded h-full w-full p-5">
            <div id="label">
              <p class="bg-text-primary text-yellow pl-2 pr-2 md:pl-6 md:pr-6 rounded inline-block">Dosen</p>
            </div>
            <div id="deskripsi" class="md:pl-7.5 md:pr-8 pt-3 md:pt-5 pb-5">
              <p class="font-bold text-text-light text-xl pb-2">Pengaduan Akademik</p>
              <p class="text-text-light">{{ Str::limit('Belakangan ini marak sekali fasilitas yang tidak dikelola dengan baik, mulai dari wc yang tidak ada airnya, wifi yang lelet dll.', 85, '...') }}</p>
            </div>
            <div id="link detail" class="md:pl-7.5 hover:underline text-text-light">
              <p>Read More &raquo;</p>
            </div>
          </div>
        </div>
        <div class="md:w-1/2 md:pl-2.5 mt-3 md:mt-0">
          <div class="bg-primary rounded h-full w-full p-5">
            <div id="label">
              <p class="bg-text-primary text-primary pl-2 pr-2 md:pl-6 md:pr-6 rounded inline-block">HMJ TI</p>
            </div>
            <div id="deskripsi" class="md:pl-7.5 md:pr-8 pt-3 md:pt-5 pb-5">
              <p class="font-bold text-text-primary text-xl pb-2">Pengaduan Akademik</p>
              <p class="text-text-primary">{{ Str::limit('Belakangan ini marak sekali fasilitas yang tidak dikelola dengan baik, mulai dari wc yang tidak ada airnya, wifi yang lelet dll.', 85, '...') }}</p>
            </div>
            <div id="link detail" class="md:pl-7.5 hover:underline text-text-primary">
              <p>Read More &raquo;</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- STRUKTUR KEPENGURUSAN --}}
  <div id="struktur kepengurusan" class="bg-base w-full px-5 py-5 md:px-20 md:py-10">
    <div class="bg-base">
      <p class="font-bold text-4xl mb-3 capitalize">Stuktur Kepengurusan</p>
      <p class="max-w-xl inline-block capitalize">sebuah kapal yang mengangkut puluhan orang, orang-orang ini adalah para kapten kapal. melakukan yang terbaik dan terus membawa kebaikan atas dasar cinta tanah air.</p>

      {{-- CAROUSEL --}}
      <div class="container">
        <section class="slider-container">
          <div class="slider-images">
            <div class="slider-img">
              <img src="{{ asset('img/aset/1.png') }}" alt="1">
              <h1>Mike</h1>
              <div class="details">
                <h2>Mike</h2>
                <p>Web3 Developer</p>
              </div>
            </div>
            <div class="slider-img">
              <img src="{{ asset('img/aset/2.png') }}" alt="2">
              <h1>Smith</h1>
              <div class="details">
                <h2>Smith</h2>
                <p>Ui/Ux Design</p>
              </div>
            </div>
            <div class="slider-img">
              <img src="{{ asset('img/aset/3.png') }}" alt="3">
              <h1>Eva</h1>
              <div class="details">
                <h2>Eva</h2>
                <p>Data Analyst</p>
              </div>
            </div>
            <div class="slider-img active">
              <img src="{{ asset('img/aset/4.png') }}" alt="4">
              <h1>Rizkian</h1>
              <div class="details">
                <h2>Emcy</h2>
                <p>Back End</p>
              </div>
            </div>
            <div class="slider-img">
              <img src="{{ asset('img/aset/5.png') }}" alt="5">
              <h1>Emcy</h1>
              <div class="details">
                <h2>Emcy</h2>
                <p>Back End</p>
              </div>
            </div>
            <div class="slider-img">
              <img src="{{ asset('img/aset/6.png') }}" alt="6">
              <h1>Raneye</h1>
              <div class="details">
                <h2>Raneye</h2>
                <p>Manager</p>
              </div>
            </div>
            <div class="slider-img">
              <img src="{{ asset('img/aset/7.png') }}" alt="7">
              <h1>Raneye</h1>
              <div class="details">
                <h2>Raneye</h2>
                <p>Manager</p>
              </div>
            </div>
          </div>
        </section>
        <script src='js/jQuery.js'></script>
        <script>
          jQuery(document).ready(function(){

            $('.slider.img').on('click', function(){
              $('.slider-img').removeClass('active');
              $(this).addClass('active')
            })
            
          });
        </script>
      </div>
    </div>
  </div>

  {{-- PENDAPAT KAMI --}}
  <div class="w-full md:px-32.5 px-5 py-5 text-text-light">
    <p class="text-right text-xl">&raquo;</p>
    <h2 class="text-2xl font-bold mb-4 text-right">Pendapat Kami</h2>
    <div class="bg-text-primary rounded-lg md:flex md:flex-row-reverse md:items-center md:gap-8">

      <div class="md:w-1/3 flex justify-start md:justify-end">
        <img class="w-24 h-24 md:w-36 md:h-36 object-cover rounded-full shadow-lg" 
             src="{{ asset('img/wahab.jpg') }}" 
             alt="Wahab Syahranie">
      </div>
      
      <div class="md:w-2/3 mt-4 md:mt-0">
        <blockquote class="mb-4 md:mb-6 text-lg italic">
          "Kaderisasi adalah tugas, Regenerasi adalah tangungjawab. Di HIMA TI kalian akan merasakan sudut pandang dan pengalaman berpetualang dari segi mahasiswa."
        </blockquote>
        
        <div class="space-y-1 text-right md:text-left">
          <p class="font-bold text-lg">Wahab Syahranie</p>
          <p class="text-sm">Backend Developer Website HMJ TI</p>
          <p class="text-sm">Ketua Umum HMJ TI 2024/2025</p>
          <p class="text-sm">Founder Ruang Ujian dan Kajian</p>
        </div>
      </div>
    </div>
    
    <hr class="mt-6 border-t border-primary">
  </div>

  {{-- FOOTER --}}
  <div class="w-full md:h-screen p-5 md:px-20 md:py-10 ">
    {{-- HERO --}}
    <div class="rounded  md:h-[50%] text-text-primary text-center p-5 md:py-10 " style="background-image: url('{{ asset('img/aset/bgnav.png') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
      <div class="max-w-2xl mx-auto text-center"> <!-- Container pembatas lebar -->
        <p class="capitalize font-bold text-xl md:text-[40px] mb-3 leading-tight">Sangat mudah untuk bergabung bersama kami</p>
        <p class="capitalize mb-5 line-clamp-3">Mulailah dengan mendaftarkan diri anda, dan nikmati perjalanan menuju digitalisasi bersama kami.</p>
        <a href="#" class="inline-block btn bg-secondary rounded px-2 py-1 md:px-4 md:py-2 shadow-xl text-text-primary hover:bg-text-primary hover:text-primary transition-colors duration-200">daftar sekarang</a>
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
              <p class="mb-2">Jalan Cipto Mangunkusumo</p>
              <p class="mb-2">Kampus Gunung Panjang</p>
              <p class="mb-4">Samarinda 75131</p>
              <p class="lowercase text-primary">himati@polnes.ac.id</p>
            </address>
          </div>
    
          <!-- Kolom 2: Layanan -->
          <div class="md:w-1/3">
            <h3 class="font-bold mb-4">Layanan</h3>
            <ul class="space-y-2">
              <li>Advokasi</li>
              <li>Penyewaan Inventaris</li>
              <li>Pembuatan Surat</li>
              <li>Penjadwalan Kegiatan</li>
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
</x-layout>