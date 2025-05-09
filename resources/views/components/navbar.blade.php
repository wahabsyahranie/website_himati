<nav class="bg-transparent" x-data="{ isOpen: false}">
  <div class="mx-auto max-w-7xl sm:px-6 lg:px-20.5">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button type="button" @click=" isOpen = !isOpen" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          <svg :class="{'hidden': isOpen, 'block': !isOpen}" class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <svg :class="{'block': isOpen, 'hidden': !isOpen}" class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      {{-- DEKSTOP MENU --}}
      <div class="hidden md:flex items-center justify-between w-full">
        <!-- Kiri: Logo -->
        <div class="flex-shrink-0">
          <a class="py-2 text-sm font-bold text-text-primary" aria-current="page">HIMA TI.</a>
        </div>
      
        <!-- Tengah: Menu -->
        <div class="flex-1 flex justify-center">
          <div class="flex space-x-4">
            <a href="#" class="px-3 py-2 text-sm text-text-primary">Beranda</a>
            <span class="px-3 py-2 text-sm text-text-primary">&bull;</span>
            <a href="#" class="px-3 py-2 text-sm text-text-primary">Tentang Kami</a>
            <span class="px-3 py-2 text-sm text-text-primary">&bull;</span>
            <a href="#" class="px-3 py-2 text-sm text-text-primary">Organisasi</a>
            <span class="px-3 py-2 text-sm text-text-primary">&bull;</span>
            <a href="#" class="px-3 py-2 text-sm text-text-primary">Produk Kami</a>
          </div>
        </div>
      
        <!-- Kanan: Button Admin -->
        <div class="flex-shrink-0">
          <button class="px-4 py-2 text-sm bg-secondary text-text-primary rounded">
            Admin
          </button>
        </div>
      </div>
      
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div x-show="isOpen" class="sm:hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pt-2 pb-3">
      <a href="#" class="block rounded-md px-3 py-2 text-text-primary hover:bg-secondary ">Home</a>
      <a href="#" class="block rounded-md px-3 py-2 text-text-primary hover:bg-secondary ">Advokasi</a>
      <a href="#" class="block rounded-md px-3 py-2 text-text-primary hover:bg-secondary ">Struktur Organisasi</a>
      <a href="#" class="block rounded-md px-3 py-2 text-text-primary hover:bg-secondary ">Layanan Kami</a>
    </div>
  </div>
</nav>
