<x-layout>
    <x-navbar></x-navbar>

    <!-- Hero Section -->
    <div id="tentang-kami" class="w-full py-16 md:py-0 h-auto md:min-h-screen font-display flex flex-col items-center justify-center text-center text-sm md:text-text-primary space-y-8 lg:px-32.5 bg-gradient-to-br from-[#030c1a] to-[#0a4d78]">
    <div class="flex flex-col justify-center items-center w-full px-4 md:px-18 space-y-6">
      <p class="bg-white/20 border border-white/30 px-4 py-1 rounded-4xl shadow-md text-text-primary">Tentang Kami</p>
      <p class="font-[700] text-md md:text-[40px] leading-snug w-[90%] md:w-full text-text-primary">
        Mengenal Lebih Dekat HIMATI. 
        <span class="text-secondary">Himpunan Mahasiswa Teknologi Informasi</span>, Wadah Kreativitas dan Inovasi
      </p>
      <p class="w-[70%] md:w-[80%] text-text-primary">
        Dedikasi untuk Pengembangan Potensi dan Pemberdayaan Mahasiswa Teknologi Informasi Menuju Era Digital
      </p>
      <a href="#about" class="inline-flex items-center px-6 py-3 text-sm font-semibold bg-secondary rounded-full shadow-xl text-text-primary transform transition duration-300 ease-in-out hover:bg-text-primary hover:text-primary hover:scale-105 hover:-translate-y-1 hover:shadow-2xl group">
        Pelajari Selengkapnya
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
        </svg>
      </a>
    </div>
  </div>

    <!-- About Section -->
    <section class="py-10 md:py-20 bg-gradient-to-b from-white to-gray-50/50 relative overflow-hidden font-display flex items-center">
        <!-- Decorative background patterns -->
        <div id="about" class="absolute inset-0 bg-grid-primary/5 -skew-y-12 opacity-20"></div>
        <!-- Animated background circles -->
        <div class="absolute top-0 right-0 w-1/2 h-1/2 bg-gradient-to-br from-primary/10 to-secondary/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-1/2 h-1/2 bg-gradient-to-tr from-secondary/10 to-primary/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
        
        <div class="container mx-auto px-6 relative">
            <div class="max-w-7xl mx-auto w-full">
                <div class="grid md:grid-cols-2 gap-16 lg:gap-24 items-center">
                    <div class="space-y-12 relative">
                        
                        <!-- Main heading -->
                        <h2 class="text-2xl md:text-4xl font-[700] text-gray-800 leading-tight">
                            Siapa <span class="text-primary relative inline-block">Kami?
                                <div class="absolute -bottom-2 left-0 w-full h-1 bg-gradient-to-r from-primary/40 to-secondary/40 rounded-full"></div>
                            </span>
                        </h2>
                        
                        <!-- Text content -->
                        <div class="space-y-6 pl-4 border-l-2 border-primary/10">
                            <p class="text-sm md:text-lg text-gray-600 leading-relaxed">
                                <span class="font-semibold text-gray-800">HIMATI</span> adalah organisasi mahasiswa yang mewadahi aspirasi dan kegiatan mahasiswa Teknologi Informasi. 
                                Kami berkomitmen untuk mengembangkan potensi akademik dan soft skill mahasiswa TI melalui berbagai 
                                program kerja yang inovatif dan bermanfaat.
                            </p>
                            <p class="text-sm md:text-lg text-gray-600 leading-relaxed">
                                Didirikan dengan semangat kebersamaan, HIMATI terus berkembang menjadi organisasi yang 
                                <span class="font-semibold text-gray-800">profesional</span> dan <span class="font-semibold text-gray-800">modern</span>, siap menghadapi tantangan di era digital.
                            </p>
                        </div>
                    </div>
                    
                    <!-- Modern image display with better sizing -->
                    <div class="relative w-full aspect-square max-w-lg mx-auto group">
                        <!-- Modern gradient background -->
                        <div class="absolute inset-0 bg-gradient-to-br from-primary/5 via-transparent to-secondary/5 rounded-[2.5rem] backdrop-blur-xl"></div>
                        
                        <!-- Modern frame effect -->
                        <div class="absolute inset-4 border border-gray-200/20 rounded-[2rem] backdrop-blur-sm"></div>
                        <div class="absolute inset-0 bg-white/5 rounded-[2.5rem]"></div>
                        
                        <!-- Floating accent elements -->
                        <div class="absolute -right-4 top-1/4 w-20 h-20 bg-gradient-to-br from-primary/20 to-transparent rounded-full blur-2xl animate-pulse"></div>
                        <div class="absolute -left-4 bottom-1/4 w-20 h-20 bg-gradient-to-tr from-secondary/20 to-transparent rounded-full blur-2xl animate-pulse delay-700"></div>
                        
                        <!-- Main image container with modern styling -->
                        <div class="relative h-full p-8 transform transition duration-700 ease-out">
                            <div class="relative h-full rounded-2xl overflow-hidden bg-gradient-to-br from-gray-50 to-white
                                      shadow-[0_8px_40px_-12px_rgba(0,0,0,0.1)] hover:shadow-[0_20px_80px_-12px_rgba(0,0,0,0.15)]
                                      transition-all duration-700 group-hover:scale-[1.02]">
                                <!-- Shine effect -->
                                <div class="absolute inset-0 bg-gradient-to-tr from-white/10 via-white/50 to-white/10 opacity-0 
                                          group-hover:opacity-100 transition-opacity duration-700 -rotate-12 scale-150"></div>
                                
                                <!-- Image with better sizing -->
                                <div class="relative h-full w-full p-4 flex items-center justify-center">
                                    <img src="{{ asset('img/lambang_hima_ti.png') }}" alt="HIMATI Team" 
                                         class="w-[85%] h-[85%] object-contain transform transition-transform duration-700 
                                                group-hover:scale-110">
                                </div>
                                
                                <!-- Modern overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/5 via-transparent to-white/5 opacity-0 
                                          group-hover:opacity-100 transition-all duration-700"></div>
                            </div>
                            
                            <!-- Minimal decorative corners -->
                            <div class="absolute top-4 right-4 w-8 h-8 border-t-2 border-r-2 border-primary/30 rounded-tr-xl"></div>
                            <div class="absolute bottom-4 left-4 w-8 h-8 border-b-2 border-l-2 border-secondary/30 rounded-bl-xl"></div>
                        </div>
                        
                        <!-- Subtle shadow effect -->
                        <div class="absolute -inset-0.5 bg-gradient-to-br from-primary/5 to-secondary/5 rounded-[2.5rem] blur-2xl 
                                  opacity-0 group-hover:opacity-100 transition-opacity duration-700 -z-10"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision Mission Section -->
    <section class="py-24 bg-gradient-to-br from-gray-50 to-gray-100 relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute inset-0 pattern-dots opacity-[0.03]"></div>
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-secondary/5 rounded-full blur-3xl"></div>

        <div class="container mx-auto px-4 relative">
            <div class="max-w-7xl mx-auto w-full">
                <!-- Main Content Grid -->
                <div class="grid md:grid-cols-2 gap-16 lg:gap-24 items-center">
                    <!-- Enhanced Single Image Column -->
                    <div class="relative group mx-auto w-full max-w-2xl order-last md:order-first">
                        <!-- Background Effects -->
                        <div class="absolute inset-0 bg-gradient-to-br from-primary/5 via-transparent to-secondary/5 rounded-[2.5rem] -z-10"></div>
                        <div class="absolute -right-4 top-1/4 w-32 h-32 bg-gradient-to-br from-primary/20 to-transparent rounded-full blur-2xl animate-pulse"></div>
                        <div class="absolute -left-4 bottom-1/4 w-32 h-32 bg-gradient-to-tr from-secondary/20 to-transparent rounded-full blur-2xl animate-pulse delay-700"></div>

                        <!-- Main Image Container -->
                        <div class="relative rounded-[2rem] overflow-hidden bg-white p-2">
                            <!-- Gradient Border -->
                            <div class="absolute inset-0 bg-gradient-to-br from-primary/20 via-transparent to-secondary/20 rounded-[2rem]"></div>
                            
                            <!-- Image Wrapper -->
                            <div class="relative overflow-hidden rounded-[1.7rem] bg-gradient-to-br from-gray-50 to-white aspect-[4/3]">
                                <img src="{{ asset('img/aset/HIMATI1.jpg') }}" 
                                     alt="HIMATI Team" 
                                     class="w-full h-full object-cover transform transition-all duration-700 
                                            group-hover:scale-105">
                                
                                <!-- Hover Effects -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent 
                                          opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                                
                                <!-- Shine Effect -->
                                <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/30 to-white/0 opacity-0 
                                          group-hover:opacity-100 transition-all duration-700 -rotate-45 translate-x-[-100%]
                                          group-hover:translate-x-[200%]"></div>
                            </div>
                            
                            <!-- Decorative Corners -->
                            <div class="absolute top-3 right-3 w-8 h-8 border-t-2 border-r-2 border-primary/30 rounded-tr-xl"></div>
                            <div class="absolute bottom-3 left-3 w-8 h-8 border-b-2 border-l-2 border-secondary/30 rounded-bl-xl"></div>
                        </div>
                        
                        <!-- Enhanced Shadow -->
                        <div class="absolute -inset-1 bg-gradient-to-br from-primary/5 to-secondary/5 rounded-[2.5rem] blur-2xl 
                                  opacity-0 group-hover:opacity-100 transition-all duration-700 -z-20"></div>
                    </div>
                
                <!-- Vision Mission Content - NOW ON RIGHT -->
                <div class="space-y-8">
                    <!-- Main heading with animated underline -->
                    <h2 class="text-2xl md:text-4xl font-[700] text-gray-800 leading-tight">
                        Arah dan <span class="text-primary relative inline-block">Tujuan
                            <div class="absolute -bottom-2 left-0 w-full h-1 bg-gradient-to-r from-primary/40 to-secondary/40 rounded-full"></div>
                        </span>
                    </h2>

                    <!-- Vision Card -->
                    <article class="group relative bg-white text-gray-800 rounded-2xl p-10 text-left shadow-sm transition-all duration-300 hover:shadow-lg hover:-translate-y-1" data-aos="fade-up" data-aos-delay="150">
                        <!-- Card Content -->
                        <div class="relative">
                            <!-- Title -->
                            <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 group-hover:text-primary transition-colors duration-300">Visi Kami</h3>

                            <!-- Vision Content -->
                            <div class="relative">
                                <p class="md:text-lg leading-relaxed text-gray-600">
                                    Menjadikan Himpunan Mahasiswa Teknologi Informasi Sebagai
                                    <span class="relative inline-block group-hover:-translate-y-0.5 transition-transform duration-300">
                                        <span class="font-medium text-primary relative">
                                            Wadah Pengembangan
                                            <span class="absolute inset-x-0 bottom-0 h-[3px] bg-primary/10 group-hover:h-full group-hover:bg-primary/5 transition-all duration-300 ease-out -z-10 rounded-sm"></span>
                                        </span>
                                    </span> 
                                    dan 
                                    <span class="relative inline-block group-hover:-translate-y-0.5 transition-transform duration-300">
                                        <span class="font-medium text-primary relative">
                                            Menciptakan Kolaborasi
                                            <span class="absolute inset-x-0 bottom-0 h-[3px] bg-primary/10 group-hover:h-full group-hover:bg-primary/5 transition-all duration-300 ease-out -z-10 rounded-sm"></span>
                                        </span>
                                    </span> 
                                    di antara Masyarakat Jurusan Teknologi Informasi.
                                </p>
                            </div>
                        </div>

                        <!-- Clean Border Effect -->
                        <div class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-transparent via-primary/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
                    </article>

                    <!-- Mission Card -->
                    <article class="group relative bg-white text-gray-800 rounded-2xl p-6 md:p-8 text-left shadow-sm transition-all duration-300 hover:shadow-lg hover:-translate-y-1" data-aos="fade-up" data-aos-delay="300">
                        <!-- Card Content -->
                        <div class="relative">
                            <!-- Title -->
                            <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-5 group-hover:text-secondary transition-colors duration-300">Misi Kami</h3>

                            <!-- Mission List -->
                            <ul class="space-y-4">
                                <li class="group/item flex items-start gap-3">
                                    <span class="w-1.5 h-1.5 rounded-full bg-secondary/30 mt-2.5 group-hover/item:bg-secondary transition-colors duration-300"></span>
                                    <span class="md:text-lg text-gray-600 group-hover/item:text-gray-900 transition-colors duration-300">
                                        Mengembangkan SDM Mahasiswa Jurusan Teknologi Informasi yang selaras dengan jurusannya
                                    </span>
                                </li>
                                <li class="group/item flex items-start gap-3">
                                    <span class="w-1.5 h-1.5 rounded-full bg-secondary/30 mt-2.5 group-hover/item:bg-secondary transition-colors duration-300"></span>
                                    <span class="md:text-lg text-gray-600 group-hover/item:text-gray-900 transition-colors duration-300">
                                        Mempersiapkan Mahasiswa Jurusan Teknologi Informasi untuk turut andil dalam memajukan jurusannya
                                    </span>
                                </li>
                                <li class="group/item flex items-start gap-3">
                                    <span class="w-1.5 h-1.5 rounded-full bg-secondary/30 mt-2.5 group-hover/item:bg-secondary transition-colors duration-300"></span>
                                    <span class="md:text-lg text-gray-600 group-hover/item:text-gray-900 transition-colors duration-300">
                                        Menjadikan HIMA TI sebagai wadah kebersamaan bagi Mahasiswa Jurusan Teknologi Informasi
                                    </span>
                                </li>
                            </ul>
                        </div>

                        <!-- Clean Border Effect -->
                        <div class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-transparent via-secondary/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-24 bg-gray-50" 
    x-data="{ 
        activeModal: null,
        galleries: {
            workshop: {
                title: 'Workshop UI/UX',
                category: 'Workshop & Training',
                date: '15 Mei 2025',
                photos: [
                    { url: '{{ asset("img/gallery/event1.jpg") }}', caption: 'Pembukaan Workshop UI/UX' },
                    { url: '{{ asset("img/gallery/event1.jpg") }}', caption: 'Sesi Praktikum' },
                    { url: '{{ asset("img/gallery/event1.jpg") }}', caption: 'Diskusi Kelompok' },
                    { url: '{{ asset("img/gallery/event1.jpg") }}', caption: 'Presentasi Hasil' }
                ]
            },
            seminar: {
                title: 'Seminar Teknologi',
                category: 'Seminar & Webinar',
                date: '20 Mei 2025',
                photos: [
                    { url: '{{ asset("img/gallery/event2.jpg") }}', caption: 'Pembicara Utama' },
                    { url: '{{ asset("img/gallery/event2.jpg") }}', caption: 'Sesi Tanya Jawab' },
                    { url: '{{ asset("img/gallery/event2.jpg") }}', caption: 'Peserta Seminar' },
                    { url: '{{ asset("img/gallery/event2.jpg") }}', caption: 'Foto Bersama' }
                ]
            },
            studyclub: {
                title: 'Study Club Programming',
                category: 'Study Club',
                date: '25 Mei 2025',
                photos: [
                    { url: '{{ asset("img/gallery/event3.jpg") }}', caption: 'Coding Session' },
                    { url: '{{ asset("img/gallery/event3.jpg") }}', caption: 'Code Review' },
                    { url: '{{ asset("img/gallery/event3.jpg") }}', caption: 'Pair Programming' },
                    { url: '{{ asset("img/gallery/event3.jpg") }}', caption: 'Project Demo' }
                ]
            },
            competition: {
                title: 'IT Competition',
                category: 'Competition',
                date: '30 Mei 2025',
                photos: [
                    { url: '{{ asset("img/gallery/event4.jpg") }}', caption: 'Opening Ceremony' },
                    { url: '{{ asset("img/gallery/event4.jpg") }}', caption: 'Kompetisi Berlangsung' },
                    { url: '{{ asset("img/gallery/event4.jpg") }}', caption: 'Pengumuman Pemenang' },
                    { url: '{{ asset("img/gallery/event4.jpg") }}', caption: 'Penyerahan Hadiah' }
                ]
            }
        }
    }">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto w-full">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <span class="text-primary font-semibold px-4 py-1 bg-primary/10 rounded-full text-sm">GALERI KEGIATAN</span>
                    <h2 class="text-2xl md:text-4xl font-bold text-gray-800 mt-6 mb-4">Dokumentasi Kegiatan Kami</h2>
                    <p class="text-sm md:text-lg text-gray-600 max-w-2xl mx-auto">Berbagai momen kegiatan yang telah kami laksanakan</p>
                </div>

                <!-- Gallery Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                    <template x-for="(gallery, key) in galleries" :key="key">
                    <div class="group relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300"
                         @click="activeModal = key">                    <!-- Card Header Image -->
                    <div class="relative h-64 overflow-hidden">
                        <img x-bind:src="gallery.photos[0].url" 
                             x-bind:alt="gallery.title"
                             class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent"></div>
                    </div>
                        
                        <!-- Card Content -->
                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                            <div class="flex items-center space-x-2 mb-3">
                                <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-sm font-medium" 
                                      x-text="gallery.category"></span>
                                <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-sm font-medium" 
                                      x-text="gallery.photos.length + ' Photos'"></span>
                            </div>
                            <h3 class="text-xl font-bold mb-2" x-text="gallery.title"></h3>
                            <p class="text-white/80 text-sm" x-text="gallery.date"></p>
                        </div>

                        <!-- Hover Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-primary/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <span class="text-white text-lg font-medium px-6 py-3 border-2 border-white/30 rounded-full backdrop-blur-sm">
                                Lihat Gallery
                            </span>
                        </div>
                    </div>
                </template>
                </div>
            </div>

            <!-- Modal -->
            <template x-for="(gallery, key) in galleries" :key="key">
                <div x-show="activeModal === key" 
                     x-cloak
                     class="fixed inset-0 z-50 overflow-hidden"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform translate-y-4"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-transition:leave="transition ease-in duration-300"
                     x-transition:leave-start="opacity-100 transform translate-y-0"
                     x-transition:leave-end="opacity-0 transform translate-y-4">
                    <!-- Modal Backdrop -->
                    <div class="absolute inset-0 bg-black/90 backdrop-blur-sm" @click="activeModal = null"></div>

                    <!-- Modal Content -->
                    <div class="relative min-h-screen flex items-center justify-center p-4">
                        <div class="relative w-full max-w-6xl bg-white rounded-2xl overflow-hidden">
                            <!-- Modal Header -->
                            <div class="p-6 bg-gray-50 border-b flex justify-between items-center">
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-800" x-text="gallery.title"></h3>
                                    <div class="flex items-center space-x-4 mt-2">
                                        <span class="text-primary text-sm font-medium" x-text="gallery.category"></span>
                                        <span class="text-gray-500 text-sm" x-text="gallery.date"></span>
                                    </div>
                                </div>
                                <button @click="activeModal = null" class="p-2 hover:bg-gray-100 rounded-full transition-colors">
                                    <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>

                            <!-- Photos Grid -->
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    <template x-for="(photo, index) in gallery.photos" :key="index">                                    <div class="group relative aspect-video rounded-xl overflow-hidden bg-gray-100">
                                        <img x-bind:src="photo.url" 
                                             x-bind:alt="photo.caption"
                                             class="w-full h-full object-cover">
                                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                            <p class="text-white text-center px-4" x-text="photo.caption"></p>
                                        </div>
                                    </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <style>
            [x-cloak] { display: none !important; }
        </style>
    </section>

    <x-footer></x-footer>
</x-layout>