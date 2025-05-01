<x-layout>
  <x-kop_surat>
    {{-- TANGGAL DAN TEMPAT SURAT DIBUAT--}}
    <div>
      <h4 class="text-xs text-right">Samarinda, 24 May 2025</h4>
    </div>

    {{-- PEMBUKA SURAT --}}
    <div class="flex">
      <div class="w-2/12 space-y-1">
        <h4>Nomor</h4>
        <h4>Lampiran</h4>
        <h4>Perihal</h4>
        <h4 class="mt-6">Kepada Yth</h4>
      </div>
    
      <div class="w-[10px] text-right space-y-1 pr-1">
        <h4>:</h4>
        <h4>:</h4>
        <h4>:</h4>
        <h4 class="mt-6">:</h4>
      </div>
    
      <div class="w-6/12 space-y-1">
        <h4>001/2025</h4>
        <h4>-</h4>
        <h4>Peminjaman Barang</h4>
        <h4 class="font-bold mt-6">Ketua Jurusan Teknologi Informasi Politeknik Negeri Samarinda</h4>
      </div>
    </div>
    
    {{-- ISI SURAT --}}
    <div class="ml-30">
      <h4>Di -</h4>
      <h4 class="ml-7">Tempat</h4>
      <h4 class="mt-4">Dengan hormat,</h4>
      <h4 class="text-justify"> Sehubung dengan rencana adanya pelaksanaan kegiatan “Pematerian Departemen Minat dan Bakat”, kami bermaksud mengajukan permohonan peminjaman aula sebagai tempat berlangsungnya kegiatan tersebut. Kegiatan ini dapat memberikan dampak positif yaitu pemahaman yang lebih mendalam kepada para kader mengenai Departemen Minat dan Bakat dan meningkatkan wawasan serta keterlibatan mereka di dalamnya.</h4>

      <h4 class="mt-4">Kegiatan ini akan dilaksanakan pada:</h4>
      <div class="flex">
        <div class="w-2/12">
          <h4>Hari</h4>
          <h4>Tanggal</h4>
          <h4>Waktu</h4>
          <h4>Tempat</h4>
        </div>
        <div class="w-[10px] text-right pr-1">
          <h4>:</h4>
          <h4>:</h4>
          <h4>:</h4>
          <h4>:</h4>
        </div>
        <div class="w-6/12">
          <h4>Senin</h4>
          <h4>24 Mei 2025</h4>
          <h4>08.00 - 17.00</h4>
          <h4>Aula Politeknik Negeri Samarinda</h4>
        </div>
      </div>
    </div>

    {{-- PENUTUP SURAT --}}
    <div class="ml-30 mt-4">
      <h4 class="text-justify">Demikian surat permohonan ini kami ajukan. Besar harapan kami agar permohonan ini dapat disetujui. Atas perhatian dan dukungan Bapak/Ibu, kami ucapkan terima kasih.</h4>
    </div>
    <x-pengesahan_type_b></x-pengesahan_type_b>
  </x-kop_surat>
</x-layout>