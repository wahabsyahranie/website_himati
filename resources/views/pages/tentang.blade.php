<x-layout>
    <x-navbar></x-navbar>

    <!-- Hero Section -->
    <div id="tentang-kami" class="w-full py-16 md:py-0 h-auto md:min-h-screen font-display flex flex-col items-center justify-center text-center text-sm md:text-text-primary space-y-8 lg:px-32.5" style="background-image: url('{{ asset('img/aset/bgnav.png') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <div class="flex flex-col justify-center items-center w-full px-4 md:px-18 space-y-6">
      <p class="bg-white/20 border border-white/30 px-4 py-1 rounded-4xl shadow-md text-text-primary">Tentang Kami</p>
      <p class="font-[700] text-md md:text-[40px] leading-snug w-[90%] md:w-full text-text-primary">
        Mengenal Lebih Dekat HIMATI - Himpunan Mahasiswa Teknologi Informasi, Wadah Kreativitas dan Inovasi
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
                        
                        <!-- Enhanced stats section with modern cards -->
                        <div class="grid grid-cols-3 gap-6 md:gap-8 pt-8 border-t border-gray-100">
                            <div class="group bg-white p-6 rounded-2xl hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                                <div class="text-4xl font-bold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent group-hover:scale-110 transition-transform duration-300">500+</div>
                                <div class="text-sm text-gray-500 mt-2 font-medium">Anggota Aktif</div>
                            </div>
                            <div class="group bg-white p-6 rounded-2xl hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                                <div class="text-4xl font-bold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent group-hover:scale-110 transition-transform duration-300">50+</div>
                                <div class="text-sm text-gray-500 mt-2 font-medium">Program Kerja</div>
                            </div>
                            <div class="group bg-white p-6 rounded-2xl hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                                <div class="text-4xl font-bold bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent group-hover:scale-110 transition-transform duration-300">15+</div>
                                <div class="text-sm text-gray-500 mt-2 font-medium">Tahun Berdiri</div>
                            </div>
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
                <div class="grid md:grid-cols-2 gap-12 md:gap-16 items-center">
                    <!-- Enhanced image column with overlapping photos - NOW ON LEFT -->
                    <div class="relative w-full h-[500px] max-w-lg order-last md:order-first mx-auto">
                        <!-- Background decorative elements -->
                        <div class="absolute inset-0 bg-gradient-to-br from-primary/5 via-transparent to-secondary/5 rounded-[2.5rem]"></div>
                        <div class="absolute -right-4 top-1/4 w-32 h-32 bg-gradient-to-br from-primary/20 to-transparent rounded-full blur-2xl animate-pulse"></div>
                        <div class="absolute -left-4 bottom-1/4 w-32 h-32 bg-gradient-to-tr from-secondary/20 to-transparent rounded-full blur-2xl animate-pulse delay-700"></div>

                        <!-- Main large image -->
                        <div class="absolute left-0 top-0 w-[85%] h-[400px] group/main">
                            <div class="relative w-full h-full rounded-2xl overflow-hidden 
                                      shadow-[0_8px_40px_-12px_rgba(0,0,0,0.15)] 
                                      transition-all duration-500 ease-out
                                      group-hover/main:shadow-[0_20px_80px_-12px_rgba(0,0,0,0.25)]
                                      group-hover/main:translate-x-2 group-hover/main:-translate-y-2">
                            <!-- Gradient border -->
                            <div class="absolute inset-0 p-0.5 rounded-2xl bg-gradient-to-br from-primary/20 to-secondary/20">
                                <div class="absolute inset-0 bg-white rounded-2xl"></div>
                            </div>
                            
                            <!-- Image container -->
                            <div class="relative h-full w-full overflow-hidden rounded-2xl bg-gradient-to-br from-gray-50 to-white">
                                <img src="{{ asset('img/pengurus/humed.jpg') }}" 
                                     alt="HIMATI Primary" 
                                     class="w-full h-full object-cover transform transition-transform duration-700 
                                            group-hover/main:scale-110">
                                
                                <!-- Hover overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent 
                                          opacity-0 group-hover/main:opacity-100 transition-all duration-500"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Secondary smaller image -->
                    <div class="absolute right-0 -bottom-20 w-[65%] h-[350px] group/secondary z-10">
                        <div class="relative w-full h-full rounded-2xl overflow-hidden 
                                  shadow-[0_8px_40px_-12px_rgba(0,0,0,0.15)]
                                  transition-all duration-500 ease-out
                                  group-hover/secondary:shadow-[0_20px_80px_-12px_rgba(0,0,0,0.25)]
                                  group-hover/secondary:-translate-x-2 group-hover/secondary:translate-y-2">
                            <!-- Gradient border -->
                            <div class="absolute inset-0 p-0.5 rounded-2xl bg-gradient-to-br from-secondary/20 to-primary/20">
                                <div class="absolute inset-0 bg-white rounded-2xl"></div>
                            </div>
                            
                            <!-- Image container -->
                            <div class="relative h-full w-full overflow-hidden rounded-2xl bg-gradient-to-br from-gray-50 to-white">
                                <img src="{{ asset('img/pengurus/kpsdm.jpg') }}" 
                                     alt="HIMATI Secondary" 
                                     class="w-full h-full object-cover transform transition-transform duration-700 
                                            group-hover/secondary:scale-110">
                                
                                <!-- Hover overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent 
                                          opacity-0 group-hover/secondary:opacity-100 transition-all duration-500"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Decorative elements -->
                    <div class="absolute top-8 left-8 w-12 h-12 border-t-2 border-l-2 border-primary/30 rounded-tl-xl"></div>
                    <div class="absolute bottom-8 right-8 w-12 h-12 border-b-2 border-r-2 border-secondary/30 rounded-br-xl"></div>
                </div>
                
                <!-- Vision Mission Content - NOW ON RIGHT -->
                <div class="space-y-8">
                    <!-- Main heading with animated underline -->
                    <h2 class="text-2xl md:text-4xl font-[700] text-gray-800 leading-tight">
                        Arah dan <span class="text-primary relative inline-block">Tujuan
                            <div class="absolute -bottom-2 left-0 w-full h-1 bg-gradient-to-r from-primary/40 to-secondary/40 rounded-full"></div>
                        </span>
                    </h2>

                    <!-- Vision Card - Modern White Design -->
                    <article class="group relative bg-white text-gray-800 rounded-3xl p-8 text-left shadow-xl animate-fadeInUp backdrop-blur-sm backdrop-opacity-10 transition-all duration-300 ease-in-out hover:scale-[1.02] hover:shadow-2xl hover:-translate-y-1 border border-primary/10" data-aos="fade-up" data-aos-delay="150">
                        <div class="absolute -top-6 right-6 bg-primary rounded-2xl p-3 shadow-lg transition-transform duration-300 ease-in-out group-hover:scale-110 group-hover:rotate-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white transition-transform duration-300 ease-in-out group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div class="flex gap-3 mb-6">
                            <span class="inline-flex items-center bg-primary text-white font-medium rounded-full px-4 py-1.5 text-sm tracking-wide shadow-sm transition-all duration-300 ease-in-out group-hover:shadow-md group-hover:scale-105 font-inter">Visi</span>
                            <span class="inline-flex items-center bg-gray-100 text-gray-700 font-medium rounded-full px-4 py-1.5 text-sm tracking-wide shadow-sm transition-all duration-300 ease-in-out group-hover:shadow-md group-hover:scale-105 font-inter">HIMATI</span>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 transition-transform duration-300 ease-in-out group-hover:translate-x-1 font-inter text-primary">Visi Kami</h3>
                        <p class="mb-8 text-base leading-relaxed text-gray-600 transition-all duration-300 ease-in-out group-hover:text-gray-800 font-inter">
                            Menjadikan Himpunan Mahasiswa Teknologi Informasi Sebagai
                            <span class="font-semibold text-primary">Wadah Pengembangan</span> dan 
                            <span class="font-semibold text-primary">Menciptakan Kolaborasi</span> di 
                            antara Masyarakat Jurusan Teknologi Informasi.
                        </p>
                        <div class="absolute inset-0 bg-gradient-to-br from-primary/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out rounded-3xl pointer-events-none"></div>
                    </article>

                    <!-- Mission Card - Modern White Design -->
                    <article class="group relative bg-white text-gray-800 rounded-3xl p-8 text-left shadow-xl animate-fadeInUp backdrop-blur-sm backdrop-opacity-10 transition-all duration-300 ease-in-out hover:scale-[1.02] hover:shadow-2xl hover:-translate-y-1 border border-secondary/10" data-aos="fade-up" data-aos-delay="300">
                        <div class="absolute -top-6 right-6 bg-secondary rounded-2xl p-3 shadow-lg transition-transform duration-300 ease-in-out group-hover:scale-110 group-hover:rotate-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white transition-transform duration-300 ease-in-out group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12.364 12.364A3.011 3.011 0 0 0 13.5 12c0-.828-.168-1.617-.468-2.336a3.011 3.011 0 0 0-1.608-1.608A4.957 4.957 0 0 0 9 7.5c-.828 0-1.617.168-2.336.468A3.011 3.011 0 0 0 5.056 9.576 4.957 4.957 0 0 0 4.5 12c0 .828.168 1.617.468 2.336a3.011 3.011 0 0 0 1.608 1.608c.72.3 1.508.468 2.336.468.828 0 1.617-.168 2.336-.468a3.011 3.011 0 0 0 1.608-1.608c.3-.72.468-1.508.468-2.336a4.957 4.957 0 0 0-.468-2.336Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.5 7.5-9 9m2.25-2.25 2.25-2.25M15 12l-2.25-2.25" />
                            </svg>
                        </div>
                        <div class="flex gap-3 mb-6">
                            <span class="inline-flex items-center bg-secondary text-white font-medium rounded-full px-4 py-1.5 text-sm tracking-wide shadow-sm transition-all duration-300 ease-in-out group-hover:shadow-md group-hover:scale-105 font-inter">Misi</span>
                            <span class="inline-flex items-center bg-gray-100 text-gray-700 font-medium rounded-full px-4 py-1.5 text-sm tracking-wide shadow-sm transition-all duration-300 ease-in-out group-hover:shadow-md group-hover:scale-105 font-inter">HIMATI</span>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 transition-transform duration-300 ease-in-out group-hover:translate-x-1 font-inter text-secondary">Misi Kami</h3>
                        <ul class="space-y-4 text-base leading-relaxed text-gray-600 transition-all duration-300 ease-in-out group-hover:text-gray-800 font-inter">
                            <li class="flex items-center gap-3">
                                <div class="w-2 h-2 rounded-full bg-secondary/30"></div>
                                <span class="text-gray-600">Mengembangkan SDM Mahasiswa Jurusan Teknologi Informasi yang selaras dengan jurusannya</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <div class="w-2 h-2 rounded-full bg-secondary/30"></div>
                                <span class="text-gray-600">Mempersiapkan Mahasiswa Jurusan Teknologi Informasi untuk turut andil dalam memajukan jurusannya</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <div class="w-2 h-2 rounded-full bg-secondary/30"></div>
                                <span class="text-gray-600">Menjadikan HIMA TI sebagai wadah kebersamaan bagi Mahasiswa Jurusan Teknologi Informasi</span>
                            </li>
                        </ul>
                        <div class="absolute inset-0 bg-gradient-to-br from-secondary/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out rounded-3xl pointer-events-none"></div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Kerja Section -->
    <div class="bg-white w-full flex flex-col items-center justify-center p-5 md:px-20 md:py-24">
        <div class="text-center font-['Inter']">
            <span class="inline-block bg-secondary/10 text-secondary font-semibold px-4 py-1 rounded-full text-sm mb-6">PROGRAM KERJA</span>
            <p class="font-bold text-2xl md:text-4xl mb-3 text-gray-800">Program Unggulan Kami</p>
            <p class="max-w-2xl mx-auto text-sm md:text-lg text-gray-600">Berbagai kegiatan yang kami selenggarakan untuk mengembangkan potensi mahasiswa dan memberikan dampak positif</p>
        </div>

        {{-- CARD --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 max-w-7xl mx-auto pt-12 pb-8 w-full relative z-10">
          {{-- Study Club Card --}}
          <article class="group relative bg-gradient-to-br from-amber-400 via-yellow-400 to-yellow-500 text-white rounded-3xl p-8 text-left shadow-xl animate-fadeInUp backdrop-blur-sm backdrop-opacity-10 transition-all duration-300 ease-in-out hover:scale-[1.02] hover:shadow-2xl hover:-translate-y-1" data-aos="fade-up" data-aos-delay="150">
            <div class="absolute -top-6 right-6 bg-white/95 rounded-2xl p-3 shadow-lg transition-transform duration-300 ease-in-out group-hover:scale-110 group-hover:rotate-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-yellow-500 transition-transform duration-300 ease-in-out group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
              </svg>
            </div>
            <div class="flex gap-3 mb-6">
              <span class="inline-flex items-center bg-purple-50 text-yellow-900 font-medium rounded-full px-4 py-1.5 text-sm tracking-wide shadow-sm transition-all duration-300 ease-in-out group-hover:shadow-md group-hover:scale-105 font-inter">Study Club</span>
              <span class="inline-flex items-center bg-white/20 text-white font-medium rounded-full px-4 py-1.5 text-sm tracking-wide shadow-sm backdrop-blur-sm transition-all duration-300 ease-in-out group-hover:bg-white/30 group-hover:shadow-md group-hover:scale-105 font-inter">Program</span>
            </div>
            <h3 class="text-2xl font-bold mb-4 transition-transform duration-300 ease-in-out group-hover:translate-x-1 font-inter">Study Club</h3>
            <p class="mb-8 text-base leading-relaxed opacity-90 transition-all duration-300 ease-in-out group-hover:opacity-100 font-inter">
              Program pembelajaran intensif dengan topik-topik teknologi terkini yang dipandu oleh praktisi berpengalaman.
            </p>
            <div class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out rounded-3xl pointer-events-none"></div>
          </article>

          {{-- Workshop & Seminar Card --}}
          <article class="group relative bg-gradient-to-br from-blue-600 via-blue-500 to-blue-400 text-white rounded-3xl p-8 text-left shadow-xl animate-fadeInUp backdrop-blur-sm backdrop-opacity-10 transition-all duration-300 ease-in-out hover:scale-[1.02] hover:shadow-2xl hover:-translate-y-1" data-aos="fade-up" data-aos-delay="300">
            <div class="absolute -top-6 right-6 bg-white/95 rounded-2xl p-3 shadow-lg transition-transform duration-300 ease-in-out group-hover:scale-110 group-hover:rotate-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-600 transition-transform duration-300 ease-in-out group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
            </div>
            <div class="flex gap-3 mb-6">
              <span class="inline-flex items-center bg-blue-50 text-blue-900 font-medium rounded-full px-4 py-1.5 text-sm tracking-wide shadow-sm transition-all duration-300 ease-in-out group-hover:shadow-md group-hover:scale-105 font-inter">Workshop</span>
              <span class="inline-flex items-center bg-white/20 text-white font-medium rounded-full px-4 py-1.5 text-sm tracking-wide shadow-sm backdrop-blur-sm transition-all duration-300 ease-in-out group-hover:bg-white/30 group-hover:shadow-md group-hover:scale-105 font-inter">Program</span>
            </div>
            <h3 class="text-2xl font-bold mb-4 transition-transform duration-300 ease-in-out group-hover:translate-x-1 font-inter">Workshop & Seminar</h3>
            <p class="mb-8 text-base leading-relaxed opacity-90 transition-all duration-300 ease-in-out group-hover:opacity-100 font-inter">
              Event edukatif dengan menghadirkan pembicara dari industri IT untuk berbagi pengetahuan dan pengalaman.
            </p>
            <div class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out rounded-3xl pointer-events-none"></div>
          </article>

          {{-- IT Competition Card --}}
          <article class="group relative bg-gradient-to-br from-emerald-600 via-emerald-500 to-emerald-400 text-white rounded-3xl p-8 text-left shadow-xl animate-fadeInUp backdrop-blur-sm backdrop-opacity-10 transition-all duration-300 ease-in-out hover:scale-[1.02] hover:shadow-2xl hover:-translate-y-1" data-aos="fade-up" data-aos-delay="450">
            <div class="absolute -top-6 right-6 bg-white/95 rounded-2xl p-3 shadow-lg transition-transform duration-300 ease-in-out group-hover:scale-110 group-hover:rotate-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-emerald-600 transition-transform duration-300 ease-in-out group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
            </div>
            <div class="flex gap-3 mb-6">
              <span class="inline-flex items-center bg-emerald-50 text-emerald-900 font-medium rounded-full px-4 py-1.5 text-sm tracking-wide shadow-sm transition-all duration-300 ease-in-out group-hover:shadow-md group-hover:scale-105 font-inter">Competition</span>
              <span class="inline-flex items-center bg-white/20 text-white font-medium rounded-full px-4 py-1.5 text-sm tracking-wide shadow-sm backdrop-blur-sm transition-all duration-300 ease-in-out group-hover:bg-white/30 group-hover:shadow-md group-hover:scale-105 font-inter">Program</span>
            </div>
            <h3 class="text-2xl font-bold mb-4 transition-transform duration-300 ease-in-out group-hover:translate-x-1 font-inter">IT Competition</h3>
            <p class="mb-8 text-base leading-relaxed opacity-90 transition-all duration-300 ease-in-out group-hover:opacity-100 font-inter">
              Kompetisi teknologi yang menantang kreativitas dan inovasi mahasiswa dalam menciptakan solusi digital.
            </p>
            <div class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out rounded-3xl pointer-events-none"></div>
          </article>
        </div>
    </div>

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