<x-layout>
  <x-navbar></x-navbar>
  {{-- HERO --}}
  <div class="relative px-5 md:px-21 w-ful pb-10 pt-12 md:py-0 md:h-[700px] lg:h-screen bg-primary flex flex-row items-center" style="background-image: url('{{ asset('img/aset/bgnav.png') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <div class="text-text-primary md:max-w-[50%]">
      <p class="text-md md:text-xl uppercase my-1" >steel bottle</p>
      <div class="max-w-[70%] md:max-w-[90%] lg:max-w-[70%]">
        <p class="leading-snug text-xl md:text-4xl uppercase">which needed <span class="font-bold text-[20px] md:text-[40px]">every day</span></p>
      </div>
      <p class="text-sm md:text-xl my-[3%] max-w-[220px] md:max-w-[500px]">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci sed quia doloremque illum iure perspiciatis id, odio aut nesciunt ab hic cupiditate maxime illo suscipit magnam? Blanditiis aut asperiores beatae?</p>
      <a href="#promotion" class="inline-flex items-center px-6 py-3 text-sm font-semibold bg-secondary rounded-full shadow-xl text-text-primary transform transition duration-300 ease-in-out hover:bg-text-primary hover:text-primary hover:scale-105 hover:-translate-y-1 hover:shadow-2xl group">
        Beli Sekarang
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
        </svg>
      </a>
    </div>
    <div id="gambar" class="absolute bottom-0 right-2 md:right-10 lg:right-25 max-w-[40%]">
      <img src="{{ asset('img/pengurus/humed.jpg') }}" alt="">
    </div>
  </div>

  {{-- KATALOG --}}
  <div class="py-16 px-5 md:px-21 bg-gray-50">
    <div class="max-w-7xl mx-auto">
      <h2 class="text-center font-bold text-2xl md:text-3xl mb-8 text-gray-800">Produk Kami</h2>
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($datas as $data)
          <div data-aos="fade-up" class="group">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition-transform duration-300 hover:scale-105">
              <div class="relative overflow-hidden">
                <img class="w-full h-48 md:h-64 object-cover object-center transform transition-transform duration-500 group-hover:scale-110" 
                     src="{{ asset($data->gambar) }}" 
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

  {{-- FOOTER --}}
  <div class="relative px-5 md:px-21 flex flex-row justify-center py-10 md:py-15 w-full bg-primary items-center text-text-primary text-center overflow-hidden"
     style="background-image: url('{{ asset('img/aset/bgnav.png') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <img class="w-[150px] md:w-[200px] lg:w-[350px] absolute bottom-[-55px] left-[-55px] rotate-[30deg]" src="{{ asset('produk/bottle.png') }}" alt="">
    <div class="max-w-xl z-10">
      <p class="uppercase text-xl md:text-4xl max-w-[300px] md:max-w-[500px] mx-auto">The best water bottle starter <span class="font-bold">today</span></p>
      <p class="py-3 text-xs md:text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi saepe amet ipsam modi, vitae tempore explicabo ducimus eveniet ullam sed eius nobis velit officia architecto vel autem totam, earum dolorum.</p>
      <a href="/admin/penyewaans" class="text-xs md:text-lg capitalize btn bg-secondary rounded px-4 py-1 shadow-xl text-text-primary hover:bg-text-primary hover:text-primary">
        beli sekarang
      </a>
    </div>
    <img class="w-[150px] md:w-[200px] lg:w-[300px] absolute bottom-[-40px] right-[-40px] rotate-[-30deg]" src="{{ asset('produk/bottle.png') }}" alt="">
  </div>
</x-layout>