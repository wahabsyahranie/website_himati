<x-layout>
  <x-navbar></x-navbar>
  {{-- CONTENT --}}
  <div class="w-full">
    @if ($pengaduan->gambar !== null)
      <img class="w-full aspect-[3/1] object-cover mb-[2%]" src="{{ asset($pengaduan->gambar) }}" alt="main">
    @else 
      <img class="w-full aspect-[3/1] object-cover mb-[2%]" src="{{ asset('pengaduan/default.png') }}" alt="main">
    @endif
    <div class="px-20 flex flex-row gap-10">
      <div class="basis-3/4">
        <p class="capitalize font-bold text-xl mb-[1%]">{{ $pengaduan->judul }}</p>
        <div class="flex flex-row gap-7 mb-[2%]">
          <p class="bg-base px-4 rounded capitalize">{{ $pengaduan->created_at->translatedFormat('l, j F Y') }}</p>
          <p class="bg-base px-4 rounded uppercase">{{ $pengaduan->tujuan }}</p>
        </div>
        <p>{{ $pengaduan->deskripsi }}</p>
      </div>
      <div class="basis-1/4 mt-[1%]">
        <p class="font-bold mb-[3%]">Mungkin anda suka</p>
        @foreach ($collects as $collect)
          @if ($loop->first)
            @if ($collect->gambar !== null)
              <img class="mb-[5%] w-full aspect-[2/1] object-cover rounded" src="{{ asset($collect->gambar) }}" alt=mungkin-suka">
            @else
              <img class="mb-[5%] w-full aspect-[2/1] object-cover rounded" src="{{ asset('pengaduan/default.png') }}" alt="mungkin-suka">
            @endif
          @endif
          <p class="bg-base rounded px-3 w-fit mb-[3%]">{{ $collect->created_at->translatedFormat('l, j F Y') }}</p>
          <p class="font-bold w-[70%] mb-[10%]">{{ $collect->judul }}</p>
        @endforeach
      </div>
    </div>
  </div>

  {{-- FOOTER --}}
  <x-footer></x-footer>
</x-layout>