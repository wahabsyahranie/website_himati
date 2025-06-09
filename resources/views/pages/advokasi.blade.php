<x-layout>
  <x-navbar></x-navbar>
  {{-- CONTENT --}}
  <div class="w-full bg-gradient-to-b from-white to-gray-50/50 min-h-screen">
    <!-- Hero Image Section with Gradient Overlay -->
    <div class="relative w-full h-[50vh] mb-12 overflow-hidden">
        @if ($pengaduan->gambar !== null)
            <img class="w-full h-full object-cover" src="{{ asset($pengaduan->gambar) }}" alt="main">
        @else 
            <img class="w-full h-full object-cover" src="{{ asset('pengaduan/default.png') }}" alt="main">
        @endif
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-white/90"></div>
    </div>

    <div class="container mx-auto px-4 lg:px-8 -mt-20 relative z-10">
        <div class="flex flex-col lg:flex-row gap-8 lg:gap-16">
            <!-- Main Content -->
            <div class="lg:w-3/4">
                <article class="bg-white rounded-3xl p-8 shadow-xl backdrop-blur-sm backdrop-opacity-10 transition-all duration-300 hover:shadow-2xl">
                    <!-- Title -->
                    <h1 class="text-2xl lg:text-4xl font-bold text-gray-800 mb-6 capitalize">{{ $pengaduan->judul }}</h1>
                    
                    <!-- Meta Information -->
                    <div class="flex flex-wrap gap-4 mb-8">
                        <span class="inline-flex items-center bg-primary/5 text-primary font-medium rounded-full px-4 py-1.5 text-sm tracking-wide">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            {{ $pengaduan->created_at->translatedFormat('l, j F Y') }}
                        </span>
                        <span class="inline-flex items-center bg-secondary/5 text-secondary font-medium rounded-full px-4 py-1.5 text-sm tracking-wide uppercase">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            {{ $pengaduan->tujuan }}
                        </span>
                    </div>

                    <!-- Content -->
                    <div class="prose max-w-none">
                        <p class="text-gray-600 text-lg leading-relaxed">{{ $pengaduan->deskripsi }}</p>
                    </div>
                </article>
            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/4">
                <div class="bg-white rounded-3xl p-6 shadow-xl backdrop-blur-sm">
                    <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        Mungkin Anda Suka
                    </h3>
                    
                    @foreach ($collects as $collect)
                        @if ($loop->first)
                            <div class="mb-6 rounded-2xl overflow-hidden shadow-md transition-all duration-300 hover:shadow-xl">
                                @if ($collect->gambar !== null)
                                    <img class="w-full aspect-[2/1] object-cover" src="{{ asset($collect->gambar) }}" alt="mungkin-suka">
                                @else
                                    <img class="w-full aspect-[2/1] object-cover" src="{{ asset('pengaduan/default.png') }}" alt="mungkin-suka">
                                @endif
                            </div>
                        @endif
                        
                        <div class="mb-6 group">
                            <time class="text-sm text-gray-500 mb-2 inline-block bg-gray-100 rounded-full px-3 py-1">
                                {{ $collect->created_at->translatedFormat('l, j F Y') }}
                            </time>
                            <h4 class="font-semibold hover:text-primary transition-colors duration-200">
                                <a href="/advokasi/{{ $collect->slug }}" class="hover:underline decoration-2 decoration-primary/30">
                                    {{ $collect->judul }}
                                </a>
                            </h4>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

  {{-- FOOTER --}}
  <x-footer></x-footer>
</x-layout>