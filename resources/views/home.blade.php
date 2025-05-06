<x-layout>
  <x-navbar></x-navbar>
  <div class="bg-base-300">
      {{-- GAMBAR TOP CARROUSEL --}}
    <div class="carousel w-full">
      <div id="slide1" class="carousel-item relative w-full">
        <img
          src="https://img.daisyui.com/images/stock/photo-1625726411847-8cbb60cc71e6.webp"
          class="w-full" />
        <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
          <a href="#slide4" class="btn btn-circle">❮</a>
          <a href="#slide2" class="btn btn-circle">❯</a>
        </div>
      </div>
      <div id="slide2" class="carousel-item relative w-full">
        <img
          src="https://img.daisyui.com/images/stock/photo-1609621838510-5ad474b7d25d.webp"
          class="w-full" />
        <div class="absolute left-5 right-5 top-1/2 flex -translate-y-1/2 transform justify-between">
          <a href="#slide1" class="btn btn-circle">❮</a>
          <a href="#slide3" class="btn btn-circle">❯</a>
        </div>
      </div>
    </div>
  
    {{-- ADVOKASI HMJ TI --}}
    @if ($datas['dataPengaduan']->count())
      <div class="m-8">
        <h3 class="text-center font-bold text-3xl mb-4">ADVOKASI</h3>
        <div class="flex flex-col md:flex-row justify-center gap-4">
          @foreach ($datas['dataPengaduan'] as $data )
          <div class="card card-dash md:w-150 bg-base-100">
            <div class="card-body">
              <h2 class="card-title">{{ $data->judul }}</h2>
              <p>{{ Str::limit($data->deskripsi, 160) }}</p>
              <div class="card-actions justify-end">
                <button class="btn btn-primary">Baca</button>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    @endif

    {{-- CARD STRUKTUR ORGANISASI --}}
    @if ($datas['dataDepartemen']->count())
      <div class="bg-base-100 p-8">
        <h3 class="text-center font-bold text-3xl mb-4">STRUKTUR ORGANISASI</h3>
        <div class="carousel rounded-box w-full">
          <div class="carousel-item gap-4">
            @foreach ($datas['dataDepartemen'] as $data )
              <div class="card bg-base-100 w-81 shadow-lg flex-shrink-0">
                <figure>
                  <img
                    src="{{ asset('storage/' . $data->gambar) }}"
                    alt="{{ $data->kode }}" />
                </figure>                
                <div class="card-body">
                  <h2 class="card-title">{{ $data->nama }}</h2>
                  <p>{{ Str::limit($data->deskripsi, 160) }}</p>
                  <div class="card-actions justify-end">
                    <button class="btn btn-primary">Lihat Detail</button>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    @endif

    
</div>
</x-layout>