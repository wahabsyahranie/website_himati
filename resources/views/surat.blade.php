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
        <h4 class="mt-6">Kepada Yth</h4>
      </div>
    
      <div class="w-[10px] text-right space-y-1 pr-1">
        <h4>:</h4>
        <h4>:</h4>
        <h4>:</h4>
        <h4 class="mt-6">:</h4>
      </div>
    
      <div class="w-6/12 space-y-1">
        <h4>{{ $data->nomor_surat }}</h4>
        <h4>{{ $data->lampiran }}</h4>
        <h4>{{ $data->perihal }}</h4>
        <h4 class="font-bold mt-6">{{ $data->dosen->jabatan }}</h4>
      </div>
    </div>
    
    {{-- ISI SURAT --}}
    <div class="ml-30">
      <h4>Di -</h4>
      <h4 class="ml-7">Tempat</h4>
      <h4 class="mt-4">Dengan hormat,</h4>
      <h4 class="text-justify">Sehubung dengan diadakannya {{ $data->nama_kegitan }}. Kami dari HIMA TI bermaksud mengajukan permohonan {{ $data->perihal }} sebagai tempat pelaksanaan kegiatan tersebut. Kegiatan ini bertujuan untuk memberikan pelatihan dasar mengenai penggunaan Figma dalam pengembangan produk digital. Dengan adanya workshop ini, diharapkan peserta dapat memahami dan mengaplikasikan keterampilan desain digital untuk medukung kebutuhan akademik maupun professional mereka.</h4>

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
          <h4>{{ \Carbon\Carbon::parse($data->tanggal_pelaksana)->translatedFormat('l') }} - {{ \Carbon\Carbon::parse($data->tanggal_selesai)->translatedFormat('l') }}</h4>
          <h4>{{ \Carbon\Carbon::parse($data->tanggal_pelaksana)->translatedFormat('d F Y') }} - {{ \Carbon\Carbon::parse($data->tanggal_selesai)->translatedFormat('d F Y') }}</h4>
          <h4>{{ \Carbon\Carbon::parse($data->waktu_pelaksana)->format('H:i') }} - {{ \Carbon\Carbon::parse($data->waktu_selesai)->format('H:i') }}</h4>
          <h4>{{ $data->tempat_pelaksana }}</h4>
        </div>
      </div>
    </div>

    {{-- PENUTUP SURAT --}}
    <div class="ml-30 mt-4">
      <h4 class="text-justify">Kami berkomitmen dengan baik serta akan mematuhi seluruh peraturan yang berlaku. Oleh karena itu, kami sangat mengharapkan izin dan dukungan dari Bapak/Ibu agar kegiatan ini dapat berjalan dengan lancar.</h4>
    </div>
    <x-pengesahan_type_b></x-pengesahan_type_b>
  </x-kop_surat>
</x-layout>