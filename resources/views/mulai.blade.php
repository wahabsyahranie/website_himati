<x-layout>

  {{-- HERO --}}
  <div id="beranda" class="w-full py-16 md:py-0 h-auto md:min-h-screen font-display flex flex-col items-center justify-center text-center text-sm md:text-text-primary space-y-8 lg:px-32.5" style="background-image: url('{{ asset('img/aset/bgnav.png') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <x-navbar></x-navbar>
  
    <div class="flex flex-col justify-center items-center w-full px-4 md:px-18 space-y-6">
      <p class="bg-white/20 border border-white/30 px-4 py-1 rounded-4xl shadow-md text-text-primary">Mengumumkan Produk Beta Kami</p>
      <p class="font-[700] text-md md:text-[40px] leading-snug w-[90%] md:w-full text-text-primary">
        Kelola Kebutuhanmu Dengan Mudah Dari Penyewaan Inventaris, Advokasi, Hingga Pembuatan Surat Dan Jadwal Kegiatan. Semua Dalam Satu Platform Terintegrasi.
      </p>
  
      <p class="w-[70%] md:w-[80%] text-text-primary">
        Bersama HMJ TI, Wujudkan Organisasi Yang Aktif, Transparan, Dan Modern.
      </p>
  
      <a href="#promotion" class="text-xs btn bg-secondary rounded px-4 py-1 shadow-xl text-text-primary hover:bg-text-primary hover:text-primary">
        Mulai Petualangan
      </a>
    </div>
  </div>
  

  {{-- PROMOTION --}}
  <div id="promotion" class="bg-base p-5 md:px-20 md:py-5 w-full">
    <div class="md:flex text-center relative">
      <div class="absolute left-1/2 top-0 h-full md:border-l-2 border-dashed border-text-secondary"></div>
      <div class="md:w-1/2 pb-10 md:p-0 md:pr-10 flex justify-center">
        <div class="max-w-2xl">
          <p class="font-bold text-3xl md:text-4xl pb-4">{{ $datas['countPengaduan'] }}<sup class="text-3xl md:text-4xl font-bold align-super">+</sup></p>
          <p class="max-w-md text-sm md:text-md">Lebih dari {{ $datas['countPengaduan'] }} suara mahasiswa telah kami dengarkan. HIMA TI hadir sebagai wadah aspirasi, pengaduan, dan perbaikan. Bersama, kita ciptakan lingkungan kampus yang lebih baik, terbuka, dan solutif.</p>
        </div>
      </div>
      <div class="md:w-1/2 md:pl-10 flex justify-center">
        <div class="max-w-2xl">
          <p class="font-bold text-3xl md:text-4xl pb-4">{{ $datas['countSurat'] }}<sup class="text-3xl md:text-4xl font-bold align-super">+</sup></p>
          <p class="max-w-md text-sm md:text-md">Dengan lebih dari {{ $datas['countSurat'] }}+ surat yang telah berhasil dibuat, HIMA TI menghadirkan sistem administrasi surat menyurat yang efisien, modern, dan terintegrasi. Tak perlu lagi repot dengan proses manual — semua bisa dilakukan secara digital, aman, dan praktis.</p>
        </div>
      </div>
    </div>
  </div>

  {{-- CARD PENGADUAN AKADEMIK--}}
  <div id="advokasi" class="bg-text-primary w-full flex flex-col items-center justify-center p-5 md:px-20 md:py-10">
    {{-- FIREE --}}
    <div class="text-center text-text-light">
      <p class="font-bold text-xl md:text-4xl mb-3">Karena Waktu Anda Terlalu Berharga untuk Dibuang</p>
      <p class="max-w-2xl mx-auto text-sm md:text-md">Dengan sistem digital HIMA TI, membuat surat jadi urusan hitungan detik. Fokus pada hal besar, biarkan sistem kami yang urus surat Anda.</p>
    </div>

    {{-- CARD --}}
    @if (count($datas['dataPengaduan']) > 0)
    @php
    $classes = ['bg-yellow', 'bg-green', 'bg-primary', 'text-primary', 'text-secondary'];
    @endphp
    <div>
      <div class="grid grid-cols-2 gap-4 pt-8 w-full">
        @foreach ($datas['dataPengaduan'] as $index => $pengaduan )
          @php
            $colorCard = $datas['cards'][$index]['colorCard'] ?? 'bg-primary';
            $colorText = $datas['cards'][$index]['colorText'] ?? 'text-primary';
          @endphp
          <div data-aos="fade-up">
            <div class="bg-{{ $colorCard }} rounded h-full w-full p-5">
              <div id="label" class="text-xs md:text-md">
                <p class="bg-text-primary text-{{ $colorCard }} pl-2 pr-2 md:pl-3 md:pr-3 rounded inline-block capitalize">{{ $pengaduan->tujuan }}</p>
                <p class="bg-secondary text-base mt-1 md:mt-0 pl-2 pr-2 md:pl-3 md:pr-3 rounded inline-block">Advokasi</p>
              </div>
              <div id="deskripsi" class="md:pl-7.5 md:pr-8 pt-3 md:pt-5 pb-5">
                <p class="font-bold text-{{ $colorText }} text-sm md:text-xl pb-2">{{ $pengaduan->judul }}</p>
                <p class="text-xs md:text-lg text-{{ $colorText }}">{{ Str::limit($pengaduan->deskripsi, 85, '...') }}</p>
              </div>
              <div id="link detail" class="text-xs md:text-lg md:pl-7.5 hover:underline text-{{ $colorText }}">
                <p><a href="/advokasi/{{ $pengaduan->slug }}"> Read More &raquo;</a></p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    @endif
  </div>

  {{-- STRUKTUR KEPENGURUSAN --}}
  <div id="organisasi" class="bg-base w-full px-5 pt-5 pb-7 md:px-20 md:py-7">
    <div class="bg-base">
      <p class="font-bold text-xl md:text-4xl mb-3 capitalize">Stuktur Kepengurusan</p>
      <p class="max-w-xl inline-block capitalize text-sm md:text-md">sebuah kapal yang mengangkut puluhan orang, orang-orang ini adalah para kapten kapal. melakukan yang terbaik dan terus membawa kebaikan atas dasar cinta tanah air.</p>

      {{-- CAROUSEL --}}
      <div data-aos="zoom-in" data-aos-offset="150" data-aos-duration="500" class="container pt-8">
        <section class="slider-container">
          <div class="slider-images">
            @foreach ($datas['dataStruktur'] as $struktur )
              <div class="slider-img {{ $loop->iteration == 4 ? 'active' : '' }}">
                <img src="{{ asset($struktur->gambar) }}" alt="1">
                <h1>{{ $struktur->kode }}</h1>
                <div class="details">
                  <h2>{{ $struktur->nama_pendek }}</h2>
                  <p>{{ $struktur->nama_lengkap }}</p>
                </div>
              </div>
            @endforeach
          </div>
        </section>
      </div>
    </div>
  </div>

  {{-- PENDAPAT KAMI --}}
  <div x-data="{ currentIndex: 0, total: {{ count($datas['dataReview']) }} }" class="w-full md:px-20 px-5 py-5 text-text-light">
    <p @click="currentIndex = (currentIndex + 1) % total" class="text-right text-xl cursor-pointer select-none hover:text-blue-500 transition mb-4">&raquo;</p>
    <h2 class="text-xl md:text-4xl font-bold mb-4 text-right">Pendapat Kami</h2>
    <div class="overflow-hidden relative">
      <div class="flex transition-transform duration-500 ease-in-out" :style="`transform: translateX(-${currentIndex * 100}%)`">
        @foreach ($datas['dataReview'] as $review)
        <div class="flex-shrink-0 w-full flex flex-row justify-between items-center">
          <div class="max-w-[70%]">
            <p class="text-sm md:text-xl mb-6">{{ $review->quote }}</p>
            <p class="text-xs md:text-lg font-bold">{{ $review->pengurus->user->name }}</p>
            @foreach ($review->title as $title)
            <p class="text-xs md:text-md">{{ $title['title'] }}</p>
            @endforeach
          </div>
          <div class="max-w-[30%]">
            <img class="w-24 h-24 md:w-36 md:h-36 object-cover rounded-full shadow-lg" src="{{ asset($review->pengurus->gambar) }}" alt="Foto">
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  {{-- FOOTER --}}
  <x-footer></x-footer>
</x-layout>