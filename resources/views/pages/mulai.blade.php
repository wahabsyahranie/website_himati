<x-layout>
<x-navbar></x-navbar>
  {{-- HERO --}}
  <div id="beranda" class="w-full py-16 md:py-0 h-auto md:min-h-screen font-display flex flex-col items-center justify-center text-center text-sm md:text-text-primary space-y-8 lg:px-32.5" style="background-image: url('{{ asset('img/aset/bgnav.png') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
  
    <div class="flex flex-col justify-center items-center w-full px-4 md:px-18 space-y-6">
      <p class="bg-white/20 border border-white/30 px-4 py-1 rounded-4xl shadow-md text-text-primary">Mengumumkan Produk Beta Kami</p>
      <p class="font-[700] text-md md:text-[40px] leading-snug w-[90%] md:w-full text-text-primary">
        Kelola Kebutuhanmu Dengan Mudah Dari Penyewaan Inventaris, Advokasi, Hingga Pembuatan Surat Dan Jadwal Kegiatan. Semua Dalam Satu Platform Terintegrasi.
      </p>
  
      <p class="w-[70%] md:w-[80%] text-text-primary">
        Bersama HMJ TI, Wujudkan Organisasi Yang Aktif, Transparan, Dan Modern.
      </p>
  
      <a href="#promotion" class="inline-flex items-center px-6 py-3 text-sm font-semibold bg-secondary rounded-full shadow-xl text-text-primary transform transition duration-300 ease-in-out hover:bg-text-primary hover:text-primary hover:scale-105 hover:-translate-y-1 hover:shadow-2xl group">
        Mulai Petualangan
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
        </svg>
      </a>
    </div>
  </div>
  

  {{-- PROMOTION --}}
  <div id="promotion" class="bg-base p-6 md:px-20 md:py-5 w-full">
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
    {{-- Header --}}
    <div class="text-center text-text-light">
      <p class="font-bold text-xl md:text-4xl mb-3">Karena Waktu Anda Terlalu Berharga untuk Dibuang</p>
      <p class="max-w-2xl mx-auto text-sm md:text-md">Dengan sistem digital HIMA TI, membuat surat jadi urusan hitungan detik. Fokus pada hal besar, biarkan sistem kami yang urus surat Anda.</p>
    </div>

    {{-- CARD --}}
    @if (count($datas['dataPengaduan']) > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 max-w-7xl mx-auto pt-12 pb-8 w-full relative z-10">
      @foreach ($datas['dataPengaduan'] as $index => $pengaduan)
        @php
          $gradients = [
            'dosen' => ['from-amber-400 via-yellow-400 to-yellow-500', 'text-amber-600'],
            'hmj ti' => ['from-blue-700 via-blue-600 to-blue-500', 'text-blue-700'],
            'jurusan' => ['from-emerald-600 via-green-500 to-green-400', 'text-emerald-600']
          ];
          $gradient = $gradients[$pengaduan->tujuan] ?? ['from-blue-800 via-blue-700 to-blue-600', 'text-blue-800'];
          $bgColors = [
            'dosen' => ['bg-amber-50', 'text-amber-900'],
            'hmj ti' => ['bg-blue-50', 'text-blue-900'],
            'jurusan' => ['bg-emerald-50', 'text-emerald-900']
          ];
          $labelColors = $bgColors[$pengaduan->tujuan] ?? ['bg-slate-50', 'text-slate-900'];
        @endphp
        
        <article class="group relative bg-gradient-to-br {{ $gradient[0] }} text-white rounded-3xl p-8 text-left shadow-xl animate-fadeInUp backdrop-blur-sm backdrop-opacity-10 transition-all duration-300 ease-in-out hover:scale-[1.02] hover:shadow-2xl hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 150 }}">
          <div class="absolute -top-6 right-6 bg-white/95 rounded-2xl p-3 shadow-lg transition-transform duration-300 ease-in-out group-hover:scale-110 group-hover:rotate-3">
            @if($pengaduan->tujuan == 'dosen')
              <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 {{ $gradient[1] }} transition-transform duration-300 ease-in-out group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 10c-4.41 0-8-1.79-8-4V6c0-2.21 3.59-4 8-4s8 1.79 8 4v8c0 2.21-3.59 4-8 4z" /></svg>
            @elseif($pengaduan->tujuan == 'hmj ti')
              <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 {{ $gradient[1] }} transition-transform duration-300 ease-in-out group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 3.13a4 4 0 010 7.75M8 3.13a4 4 0 000 7.75" /></svg>
            @else
              <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 {{ $gradient[1] }} transition-transform duration-300 ease-in-out group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
            @endif
          </div>
          <div class="flex gap-3 mb-6">
            <span class="inline-flex items-center {{ $labelColors[0] }} {{ $labelColors[1] }} font-medium rounded-full px-4 py-1.5 text-sm tracking-wide shadow-sm transition-all duration-300 ease-in-out group-hover:shadow-md group-hover:scale-105">{{ $pengaduan->tujuan }}</span>
            <span class="inline-flex items-center bg-white/20 text-white font-medium rounded-full px-4 py-1.5 text-sm tracking-wide shadow-sm backdrop-blur-sm transition-all duration-300 ease-in-out group-hover:bg-white/30 group-hover:shadow-md group-hover:scale-105">Advokasi</span>
          </div>
          <h3 class="text-2xl font-bold mb-4 transition-transform duration-300 ease-in-out group-hover:translate-x-1">{{ $pengaduan->judul }}</h3>
          <p class="mb-8 text-base leading-relaxed opacity-90 transition-all duration-300 ease-in-out group-hover:opacity-100">
            {{ Str::limit($pengaduan->deskripsi, 100, '...') }}
          </p>
          <a href="/advokasi/{{ $pengaduan->slug }}" class="inline-flex items-center px-5 py-2.5 text-sm font-medium rounded-xl bg-white/95 {{ $gradient[1] }} shadow-md space-x-1 transition-all duration-300 ease-in-out hover:shadow-lg hover:scale-105 hover:-translate-y-0.5 group-hover:shadow-xl">
            <span>Baca Detail</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 transition-transform duration-300 ease-in-out group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
            </svg>
          </a>
          <div class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out rounded-3xl pointer-events-none"></div>
        </article>
      @endforeach
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
  <div x-data="{ currentIndex: 0, total: {{ count($datas['dataReview']) }} }" class="w-full min-h-[400px] bg-text-primary md:px-20 px-6 py-12 text-text-light">
    <div class="max-w-7xl mx-auto">
      <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl md:text-4xl font-bold">Pendapat Kami</h2>
        <button @click="currentIndex = (currentIndex + 1) % total" class="group bg-secondary/80 hover:bg-secondary rounded-full p-3 transition-all duration-300 ease-in-out">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-text-primary group-hover:text-text-primary transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
          </svg>
        </button>
      </div>

      <div class="overflow-hidden relative rounded-2xl bg-white/5 backdrop-blur-sm shadow-2xl">
        <div class="flex transition-transform duration-500 ease-in-out" :style="`transform: translateX(-${currentIndex * 100}%)`">
          @foreach ($datas['dataReview'] as $review)
          <div class="flex-shrink-0 w-full">
            <div class="flex flex-col md:flex-row justify-between items-center p-8 md:p-12 gap-8">
              <div class="w-full md:max-w-[60%] space-y-6">
                <svg class="w-12 h-12 text-secondary mb-4" fill="currentColor" viewBox="0 0 32 32">
                  <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z"/>
                </svg>
                <p class="text-base md:text-xl text-text-light italic leading-relaxed">{{ $review->quote }}</p>
                <div class="border-l-4 border-secondary pl-4">
                  <p class="font-bold text-sm md:text-lg text-text-light">{{ $review->pengurus->user->name }}</p>
                  @foreach ($review->title as $title)
                  <p class="text-xs md:text-sm text-text-light/70">{{ $title['title'] }}</p>
                  @endforeach
                </div>
              </div>
              <div class="relative">
                <div class="absolute -inset-1 bg-gradient-to-r from-secondary/80 to-secondary rounded-full blur opacity-30"></div>
                <div class="relative">
                  <img class="w-28 h-28 md:w-40 md:h-40 object-cover rounded-full ring-4 ring-secondary/20 shadow-2xl" src="{{ asset($review->pengurus->gambar) }}" alt="Foto {{ $review->pengurus->user->name }}">
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>

      <div class="flex justify-center mt-6 gap-2">
        @foreach ($datas['dataReview'] as $index => $review)
        <button 
          @click="currentIndex = {{ $index }}"
          :class="{'bg-secondary': currentIndex === {{ $index }}, 'bg-white/20': currentIndex !== {{ $index }}}"
          class="w-2.5 h-2.5 rounded-full transition-all duration-300 hover:scale-125">
        </button>
        @endforeach
      </div>
    </div>
  </div>

  {{-- FOOTER --}}
  <x-footer></x-footer>
</x-layout>