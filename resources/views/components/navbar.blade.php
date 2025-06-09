<nav id="navbar" x-data="{ isOpen: false, scrolled: false }" 
  x-init="window.addEventListener('scroll', () => { scrolled = window.pageYOffset > 20 })"
  :class="{'scrolled': scrolled}"
  class="fixed top-0 w-full z-50 transition-all duration-300">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-20.5">
    <div class="relative flex h-20 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button type="button" @click="isOpen = !isOpen" 
          class="mobile-menu-button relative inline-flex items-center justify-center rounded-lg p-2.5
                 hover:bg-white/20 hover:scale-105 active:scale-95
                 transition-all duration-200" 
          aria-controls="mobile-menu" aria-expanded="false" @click.outside="isOpen = false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          <svg :class="{'hidden': isOpen, 'block': !isOpen}" class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <svg :class="{'block': isOpen, 'hidden': !isOpen}" class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      {{-- DEKSTOP MENU --}}
      <div class="hidden md:flex items-center justify-between w-full">
        <!-- Kiri: Logo -->
        <div class="flex-shrink-0">
          <a href="/" class="py-2 text-xl font-bold tracking-wider hover:text-secondary hover:scale-105 transition-all duration-200" aria-current="page">HIMA TI.</a>
        </div>
      
        <!-- Tengah: Menu -->
        <div class="flex-1 flex justify-center">
          <div class="flex space-x-4">
            <a href="/" class="group px-3 py-2 text-sm font-medium hover:text-secondary transition-all duration-200">
              Beranda
              <span class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-0.5 bg-secondary"></span>
            </a>
            <span class="px-3 py-2 text-sm hidden lg:inline-block opacity-50 bullet">&bull;</span>
            <a href="/tentang" class="group px-3 py-2 text-sm font-medium hover:text-secondary transition-all duration-200">
              Tentang Kami
              <span class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-0.5 bg-secondary"></span>
            </a>
            <span class="px-3 py-2 text-sm hidden lg:inline-block opacity-50 bullet">&bull;</span>
            <a href="/#organisasi" class="group px-3 py-2 text-sm font-medium hover:text-secondary transition-all duration-200">
              Organisasi
              <span class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-0.5 bg-secondary"></span>
            </a>
            <span class="px-3 py-2 text-sm hidden lg:inline-block opacity-50 bullet">&bull;</span>
            <a href="/produk" class="group px-3 py-2 text-sm font-medium hover:text-secondary transition-all duration-200">
              Produk Kami
              <span class="block max-w-0 group-hover:max-w-full transition-all duration-300 h-0.5 bg-secondary"></span>
            </a>
          </div>
        </div>
      
        <!-- Kanan: Buttons -->
        <div class="hidden md:flex items-center space-x-2 md:space-x-4">
          <a href="/admin" 
             class="admin-btn px-3 md:px-5 py-2 md:py-2.5 text-sm font-medium rounded-lg relative
                    bg-secondary text-white
                    ring-1 ring-white/10 shadow-[0_0_15px_rgba(var(--secondary-rgb),0.15)]
                    hover:bg-secondary/90 hover:ring-white/20 
                    hover:shadow-[0_0_20px_rgba(var(--secondary-rgb),0.25)]
                    hover:scale-105 active:scale-95
                    transition-all duration-200">
            <span class="relative inline-flex items-center gap-1">
              <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
              </svg>
              <span class="hidden md:inline">Admin</span>
            </span>
          </a>
          <button type="button" 
                  :class="scrolled ? 'border-secondary/50 ring-secondary/20 text-secondary/80' : 'border-white/50 ring-white/10'"
                  class="check-signature-btn px-3 md:px-5 py-2 md:py-2.5 text-sm font-medium rounded-lg relative
                         border-2 backdrop-blur-sm
                         ring-1 shadow-[0_0_15px_rgba(255,255,255,0.1)]
                         hover:border-secondary hover:ring-secondary/30 
                         hover:shadow-[0_0_15px_rgba(var(--secondary-rgb),0.15)]
                         hover:text-secondary hover:scale-105 
                         active:scale-95 hover:before:bg-secondary/5
                         transition-all duration-200 open-check-signature-modal">
            <span class="relative inline-flex items-center gap-1">
              <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
              </svg>
              Check Signature
            </span>
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Mobile menu -->
  <div x-show="isOpen" 
       x-transition:enter="transition ease-out duration-200"
       x-transition:enter-start="opacity-0 -translate-y-2"
       x-transition:enter-end="opacity-100 translate-y-0"
       x-transition:leave="transition ease-in duration-150"
       x-transition:leave-start="opacity-100 translate-y-0"
       x-transition:leave-end="opacity-0 -translate-y-2"
       class="sm:hidden bg-white/10 backdrop-blur-md rounded-b-xl" id="mobile-menu">
    <div class="space-y-2 px-4 pt-2 pb-4">
      <a href="/" class="block rounded-lg px-4 py-3 text-base font-medium hover:bg-white/20 hover:scale-[1.02] active:scale-[0.98] transition-all duration-200">Beranda</a>
      <a href="/tentang" class="block rounded-lg px-4 py-3 text-base font-medium hover:bg-white/20 hover:scale-[1.02] active:scale-[0.98] transition-all duration-200">Tentang Kami</a>
      <a href="/#organisasi" class="block rounded-lg px-4 py-3 text-base font-medium hover:bg-white/20 hover:scale-[1.02] active:scale-[0.98] transition-all duration-200">Organisasi</a>
      <a href="/produk" class="block rounded-lg px-4 py-3 text-base font-medium hover:bg-white/20 hover:scale-[1.02] active:scale-[0.98] transition-all duration-200">Produk Kami</a>
      
      <div class="buttons-container">
        <a href="/admin" 
           class="admin-btn inline-flex items-center gap-1 px-5 py-2.5 text-sm font-medium rounded-lg
                  bg-secondary text-white
                  ring-1 ring-white/10 shadow-[0_0_15px_rgba(var(--secondary-rgb),0.15)]
                  hover:bg-secondary/90 hover:scale-[1.02] 
                  active:scale-[0.98] transition-all duration-200">
          <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
          </svg>
          Admin
        </a>
        <button type="button"
                :class="scrolled ? 'border-secondary/50 ring-secondary/20 text-secondary/80' : 'border-white/50 ring-white/10'"
                class="check-signature-btn inline-flex items-center gap-1 px-5 py-2.5 text-sm font-medium rounded-lg
                       border-2 backdrop-blur-sm
                       ring-1 shadow-[0_0_15px_rgba(255,255,255,0.1)]
                       hover:border-secondary hover:ring-secondary/30 
                       hover:scale-[1.02] active:scale-[0.98]
                       transition-all duration-200 open-check-signature-modal">
          <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
          </svg>
          Check Signature
        </button>
      </div>
    </div>
  </div>
</nav>

<!-- Modal Check Signature -->
@include('components.check-signature-modal')
