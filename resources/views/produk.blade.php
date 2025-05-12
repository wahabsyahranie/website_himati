<x-layout>
  <x-navbar></x-navbar>
  {{-- HERO --}}
  <div class="relative px-21 w-ful h-screen bg-primary flex flex-row items-center" style="background-image: url('{{ asset('img/aset/bgnav.png') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <div class="text-text-primary max-w-[50%]">
      <p class="text-xl uppercase my-1" >steel bottle</p>
      <div class="max-w-[50%]">
        <p class="leading-snug text-4xl uppercase">which needed <span class="font-bold text-[40px]">every day</span></p>
      </div>
      <p class="text-xl my-[3%]">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci sed quia doloremque illum iure perspiciatis id, odio aut nesciunt ab hic cupiditate maxime illo suscipit magnam? Blanditiis aut asperiores beatae?</p>
      <a href="/admin/penyewaans" class="capitalize btn bg-secondary rounded px-4 py-1 shadow-xl text-text-primary hover:bg-text-primary hover:text-primary">
        beli sekarang
      </a>
    </div>
    <div id="gambar" class="absolute bottom-0 right-25 max-w-[40%]">
      <img src="{{ asset('produk/bottle.png') }}" alt="">
    </div>
  </div>

  {{-- KATALOG --}}
  <div class="py-5 px-21">
    <p class="text-center font-bold text-2xl mb-5">Produk kami</p>
    <div class="grid grid-cols-4 gap-5">
      @foreach ($datas as $data )
        <div>
          <div class="bg-base rounded">
            <img class="w-[200px] h-[200px] mx-auto" src="{{ asset($data->gambar) }}" alt="gambar{{ $loop->iteration }}">
            <p class="bg-primary text-center text-base uppercase py-1">Lihat Detail</p>
          </div>
          <p class="capitalize font-bold my-1">{{ $data->nama }}</p>
          <p class="capitalize font-bold">Rp {{ number_format($data->harga, 2, ',', '.') }}</p>
        </div>
      @endforeach
    </div>
  </div>

  {{-- FOOTER --}}
  <div class="relative px-21 flex flex-row justify-center py-15 w-full bg-primary items-center text-text-primary text-center overflow-hidden"
     style="background-image: url('{{ asset('img/aset/bgnav.png') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
  <img class="w-[350px] absolute bottom-[-55px] left-[-55px] rotate-[30deg]" src="{{ asset('produk/bottle.png') }}" alt="">
  <div class="max-w-xl z-10">
    <p class="uppercase text-4xl max-w-[500px] mx-auto">The best water bottle starter <span class="font-bold">today</span></p>
    <p class="py-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi saepe amet ipsam modi, vitae tempore explicabo ducimus eveniet ullam sed eius nobis velit officia architecto vel autem totam, earum dolorum.</p>
    <a href="/admin/penyewaans" class="capitalize btn bg-secondary rounded px-4 py-1 shadow-xl text-text-primary hover:bg-text-primary hover:text-primary">
      beli sekarang
    </a>
  </div>
  <img class="w-[300px] absolute bottom-[-40px] right-[-40px] rotate-[-30deg]" src="{{ asset('produk/bottle.png') }}" alt="">

</div>

</x-layout>