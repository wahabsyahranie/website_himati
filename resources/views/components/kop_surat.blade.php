<x-layout>
    <div class="w-[794px] h-[1123px] mx-auto bg-white">
        <!-- Header -->
        <div class="shadow border-b-4 border-double border-black flex justify-between items-center px-4 py-2">
            <!-- Logo POLNES (Kiri) -->
            <div class="w-2/12">
                <img src="{{ asset('img/lambang_polnes.svg') }}" class="w-24 mx-auto">
            </div>

            <!-- Informasi Toko (Tengah) -->
            <div class="w-8/12 text-center">
                <h3 class="text-sm font-serif">KEMENTERIAN PENDIDIKAN TINGGI, SAINS DAN TEKNOLOGI</h3>
                <h3 class="text-sm font-bold font-serif">HIMPUNAN MAHASISWA JURUSAN TEKNOLOGI INFORMASI</h3>
                <h3 class="text-sm font-bold font-serif">POLITEKNIK NEGERI SAMARINDA</h3>
                <h5 class="text-sm font-serif">Jalan Cipto Mangunkusumo Kampus Gunung Panjang Samarinda 75131</h5>
                <p class="text-sm font-serif">No HP: 085298381263, E-mail: himati@polnes.ac.id</p>
            </div>

            <!-- Logo HIMA TI (Kanan) -->
            <div class="w-2/12">
                <img src="{{ asset('img/lambang_hima_ti.svg') }}" class="w-24 mx-auto">
            </div>
        </div>

        <!-- Slot Content -->
        <div class="mt-4 px-15 font-serif">
            {{ $slot }}
        </div>
    </div>
</x-layout>
