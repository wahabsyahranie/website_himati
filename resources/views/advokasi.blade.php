<x-layout>
  <x-navbar></x-navbar>
  {{-- CONTENT --}}
  <div class="w-full">
    <img class="w-full aspect-[3/1] object-cover mb-[2%]" src="{{ asset('/img/aset/1.png') }}" alt="main">
    <div class="px-20 flex flex-row gap-10">
      <div class="basis-3/4">
        <p class="capitalize font-bold text-xl mb-[1%]">perilaku tidak terhormat anggota HIMA TI</p>
        <div class="flex flex-row gap-7 mb-[2%]">
          <p class="bg-base px-4 rounded capitalize">Rabu, 11 May 2025</p>
          <p class="bg-base px-4 rounded uppercase">HMJ TI</p>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Debitis, temporibus ipsam atque molestiae enim fugit facilis in maxime libero expedita sit earum sapiente eligendi officiis quam laboriosam commodi fugiat? Illo? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde nam placeat nihil nostrum impedit consequatur dolorem temporibus reprehenderit provident, dolores magni cumque repudiandae illum voluptatum facere reiciendis dolore corrupti porro!</p>
      </div>
      <div class="basis-1/4 mt-[1%]">
        <p class="font-bold mb-[3%]">Mungkin anda suka</p>
        <img class="mb-[5%] w-full aspect-[2/1] object-cover rounded" src="{{ asset('/img/aset/1.png') }}" alt=mungkin-suka">
        <p class="bg-base rounded px-3 w-fit mb-[3%]">Rabu, 7 Mei 2025</p>
        <p class="font-bold w-[70%] mb-[10%]">Daya beli masyarakat menurun</p>
        <p class="bg-base rounded px-3 w-fit mb-[3%]">Rabu, 7 Mei 2025</p>
        <p class="font-bold w-[70%] mb-[10%]">Daya beli masyarakat menurun</p>
        <p class="bg-base rounded px-3 w-fit mb-[3%]">Rabu, 7 Mei 2025</p>
        <p class="font-bold w-[70%] mb-[10%]">Daya beli masyarakat menurun</p>
      </div>
    </div>
  </div>

  {{-- FOOTER --}}
  <x-footer></x-footer>
</x-layout>