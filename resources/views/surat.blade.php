<x-layout>
  <x-kop_surat>
    {{-- TANGGAL DAN TEMPAT SURAT DIBUAT--}}
    <div>
      <h4 class="text-xs text-right">Samarinda, {{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y') }}</h4>
    </div>
    
    {{-- PEMBUKA SURAT --}}
    <div class="flex">
      <div class="w-2/12 space-y-1">
        <h4>Nomor</h4>
        <h4>Lampiran</h4>
        <h4>Perihal</h4>
        <h4 class="mt-4">Kepada Yth</h4>
      </div>
    
      <div class="w-[10px] text-right space-y-1 pr-1">
        <h4>:</h4>
        <h4>:</h4>
        <h4>:</h4>
        <h4 class="mt-4">:</h4>
      </div>
    
      <div class="w-10/12 space-y-1">
        <h4>{{ $data->nomor_surat }}</h4>
        <h4>{{ $data->lampiran }}</h4>
        <h4>{{ $data->perihal }}</h4>
        <h4 class="font-bold mt-4">{{ $data->dosen->jabatan }}</h4>
      </div>
    </div>
    
    {{-- ISI SURAT --}}
    <div class="ml-30">
      <h4>Di -</h4>
      <h4 class="ml-7">Tempat</h4>
      <h4 class="mt-4">Dengan hormat,</h4>
      <h4 class="text-justify">{{ $data->isi }}</h4>

      <h4 class="mt-4">Kegiatan ini akan dilaksanakan pada:</h4>
      <div class="flex">
        <div class="w-3/12">
          <h4>Hari/Tanggal</h4>
          <h4>Waktu</h4>
          <h4>Tempat</h4>
        </div>
        <div class="w-[10px] text-right pr-1">
          <h4>:</h4>
          <h4>:</h4>
          <h4>:</h4>
        </div>
        <div class="w-9/12">
          <h4>{{ \Carbon\Carbon::parse($data->tanggal_pelaksana)->translatedFormat('l') }} - {{ \Carbon\Carbon::parse($data->tanggal_selesai)->translatedFormat('l') }} , {{ \Carbon\Carbon::parse($data->tanggal_pelaksana)->translatedFormat('d F Y') }} - {{ \Carbon\Carbon::parse($data->tanggal_selesai)->translatedFormat('d F Y') }}</h4>
          <h4>{{ \Carbon\Carbon::parse($data->waktu_pelaksana)->format('H:i') }} - {{ \Carbon\Carbon::parse($data->waktu_selesai)->format('H:i') }}</h4>
          <h4>{{ $data->tempat_pelaksana }}</h4>
        </div>
      </div>
    </div>

    {{-- PENUTUP SURAT --}}
    <div class="ml-30 mt-4">
      <h4 class="text-justify">Kami berkomitmen dengan baik serta akan mematuhi seluruh peraturan yang berlaku. Oleh karena itu, kami sangat mengharapkan izin dan dukungan dari Bapak/Ibu agar kegiatan ini dapat berjalan dengan lancar.</h4>
    </div>

    {{-- LEMBAR PENGESHAAN --}}
    <div class="ml-30 mt-4">

      <h4>Hormat Kami,</h4>
      {{-- TANDA TANGAN PENGURUS --}}
      <div class="flex justify-between">
        <div class="w-5/12 text-left">
          <h4>Ketua Umum</h4>
          <h4>HMJ TI,</h4>
          <div class="mt-12">
            <h4 class="font-bold underline">Abdul Wahab Syahranie</h4>
            <h4>NIM. 236152003</h4>
          </div>
        </div>
        <div class="w-5/12 text-left ">
          @php
            $info = $departemenMap[$data->departemen] ?? ['Sekretaris Umum', 'HMJ TI', 'Yemima Meilinda Munte', '236152003'];
          @endphp
          <h4>{{ $info[0] }}</h4>
          <h4>{{ $info[1] }},</h4>
          <div class="mt-12">
            <h4 class="font-bold underline">{{ $info[2] }}</h4>
            <h4>NIM. {{ $info[3] }}</h4>
          </div>
        </div>
      </div>

      {{-- TANDA TANGAN PETINGGI --}}
      <div class="mt-4">
        <div class="flex justify-between">
          {{-- DUA TANDA TANGAN --}}
          @if(count($data->tandatangan) === 2)
              @php
                $nama_satu = $data->tandatangan[0];
                $nama_dua = $data->tandatangan[1];
              @endphp
      
              <div class="w-5/12 text-left">
                <h4>Menyetujui,</h4>
                <h4>{{ $dosenInfo[$nama_satu]['jabatan'] ?? '-' }}</h4>
                <h4>Teknologi Informasi,</h4>
                <div class="mt-12">
                  <h4 class="font-bold underline">{{ $nama_satu }}</h4>
                  <h4>NIP. {{ $dosenInfo[$nama_satu]['nip'] ?? '-' }}</h4>
                </div>
              </div>
      
              <div class="w-5/12 text-left">
                <h4>Mengetahui,</h4>
                <h4>{{ $dosenInfo[$nama_dua]['jabatan'] ?? '-' }}</h4>
                <h4>Teknologi Informasi,</h4>
                <div class="mt-12">
                  <h4 class="font-bold underline">{{ $nama_dua }}</h4>
                  <h4>NIP. {{ $dosenInfo[$nama_dua]['nip'] ?? '-' }}</h4>
                </div>
              </div>
          {{-- SATU TANDA TANGAN --}}
          @elseif(count($data->tandatangan) === 1)
              @foreach ($data->tandatangan as $nama)
                <div class="w-5/12 text-left">
                  <h4>Menyetujui,</h4>
                  <h4>{{ $dosenInfo[$nama]['jabatan'] ?? '-' }}</h4>
                  <h4>Teknologi Informasi,</h4>
                  <div class="mt-12">
                    <h4 class="font-bold underline">{{ $nama }}</h4>
                    <h4>NIP. {{ $dosenInfo[$nama]['nip'] ?? '-' }}</h4>
                  </div>
                </div>
              @endforeach
          @endif
        </div>
      </div>
    </div>

    {{-- KONTAK PERSON --}}
    <div class="mt-4 ml-30">
      <h4>CP: {{ $data->nama_cp }} ({{ $data->nomor_cp }})</h4>
    </div>
  </x-kop_surat>
</x-layout>