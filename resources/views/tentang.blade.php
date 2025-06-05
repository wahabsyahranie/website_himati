<x-layout>
    <style>
        .struktur-slider {
            width: 100%;
            height: auto;
            min-height: 450px;
            overflow: visible;
            position: relative;
            padding: 3rem 0;
            margin: 1rem 0;
        }

        .struktur-slider .list {
            display: flex;
            gap: 2rem;
            position: relative;
            width: fit-content;
            animation: slideLeft 15s linear infinite; /* Moved animation to list container */
        }

        .struktur-slider .wrapper {
            overflow: hidden;
            position: relative;
            padding: 1rem 0;
            margin: -1rem 0;
            mask-image: linear-gradient(to right, transparent, #000 10% 90%, transparent);
            -webkit-mask-image: linear-gradient(to right, transparent, #000 10% 90%, transparent);
        }

        .struktur-slider .item {
            flex: 0 0 auto;
            width: 300px;
        }

        .struktur-slider:hover .list {
            animation-play-state: paused;
        }

        .struktur-card {
            background: white;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 100%;
            position: relative;
            z-index: 1;
        }

        .struktur-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 16px rgba(0, 0, 0, 0.2);
            z-index: 2;
        }

        .struktur-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 1rem;
        }

        @keyframes slideLeft {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(calc(-50%));
            }
        }
    </style>

    <x-navbar></x-navbar>

    <!-- Hero Section -->
    <div class="relative w-full py-20 md:py-32 font-display flex flex-col items-center justify-center text-center space-y-8" 
         style="background-image: url('{{ asset('img/aset/bgnav.png') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
        <div class="container mx-auto px-4">
            <div class="bg-white/20 border border-white/30 px-4 py-1 rounded-4xl shadow-md text-text-primary inline-block mb-4">
                Tentang Organisasi Kami
            </div>
            <h1 class="text-3xl md:text-5xl font-bold mb-4 text-text-primary">HIMATI</h1>
            <p class="text-md md:text-xl text-text-primary max-w-3xl mx-auto">
                Himpunan Mahasiswa Teknik Informatika - Mewujudkan Mahasiswa IT yang Kreatif, Inovatif, dan Berdaya Saing
            </p>
        </div>
    </div>

    <!-- About Section -->
    <div class="bg-base py-16">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <h2 class="text-2xl md:text-4xl font-bold text-text-secondary">Siapa Kami?</h2>
                    <p class="text-gray-600 text-sm md:text-lg">
                        HIMATI adalah organisasi mahasiswa yang mewadahi aspirasi dan kegiatan mahasiswa Teknik Informatika. 
                        Kami berkomitmen untuk mengembangkan potensi mahasiswa dalam bidang teknologi informasi dan 
                        menciptakan lingkungan belajar yang kondusif bagi seluruh anggota.
                    </p>
                    <p class="text-gray-600 text-sm md:text-lg">
                        Didirikan dengan semangat kebersamaan dan profesionalisme, HIMATI terus berkembang menjadi 
                        organisasi yang memberikan kontribusi positif bagi kemajuan mahasiswa dan almamater.
                    </p>
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('img/himati-logo.png') }}" alt="HIMATI" class="rounded-lg shadow-xl max-w-md w-full">
                </div>
            </div>
        </div>
    </div>

    <!-- Vision Mission Section -->
    <div class="py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-2xl md:text-4xl font-bold mb-4 text-text-secondary">Visi & Misi</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-sm md:text-lg">
                    Komitmen kami untuk membangun generasi IT yang unggul
                </p>
            </div>
            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                    <h3 class="text-xl md:text-2xl font-bold mb-4 text-primary">Visi</h3>
                    <p class="text-gray-600 text-sm md:text-lg">
                        Menjadi organisasi mahasiswa yang unggul dalam mengembangkan potensi mahasiswa Teknik Informatika
                        yang berlandaskan pada nilai-nilai profesionalisme, kreativitas, dan inovasi teknologi.
                    </p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                    <h3 class="text-xl md:text-2xl font-bold mb-4 text-primary">Misi</h3>
                    <ul class="text-gray-600 space-y-3 text-sm md:text-lg">
                        <li class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-secondary rounded-full"></span>
                            Menyelenggarakan kegiatan pengembangan soft skill dan hard skill mahasiswa
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-secondary rounded-full"></span>
                            Membangun jejaring dengan industri dan organisasi IT
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-secondary rounded-full"></span>
                            Mendukung kegiatan akademik dan non-akademik mahasiswa
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-secondary rounded-full"></span>
                            Mewadahi kreativitas dan inovasi mahasiswa dalam bidang IT
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-secondary rounded-full"></span>
                            Meningkatkan solidaritas dan profesionalisme anggota
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>    <!-- Struktur Organisasi Section -->
    <div class="bg-base py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-2xl md:text-4xl font-bold mb-4 text-text-secondary">Struktur Organisasi</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-sm md:text-lg">
                    Tim yang berdedikasi untuk memajukan HIMATI
                </p>
            </div>
            <div class="struktur-slider">
                <div class="wrapper">
                    <div class="list">
                        @foreach($dataStruktur as $struktur)
                        <div class="item">
                            <div class="struktur-card">
                                @if($struktur->gambar)
                                    <img src="{{ asset($struktur->gambar) }}" alt="{{ $struktur->nama_lengkap }}" loading="lazy">
                                @endif
                                <h3 class="text-lg md:text-xl font-bold mb-2 text-primary">{{ $struktur->nama_lengkap }}</h3>
                                <p class="text-gray-600 text-sm md:text-base mb-2">{{ $struktur->nama_pendek }}</p>
                                @if($struktur->deskripsi)
                                <p class="text-gray-500 text-sm">{{ $struktur->deskripsi }}</p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                        @foreach($dataStruktur as $struktur)
                        <div class="item">
                            <div class="struktur-card">
                                @if($struktur->gambar)
                                    <img src="{{ asset($struktur->gambar) }}" alt="{{ $struktur->nama_lengkap }}" loading="lazy">
                                @endif
                                <h3 class="text-lg md:text-xl font-bold mb-2 text-primary">{{ $struktur->nama_lengkap }}</h3>
                                <p class="text-gray-600 text-sm md:text-base mb-2">{{ $struktur->nama_pendek }}</p>
                                @if($struktur->deskripsi)
                                <p class="text-gray-500 text-sm">{{ $struktur->deskripsi }}</p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Programs Section -->
    <div class="py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-2xl md:text-4xl font-bold mb-4 text-text-secondary">Program Unggulan</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-sm md:text-lg">
                    Kegiatan yang kami lakukan untuk pengembangan anggota
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-6 max-w-5xl mx-auto">
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transition-all duration-300 hover:-translate-y-1" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold mb-3 text-primary">Pelatihan & Workshop</h3>
                    <p class="text-gray-600 text-sm md:text-base">
                        Berbagai pelatihan dan workshop teknologi terkini untuk meningkatkan kompetensi mahasiswa.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transition-all duration-300 hover:-translate-y-1" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold mb-3 text-primary">Kompetisi IT</h3>
                    <p class="text-gray-600 text-sm md:text-base">
                        Wadah bagi mahasiswa untuk mengasah kemampuan melalui berbagai kompetisi teknologi.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow hover:shadow-xl transition-all duration-300 hover:-translate-y-1" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold mb-3 text-primary">Study Club</h3>
                    <p class="text-gray-600 text-sm md:text-base">
                        Kelompok belajar untuk mengembangkan skill pemrograman dan teknologi informasi.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <x-footer></x-footer>
</x-layout>