<nav id="navbar" x-data="{ isOpen: false, scrolled: false }" 
  x-init="window.addEventListener('scroll', () => { scrolled = window.pageYOffset > 20 })"
  :class="{'scrolled': scrolled}"
  class="fixed top-0 w-full z-50">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="relative flex h-20 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button type="button" @click="isOpen = !isOpen" 
          class="mobile-menu-button relative inline-flex items-center justify-center p-2.5
                 rounded-lg border border-white/10 bg-white/5
                 hover:bg-white/10 active:bg-white/5
                 transition-all duration-200" 
          aria-controls="mobile-menu" aria-expanded="false" @click.outside="isOpen = false">
          <span class="sr-only">Open main menu</span>
          <svg :class="{'hidden': isOpen, 'block': !isOpen}" class="block size-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <svg :class="{'block': isOpen, 'hidden': !isOpen}" class="hidden size-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      {{-- DEKSTOP MENU --}}
      <div class="hidden sm:flex items-center justify-between w-full">
        <!-- Kiri: Logo -->
        <div class="flex-shrink-0">
          <a href="/" class="group py-2 text-xl font-bold tracking-wide transition-all duration-300 flex items-center" aria-current="page">
            <div class="relative">
              <span class="bg-clip-text text-transparent bg-gradient-to-r from-white via-white/90 to-white/80 
                         group-hover:from-secondary/90 group-hover:via-secondary group-hover:to-secondary
                         transition-all duration-300">HIMA</span>
              <span class="relative text-secondary group-hover:text-white transition-all duration-300
                         after:absolute after:-bottom-0.5 after:left-0 after:h-px after:w-full 
                         after:origin-center after:scale-x-0 after:bg-white/40
                         after:transition-transform after:duration-300 group-hover:after:scale-x-100">TI</span>
            </div>
            <span class="ml-3 hidden lg:block text-xs font-medium tracking-[0.25em] text-white/60 
                       group-hover:text-white/90 transition-all duration-300 
                       translate-x-0 group-hover:translate-x-1">POLNES</span>
          </a>
        </div>
      
        <!-- Tengah: Menu -->
        <div class="flex-1 flex justify-center">
          <div class="flex items-center space-x-1 bg-white/5 rounded-2xl p-1.5 border border-white/10 backdrop-blur-md shadow-lg shadow-black/5">
            <a href="/" class="px-4 py-2 text-sm font-medium rounded-xl hover:bg-gradient-to-r hover:from-white/10 hover:to-transparent hover:border-white/20 hover:text-white transition-all duration-200">
              Beranda
            </a>
            <a href="/tentang" class="px-4 py-2 text-sm font-medium rounded-xl hover:bg-gradient-to-r hover:from-white/10 hover:to-transparent hover:border-white/20 hover:text-white transition-all duration-200">
              Tentang Kami
            </a>
            <a href="/#organisasi" class="px-4 py-2 text-sm font-medium rounded-xl hover:bg-gradient-to-r hover:from-white/10 hover:to-transparent hover:border-white/20 hover:text-white transition-all duration-200">
              Organisasi
            </a>
            <a href="/produk" class="px-4 py-2 text-sm font-medium rounded-xl hover:bg-gradient-to-r hover:from-white/10 hover:to-transparent hover:border-white/20 hover:text-white transition-all duration-200">
              Produk Kami
            </a>
          </div>
        </div>
      
        <!-- Kanan: Buttons -->
        <div class="hidden sm:flex items-center space-x-3">
          <a href="/admin" 
             class="admin-btn inline-flex items-center px-4 py-2 text-sm font-medium rounded-xl
                    bg-gradient-to-r from-secondary to-secondary/90 text-white
                    border border-white/10 shadow-[0_2px_10px_rgba(0,115,177,0.2)]
                    hover:shadow-[0_6px_20px_rgba(0,115,177,0.3)]
                    hover:border-white/20 hover:from-secondary hover:to-secondary
                    transition-all duration-200">
            <svg class="size-4 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
            Admin
          </a>
          <button type="button" 
                  class="check-signature-btn inline-flex items-center px-4 py-2 text-sm font-medium
                         rounded-xl border border-white/10 bg-white/5
                         hover:bg-white/10 hover:border-white/20 hover:text-white
                         transition-all duration-200 open-check-signature-modal">
            <svg class="size-4 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
            </svg>
            Check Signature
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Mobile menu -->
  <div x-show="isOpen" 
       x-transition:enter="transition ease-out duration-200"
       x-transition:enter-start="opacity-0 -translate-y-1"
       x-transition:enter-end="opacity-100 translate-y-0"
       x-transition:leave="transition ease-in duration-150"
       x-transition:leave-start="opacity-100 translate-y-0"
       x-transition:leave-end="opacity-0 -translate-y-1"
       class="sm:hidden bg-secondary/95 backdrop-blur-xl border-t border-white/10 shadow-[0_8px_30px_rgba(0,0,0,0.12)]" 
       id="mobile-menu">
    <div class="px-3 pt-3 pb-4 space-y-1.5">
      <a href="/" class="block px-4 py-2.5 text-sm font-medium rounded-xl hover:bg-gradient-to-r hover:from-white/10 hover:to-transparent transition-all duration-200">
        Beranda
      </a>
      <a href="/tentang" class="block px-4 py-2.5 text-sm font-medium rounded-xl hover:bg-gradient-to-r hover:from-white/10 hover:to-transparent transition-all duration-200">
        Tentang Kami
      </a>
      <a href="/#organisasi" class="block px-4 py-2.5 text-sm font-medium rounded-xl hover:bg-gradient-to-r hover:from-white/10 hover:to-transparent transition-all duration-200">
        Organisasi
      </a>
      <a href="/produk" class="block px-4 py-2.5 text-sm font-medium rounded-xl hover:bg-gradient-to-r hover:from-white/10 hover:to-transparent transition-all duration-200">
        Produk Kami
      </a>
      
      <div class="px-4 py-4 mt-2 space-y-2 border-t border-white/10">
        <a href="/admin" 
           class="admin-btn block w-full px-4 py-2.5 text-sm font-medium rounded-xl
                  bg-gradient-to-r from-white to-white/95 text-secondary 
                  hover:from-white hover:to-white
                  shadow-[0_2px_10px_rgba(255,255,255,0.2)]
                  hover:shadow-[0_6px_20px_rgba(255,255,255,0.25)]
                  transition-all duration-200">
          <div class="flex items-center">
            <svg class="size-4 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
            Admin
          </div>
        </a>
        <button type="button"
                class="check-signature-btn block w-full px-4 py-2.5 text-sm font-medium text-left rounded-xl
                       border border-white/10 bg-white/5
                       hover:bg-white/10 hover:border-white/20
                       transition-all duration-200 open-check-signature-modal">
          <div class="flex items-center">
            <svg class="size-4 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
            </svg>
            Check Signature
          </div>
        </button>
      </div>
    </div>
  </div>
</nav>

<!-- Modal Check Signature -->
@include('components.check-signature-modal')
