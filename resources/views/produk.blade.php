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
      <a href="/admin/penyewaans" class="text-xs md:text-lg capitalize btn bg-secondary rounded px-4 py-1 shadow-xl text-text-primary hover:bg-text-primary hover:text-primary">
        beli sekarang
      </a>
    </div>
    <div id="gambar" class="absolute bottom-0 right-2 md:right-10 lg:right-25 max-w-[40%]">
      <img src="{{ asset('produk/bottle.png') }}" alt="">
    </div>
  </div>

  {{-- KATALOG --}}
  <div class="py-10 px-5 md:px-21">
    <p class="text-center font-bold text-md md:text-2xl mb-5">Produk kami</p>
    <div class="grid grid-cols-3 lg:grid-cols-4 gap-5">
      @foreach ($datas as $data )
        <div data-aos="fade-up">
          <div class="bg-base rounded">
            <img class="w-[100px] h-[100px] md:w-[200px] md:h-[200px] mx-auto" src="{{ asset($data->gambar) }}" alt="gambar{{ $loop->iteration }}">
            <button class="open-modal text-xs md:text-lg bg-primary text-center w-full text-base uppercase py-1 cursor-pointer hover:bg-base hover:text-primary" data-nama="{{ $data->nama }}" data-harga="{{ number_format($data->harga, 2, ',', '.') }}" data-desk="{{ $data->deskripsi }}">Lihat Detail</button>
          </div>
          <p class="text-xs md:text-lg capitalize font-bold my-1">{{ $data->nama }}</p>
          <p class="text-xs md:text-lg capitalize">Rp {{ number_format($data->harga, 2, ',', '.') }}</p>
        </div>
      @endforeach
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