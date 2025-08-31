<x-layout>
<x-navbar></x-navbar>
  {{-- HERO --}}
  <div id="beranda" class="w-full py-16 md:py-0 h-auto md:min-h-screen font-display flex flex-col items-center justify-center text-center text-sm md:text-text-primary space-y-8 lg:px-32.5 bg-gradient-to-br from-[#030c1a] to-[#0a4d78]">
    <div class="flex flex-col justify-center items-center w-full px-4 md:px-18 space-y-6">
      <p class="bg-white/20 border border-white/30 px-4 py-1 rounded-4xl shadow-md text-text-primary">Mengumumkan Produk Beta Kami</p>
      <p class="font-[700] text-md md:text-[40px] leading-snug w-[90%] md:w-full text-text-primary">
        Kelola Kebutuhanmu Dengan Mudah Dari Penyewaan Inventaris.
        <span class="text-secondary">Advokasi, Hingga Pembuatan Surat</span> Dan Jadwal Kegiatan Terintegrasi.
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
  <div id="promotion" class="bg-base p-6 md:px-20 md:py-12 w-full">
    <div class="md:flex text-center relative">
      <div class="absolute left-1/2 top-0 h-full md:border-l-2 border-dashed border-text-secondary"></div>
      <div class="md:w-1/2 pb-10 md:p-0 md:pr-10 flex justify-center">
        <div class="max-w-2xl group">
          <div class="relative inline-block mb-6">
            <div class="absolute -inset-1 bg-gradient-to-r from-primary/20 to-secondary/20 rounded-lg blur-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            <p class="relative font-bold text-4xl md:text-6xl bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">
              {{ $datas['countPengaduan'] }}<sup class="text-3xl md:text-4xl font-bold align-super text-secondary">+</sup>
            </p>
          </div>
          <p class="max-w-md text-sm md:text-md text-text-secondary">Lebih dari {{ $datas['countPengaduan'] }} suara mahasiswa telah kami dengarkan. HIMA TI hadir sebagai wadah aspirasi, pengaduan, dan perbaikan. Bersama, kita ciptakan lingkungan kampus yang lebih baik, terbuka, dan solutif.</p>
        </div>
      </div>
      <div class="md:w-1/2 md:pl-10 flex justify-center">
        <div class="max-w-2xl group">
          <div class="relative inline-block mb-6">
            <div class="absolute -inset-1 bg-gradient-to-r from-primary/20 to-secondary/20 rounded-lg blur-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            <p class="relative font-bold text-4xl md:text-6xl bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">
              {{ $datas['countSurat'] }}<sup class="text-3xl md:text-4xl font-bold align-super text-secondary">+</sup>
            </p>
          </div>
          <p class="max-w-md text-sm md:text-md text-text-secondary">Dengan lebih dari {{ $datas['countSurat'] }}+ surat yang telah berhasil dibuat, HIMA TI menghadirkan sistem administrasi surat menyurat yang efisien, modern, dan terintegrasi. Tak perlu lagi repot dengan proses manual — semua bisa dilakukan secara digital, aman, dan praktis.</p>
        </div>
      </div>
    </div>
  </div>

  {{-- CARD PENGADUAN AKADEMIK--}}
  <div id="advokasi" class="bg-text-primary w-full flex flex-col items-center justify-center p-5 md:px-20 md:py-16">
    {{-- Header --}}
    <div class="text-center text-text-light max-w-4xl mx-auto">
      <h2 class="font-bold text-2xl md:text-5xl mb-4 leading-tight">Mengutamakan Efisiensi dalam Setiap Langkah</h2>
      <p class="text-sm md:text-lg opacity-90">Sistem digital HIMA TI hadir untuk memaksimalkan produktivitas Anda. Fokus pada pencapaian yang lebih besar, biarkan kami menangani administrasinya.</p>
    </div>

    {{-- CARD --}}
    @if (count($datas['dataPengaduan']) > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-7xl mx-auto pt-16 pb-8 w-full relative z-10">
      @foreach ($datas['dataPengaduan'] as $index => $pengaduan)
        @php
          $gradients = [
            'dosen' => ['from-amber-500 to-amber-400', 'text-amber-600'],
            'hmj ti' => ['from-blue-600 to-blue-500', 'text-blue-700'],
            'jurusan' => ['from-emerald-500 to-emerald-400', 'text-emerald-600']
          ];
          $gradient = $gradients[$pengaduan->tujuan] ?? ['from-blue-700 to-blue-600', 'text-blue-800'];
          $bgColors = [
            'dosen' => ['bg-amber-50', 'text-amber-900'],
            'hmj ti' => ['bg-blue-50', 'text-blue-900'],
            'jurusan' => ['bg-emerald-50', 'text-emerald-900']
          ];
          $labelColors = $bgColors[$pengaduan->tujuan] ?? ['bg-slate-50', 'text-slate-900'];
        @endphp
        
        <article class="group relative bg-gradient-to-r {{ $gradient[0] }} text-white rounded-2xl p-8 text-left shadow-lg animate-fadeInUp backdrop-blur-md transition-all duration-300 ease-in-out hover:shadow-2xl hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 150 }}">
          <div class="flex flex-wrap gap-2 mb-8">
            {{-- Primary Tag --}}
            <div class="flex items-center gap-1.5">
              <span class="w-1.5 h-1.5 rounded-full {{ str_replace(['bg-', '-50'], ['bg-', '-400'], $labelColors[0]) }}"></span>
              <span class="text-[11px] uppercase tracking-wider text-white/90 font-medium">{{ $pengaduan->tujuan }}</span>
            </div>
            {{-- Divider --}}
            <span class="text-white/20">•</span>
            {{-- Secondary Tag --}}
            <div class="flex items-center gap-1.5">
              <span class="w-1.5 h-1.5 rounded-full bg-white/30"></span>
              <span class="text-[11px] uppercase tracking-wider text-white/90 font-medium">Advokasi</span>
            </div>
          </div>
          <h3 class="text-xl md:text-2xl font-bold mb-4 transition-all duration-300 ease-in-out group-hover:translate-x-1">{{ $pengaduan->judul }}</h3>
          <p class="mb-8 text-sm md:text-base leading-relaxed opacity-85 transition-all duration-300 ease-in-out group-hover:opacity-100">
            {{ Str::limit($pengaduan->deskripsi, 120, '...') }}
          </p>
          <a href="/advokasi/{{ $pengaduan->slug }}" class="inline-flex items-center px-6 py-3 text-sm font-medium rounded-xl bg-white/95 {{ $gradient[1] }} shadow-md transition-all duration-300 ease-in-out hover:shadow-lg hover:-translate-y-0.5 group-hover:shadow-xl">
            Selengkapnya
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 transition-transform duration-300 ease-in-out group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </a>
          <div class="absolute inset-0 bg-gradient-to-r from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out rounded-2xl pointer-events-none"></div>
        </article>
      @endforeach
    </div>
    @endif
  </div>


  {{-- STRUKTUR KEPENGURUSAN --}}
  <div id="organisasi" class="bg-gradient-to-b from-base to-gray-50 w-full pt-16 pb-20">
    <div class="max-w-7xl mx-auto px-5 md:px-20">
      {{-- Header Section --}}
      <div class="text-center mb-16">
        <span class="inline-block bg-primary/10 text-primary font-semibold px-4 py-1 rounded-full text-sm mb-4">STRUKTUR ORGANISASI</span>
        <h2 class="font-bold text-3xl md:text-4xl mb-4 capitalize text-gray-900">Struktur Kepengurusan</h2>
        <p class="max-w-2xl mx-auto text-gray-600 text-sm md:text-lg">
          Dipimpin oleh para profesional muda yang berdedikasi untuk memberikan yang terbaik dan membawa perubahan positif bagi organisasi.
        </p>
      </div>
    </div>

    {{-- Struktur Carousel --}}
    <div class="relative w-full overflow-hidden" 
         x-data="{ 
           isPaused: false,
           init() {
             this.$nextTick(() => {
               this.startAnimation();
             });
           },
           startAnimation() {
             const container = this.$refs.scrollContainer;
             const scrollAmount = 1;
             const scrollInterval = 30;

             const scroll = () => {
               if (!this.isPaused) {
                 container.scrollLeft += scrollAmount;
                 if (container.scrollLeft >= (container.scrollWidth - container.clientWidth)) {
                   container.scrollLeft = 0;
                 }
               }
             };

             setInterval(scroll, scrollInterval);
           }
         }"
    >
      {{-- Gradient Overlays --}}
      <div class="absolute left-0 top-0 w-32 h-full bg-gradient-to-r from-base to-transparent z-10"></div>
      <div class="absolute right-0 top-0 w-32 h-full bg-gradient-to-l from-base to-transparent z-10"></div>

      {{-- Scrolling Container --}}
      <div 
        x-ref="scrollContainer"
        class="flex gap-6 overflow-x-hidden py-8 px-20"
        @mouseover="isPaused = true"
        @mouseleave="isPaused = false"
      >
        {{-- First show BPI card --}}
        @foreach ($datas['dataStruktur'] as $struktur)
          @if($struktur->kode === 'BPI')
            <div class="flex-none w-[300px] group relative bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 ease-in-out hover:-translate-y-2">
              {{-- Image Container --}}
              <div class="relative w-full aspect-square mb-6 overflow-hidden rounded-xl">
                <img 
                  src="{{ asset('storage/'.$struktur->gambar) }}" 
                  alt="{{ $struktur->nama_pendek }}"
                  class="w-full h-full object-cover object-center transform group-hover:scale-105 transition-transform duration-300 ease-in-out"
                >
                {{-- Overlay --}}
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                
                {{-- Code Badge --}}
                <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-sm font-semibold text-primary shadow-lg transform -translate-y-2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                  {{ $struktur->kode }}
                </div>
              </div>

              {{-- Content --}}
              <div class="space-y-2">
                <h3 class="text-xl font-bold text-gray-900 group-hover:text-primary transition-colors duration-300">
                  {{ $struktur->nama_pendek }}
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                  {{ $struktur->nama_lengkap }}
                </p>
              </div>

              {{-- Decorative Elements --}}
              <div class="absolute top-4 left-4 w-8 h-8 border-t-2 border-l-2 border-primary/20 rounded-tl-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
              <div class="absolute bottom-4 right-4 w-8 h-8 border-b-2 border-r-2 border-primary/20 rounded-br-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>
          @endif
        @endforeach

        {{-- Then show other cards --}}
        @foreach ($datas['dataStruktur'] as $struktur)
          @if($struktur->kode !== 'BPI')
            <div class="flex-none w-[300px] group relative bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 ease-in-out hover:-translate-y-2">
              {{-- Image Container --}}
              <div class="relative w-full aspect-square mb-6 overflow-hidden rounded-xl">
                <img 
                  src="{{ asset('storage/'.$struktur->gambar) }}" 
                  alt="{{ $struktur->nama_pendek }}"
                  class="w-full h-full object-cover object-center transform group-hover:scale-105 transition-transform duration-300 ease-in-out"
                >
                {{-- Overlay --}}
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                
                {{-- Code Badge --}}
                <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-sm font-semibold text-primary shadow-lg transform -translate-y-2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                  {{ $struktur->kode }}
                </div>
              </div>

              {{-- Content --}}
              <div class="space-y-2">
                <h3 class="text-xl font-bold text-gray-900 group-hover:text-primary transition-colors duration-300">
                  {{ $struktur->nama_pendek }}
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                  {{ $struktur->nama_lengkap }}
                </p>
              </div>

              {{-- Decorative Elements --}}
              <div class="absolute top-4 left-4 w-8 h-8 border-t-2 border-l-2 border-primary/20 rounded-tl-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
              <div class="absolute bottom-4 right-4 w-8 h-8 border-b-2 border-r-2 border-primary/20 rounded-br-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>
          @endif
        @endforeach

        {{-- Duplicate items for seamless loop --}}
        {{-- First show duplicated BPI card --}}
        @foreach ($datas['dataStruktur'] as $struktur)
          @if($struktur->kode === 'BPI')
            <div class="flex-none w-[300px] group relative bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 ease-in-out hover:-translate-y-2">
              {{-- Image Container --}}
              <div class="relative w-full aspect-square mb-6 overflow-hidden rounded-xl">
                <img 
                  src="{{ asset('storage/'.$struktur->gambar) }}" 
                  alt="{{ $struktur->nama_pendek }}"
                  class="w-full h-full object-cover object-center transform group-hover:scale-105 transition-transform duration-300 ease-in-out"
                >
                {{-- Overlay --}}
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                
                {{-- Code Badge --}}
                <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-sm font-semibold text-primary shadow-lg transform -translate-y-2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                  {{ $struktur->kode }}
                </div>
              </div>

              {{-- Content --}}
              <div class="space-y-2">
                <h3 class="text-xl font-bold text-gray-900 group-hover:text-primary transition-colors duration-300">
                  {{ $struktur->nama_pendek }}
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                  {{ $struktur->nama_lengkap }}
                </p>
              </div>

              {{-- Decorative Elements --}}
              <div class="absolute top-4 left-4 w-8 h-8 border-t-2 border-l-2 border-primary/20 rounded-tl-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
              <div class="absolute bottom-4 right-4 w-8 h-8 border-b-2 border-r-2 border-primary/20 rounded-br-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>
          @endif
        @endforeach

        {{-- Then show other duplicated cards --}}
        @foreach ($datas['dataStruktur'] as $struktur)
          @if($struktur->kode !== 'BPI')
            <div class="flex-none w-[300px] group relative bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 ease-in-out hover:-translate-y-2">
              {{-- Image Container --}}
              <div class="relative w-full aspect-square mb-6 overflow-hidden rounded-xl">
                <img 
                  src="{{ asset('storage/'.$struktur->gambar) }}" 
                  alt="{{ $struktur->nama_pendek }}"
                  class="w-full h-full object-cover object-center transform group-hover:scale-105 transition-transform duration-300 ease-in-out"
                >
                {{-- Overlay --}}
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                
                {{-- Code Badge --}}
                <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-sm font-semibold text-primary shadow-lg transform -translate-y-2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                  {{ $struktur->kode }}
                </div>
              </div>

              {{-- Content --}}
              <div class="space-y-2">
                <h3 class="text-xl font-bold text-gray-900 group-hover:text-primary transition-colors duration-300">
                  {{ $struktur->nama_pendek }}
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                  {{ $struktur->nama_lengkap }}
                </p>
              </div>

              {{-- Decorative Elements --}}
              <div class="absolute top-4 left-4 w-8 h-8 border-t-2 border-l-2 border-primary/20 rounded-tl-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
              <div class="absolute bottom-4 right-4 w-8 h-8 border-b-2 border-r-2 border-primary/20 rounded-br-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>
          @endif
        @endforeach
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
                  <img class="w-28 h-28 md:w-40 md:h-40 object-cover rounded-full ring-4 ring-secondary/20 shadow-2xl" src="{{ asset('storage/'.$review->pengurus->gambar) }}" alt="Foto {{ $review->pengurus->user->name }}">
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