<x-layout>

  {{-- HERO --}}
  <div id="beranda" class="w-full md:h-screen  font-display" style="background-image: url('{{ asset('img/aset/bgnav.png') }}'); background-size: cover; background-repeat: no-repeat; background-position: center; padding-bottom: 20px;">
    <x-navbar></x-navbar>
    <div class="flex flex-col justify-center items-center text-center text-sm md:text-text-primary space-y-8 md:px-32.5  md:mt-[5%]">
      <p class="bg-white/20 border border-white/30 pl-4 pr-4 pt-1 pb-1 rounded-4xl shadow-md text-text-primary">Mengumumkan Produk Beta Kami</p>
      <p class="font-[700] text-xl md:text-[40px]/15 w-[80%] md:w-[100%] text-text-primary ">Kelola Kebutuhanmu Dengan Mudah Dari Penyewaan Inventaris, Advokasi, Hingga Pembuatan Surat Dan Jadwal Kegiatan. Semua Dalam Satu Platform Terintegrasi.</p>
      <p class="w-[70%] md:w-['60%'] text-text-primary">Bersama HMJ TI, Wujudkan Organisasi Yang Aktif, Transparan, Dan Modern.</p>
      <a href="#promotion" class="btn bg-secondary rounded pl-4 pr-4 pt-1 pb-1 shadow-xl text-text-primary hover:bg-text-primary hover:text-primary">Mulai Petualangan</a>
    </div>
  </div>

  {{-- PROMOTION --}}
  <div id="promotion" class="bg-base md:p-5 w-full p-10">
    <div class="md:flex text-center relative">
      <div class="absolute left-1/2 top-0 h-full md:border-l-2 border-dashed border-text-secondary"></div>
      <div class="md:w-1/2 pb-10 md:p-0 md:pr-10 flex justify-center">
        <div class="max-w-2xl">
          <p class="font-bold text-5xl pb-4">{{ $datas['countPengaduan'] }}<sup class="text-4xl font-bold align-super">+</sup></p>
          <p class="max-w-md">Lebih dari {{ $datas['countPengaduan'] }} suara mahasiswa telah kami dengarkan. HIMA TI hadir sebagai wadah aspirasi, pengaduan, dan perbaikan. Bersama, kita ciptakan lingkungan kampus yang lebih baik, terbuka, dan solutif.</p>
        </div>
      </div>
      <div class="md:w-1/2 md:pl-10 flex justify-center">
        <div class="max-w-2xl">
          <p class="font-bold text-5xl pb-4">{{ $datas['countSurat'] }}<sup class="text-4xl font-bold align-super">+</sup></p>
          <p class="max-w-md">Dengan lebih dari {{ $datas['countSurat'] }}+ surat yang telah berhasil dibuat, HIMA TI menghadirkan sistem administrasi surat menyurat yang efisien, modern, dan terintegrasi. Tak perlu lagi repot dengan proses manual — semua bisa dilakukan secara digital, aman, dan praktis.</p>
        </div>
      </div>
    </div>
  </div>

  {{-- CARD PENGADUAN AKADEMIK--}}
  <div id="advokasi" class="bg-text-primary w-full flex flex-col items-center justify-center p-5 md:px-20 md:py-10">
    {{-- FIREE --}}
    <div class="text-center text-text-light">
      <p class="font-bold text-4xl mb-3">Karena Waktu Anda Terlalu Berharga untuk Dibuang</p>
      <p class="max-w-2xl mx-auto">Dengan sistem digital HIMA TI, membuat surat jadi urusan hitungan detik. Fokus pada hal besar, biarkan sistem kami yang urus surat Anda.</p>
    </div>

    {{-- CARD --}}
    @if (count($datas['dataPengaduan']) > 0)
    @php
    $classes = ['bg-yellow', 'bg-green', 'bg-primary', 'text-primary', 'text-secondary'];
    @endphp
    <div>
      <div class="grid grid-cols-2 gap-4 px-4 pt-8 w-full">
        @foreach ($datas['dataPengaduan'] as $index => $pengaduan )
          @php
            $colorCard = $datas['cards'][$index]['colorCard'] ?? 'bg-primary';
            $colorText = $datas['cards'][$index]['colorText'] ?? 'text-primary';
          @endphp
          <div data-aos="fade-up" class="md:pr-2.5">
            <div class="bg-{{ $colorCard }} rounded h-full w-full p-5">
              <div id="label">
                <p class="bg-text-primary text-{{ $colorCard }} pl-2 pr-2 md:pl-6 md:pr-6 rounded inline-block">{{ $pengaduan->tujuan }}</p>
              </div>
              <div id="deskripsi" class="md:pl-7.5 md:pr-8 pt-3 md:pt-5 pb-5">
                <p class="font-bold text-{{ $colorText }} text-xl pb-2">{{ $pengaduan->judul }}</p>
                <p class="text-{{ $colorText }}">{{ Str::limit($pengaduan->deskripsi, 85, '...') }}</p>
              </div>
              <div id="link detail" class="md:pl-7.5 hover:underline text-{{ $colorText }}">
                <p>Read More &raquo;</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    @endif
  </div>

  {{-- STRUKTUR KEPENGURUSAN --}}
  <div id="organisasi" class="bg-base w-full lg:h-screen px-5 pt-5 pb-7 md:px-20 md:py-5">
    <div class="bg-base">
      <p class="font-bold text-4xl mb-3 capitalize">Stuktur Kepengurusan</p>
      <p class="max-w-xl inline-block capitalize">sebuah kapal yang mengangkut puluhan orang, orang-orang ini adalah para kapten kapal. melakukan yang terbaik dan terus membawa kebaikan atas dasar cinta tanah air.</p>

      {{-- CAROUSEL --}}
      <div data-aos="zoom-in" data-aos-offset="150" data-aos-duration="500" class="container pt-8">
        <section class="slider-container">
          <div class="slider-images">
            @foreach ($datas['dataDepartemen'] as $departemen )
              <div class="slider-img {{ $loop->iteration == 4 ? 'active' : '' }}">
                <img src="{{ asset($departemen->gambar) }}" alt="1">
                <h1>{{ $departemen->kode }}</h1>
                <div class="details">
                  <h2>{{ $departemen->nama_pendek }}</h2>
                  <p>{{ $departemen->nama_lengkap }}</p>
                </div>
              </div>
            @endforeach
          </div>
        </section>
      </div>
    </div>
  </div>

  {{-- PENDAPAT KAMI --}}
  <div class="w-full md:px-32.5 px-5 py-5 text-text-light">
    <p class="text-right text-xl">&raquo;</p>
    <h2 class="text-2xl font-bold mb-4 text-right">Pendapat Kami</h2>
    <div data-aos="fade-left" data-aos-offset="100" data-aos-duration="500" class="bg-text-primary rounded-lg md:flex md:flex-row-reverse md:items-center md:gap-8">

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