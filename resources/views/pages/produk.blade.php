<x-layout>
  <x-navbar></x-navbar>
  {{-- HERO --}}
  <div id="beranda" class="w-full py-16 md:py-0 h-auto md:min-h-screen font-display flex flex-col items-center justify-center text-center text-sm md:text-text-primary space-y-8 lg:px-32.5 bg-gradient-to-br from-[#030c1a] to-[#0a4d78]">
    <div class="flex flex-col justify-center items-center w-full px-4 md:px-18 space-y-6">
      <p class="bg-white/20 border border-white/30 px-4 py-1 rounded-4xl shadow-md text-text-primary">Layanan Penyewaan</p>
      <p class="font-[700] text-md md:text-[40px] leading-snug w-[90%] md:w-full text-text-primary">
        Kelola Kebutuhan Inventaris Organisasi Dengan Mudah Dan Efisien. 
        <span class="text-secondary">Sistem Penyewaan Yang Terintegrasi</span> Untuk Semua Keperluan.
      </p>
      <p class="w-[70%] md:w-[80%] text-text-primary">
        Bersama HIMATI, Wujudkan Pengelolaan Inventaris Yang Profesional Dan Terorganisir.
      </p>
      <a href="#promotion" class="inline-flex items-center px-6 py-3 text-sm font-semibold bg-secondary rounded-full shadow-xl text-text-primary transform transition duration-300 ease-in-out hover:bg-text-primary hover:text-primary hover:scale-105 hover:-translate-y-1 hover:shadow-2xl group">
        Sewa Sekarang
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
        </svg>
      </a>
    </div>
  </div>

  {{-- KATALOG --}}
  <div class="py-16 px-5 md:px-21 bg-gray-50">
    <div class="max-w-7xl mx-auto">
      <h2 class="text-center font-bold text-2xl md:text-3xl mb-8 text-gray-800">Produk Kami</h2>
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @if(count($datas) > 0)
          @foreach ($datas as $data)
            <div data-aos="fade-up" class="group">
              <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition-transform duration-300 hover:scale-105">
                <div class="relative overflow-hidden">
                  <img class="w-full h-48 md:h-64 object-cover object-center transform transition-transform duration-500 group-hover:scale-110" 
                       src="{{ asset('storage/'.$data->gambar) }}" 
                       alt="gambar{{ $loop->iteration }}">
                </div>
                <div class="p-4">
                  <h3 class="text-lg md:text-xl font-semibold text-gray-800 mb-2 capitalize">{{ $data->nama }}</h3>
                  <p class="text-lg md:text-xl font-bold text-primary mb-3">
                    Rp {{ number_format($data->harga, 2, ',', '.') }}
                  </p>
                  <button class="open-modal w-full bg-primary text-text-primary rounded-md px-4 py-2 text-sm md:text-base font-medium 
                                 transition-colors duration-300 transform hover:bg-secondary hover:scale-105 
                                 uppercase tracking-wide shadow-md"
                          data-nama="{{ $data->nama }}" 
                          data-harga="{{ number_format($data->harga, 2, ',', '.') }}" 
                          data-desk="{{ $data->deskripsi }}">
                    Lihat Detail
                  </button>
                </div>
              </div>
            </div>
          @endforeach
        @else
          <div class="col-span-4 text-center text-gray-500 py-10">
            Tidak ada produk tersedia.
          </div>
        @endif
      </div>
    </div>
  </div>

  {{-- MODAL --}}
  <x-modal>
    <h1 id="modal-nama" class="text-lg font-bold"></h1>
    <p id="modal-desk" class="text-[14px] py-2"></p>
    <p id="modal-harga" class="text-[14px] pt-2 font-semibold"></p>
    <p id="modal-satuan" class="text-[12px] text-gray-500 -mt-1"></p>
  </x-modal>

  {{-- FOOTER CTA --}}
  <div class="relative w-full py-16 md:py-13 bg-gradient-to-br from-[#030c1a] to-[#0a4d78] overflow-hidden">
    <div class="absolute inset-0 bg-[url('{{ asset('img/aset/bgnav.png') }}')] bg-cover bg-center opacity-10"></div>
    
    <div class="relative max-w-4xl mx-auto px-6 md:px-8 text-center space-y-8 z-10">
      <div class="space-y-4">
        <h2 class="font-bold text-2xl md:text-[42px] text-text-primary leading-tight">
          Layanan Penyewaan <br class="hidden md:block">
          Untuk Organisasi Anda
        </h2>
      </div>
      
      <p class="text-text-primary/80 md:text-lg max-w-2xl mx-auto leading-relaxed">
        Nikmati kemudahan dalam mengelola inventaris organisasi Anda dengan sistem penyewaan kami. 
        Kami menyediakan berbagai peralatan dan fasilitas berkualitas untuk mendukung setiap kegiatan organisasi Anda.
      </p>
      
      <div class="pt-4">
        <a href="/admin" class="inline-flex items-center px-5 py-2.5 md:px-6 md:py-3 text-sm font-semibold bg-secondary rounded-full shadow-xl text-text-primary transform transition duration-300 ease-in-out hover:bg-text-primary hover:text-primary hover:scale-105 hover:-translate-y-1 hover:shadow-2xl group">
          Sewa Sekarang
        </a>
      </div>
    </div>

    <!-- Decorative Images -->
    <div class="absolute left-0 bottom-0 opacity-20 transform -translate-x-1/4 translate-y-1/4">
      <img class="w-[200px] md:w-[300px] lg:w-[400px] rotate-[30deg]" src="{{ asset('produk/bottle.png') }}" alt="Decorative Left">
    </div>
    <div class="absolute right-0 bottom-0 opacity-20 transform translate-x-1/4 translate-y-1/4">
      <img class="w-[200px] md:w-[300px] lg:w-[400px] rotate-[-30deg]" src="{{ asset('produk/bottle.png') }}" alt="Decorative Right">
    </div>
  </div>
  </div>

  {{-- FOOTER --}}
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
</x-layout>