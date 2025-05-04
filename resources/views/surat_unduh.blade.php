<x-layout>
  <body>
    {{-- KOP SURAT --}}
    <table class="header-table" style="border-bottom: 4px double black">
      <tr>
          <td style="width: 15%; vertical-align: middle; text-align: center;">
            <img src="{{ public_path('img/lambang_polnes.png') }}" alt="Lambang Kiri" style="width: 120px; height: auto;">
          </td>
          <td>
              <h5 class="font-style">KEMENTERIAN PENDIDIKAN TINGGI, SAINS DAN TEKNOLOGI</h5>
              <h5 class="font-style">POLITEKNIK NEGERI SAMARINDA</h5>
              <h5 class="font-style" style="font-weight: bold;">HIMPUNAN MAHASISWA JURUSAN TEKNOLOGI INFORMASI</h5>
              <h5 class="font-style">Jalan Cipto Mangunkusumo Kampus Gunung Panjang Samarinda 75131</h5>
              <h5 class="font-style" style="margin-bottom: 12px;">No HP : 085298381263 | E-mail : himati@polnes.ac.id</h5>
          </td>
          <td style="width: 15%; vertical-align: middle; text-align: center;">
            <img src="{{ public_path('img/lambang_hima_ti.png') }}" alt="Lambang Kanan" style="width: 120px; height: auto;">
          </td>
      </tr>
    </table>

    {{-- PEMBUKA SURAT --}}
    <div class="font-style" id="Pembuka Surat">
      <div class="font-style" style="width: 100%;">
        <p style="text-align: right; margin-bottom: 0px; margin-top: 8px;">Samarinda, {{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y') }}</p>
    
        <table style="width: 100%; text-align: left;" class="pembuka-surat margin-text">
            <tr class="pembuka-surat">
                <td style="width: 15%;">Nomor</td>
                <td style="width: 2%;">:</td>
                <td style="width: 83%;">{{ $data->nomor_surat }}</td>
            </tr>
            <tr class="pembuka-surat">
                <td>Lampiran</td>
                <td>:</td>
                <td>{{ $data->lampiran }}</td>
            </tr>
            <tr class="pembuka-surat">
                <td>Perihal</td>
                <td>:</td>
                <td>{{ $data->perihal }}</td>
            </tr>
            <tr class="pembuka-surat">
                <td style="padding-top: 10px;">Kepada Yth</td>
                <td style="padding-top: 10px;">:</td>
                <td style="font-weight: bold; padding-top: 10px;">{{ $tujuan_after }}</td>
            </tr>
        </table>
    </div>

      {{-- ISI SURAT --}}
    <div class="font-style" id="Isi Surat" style="margin-left: 17.4%">
      <p style="margin-bottom: 0px">Di - </p>
      <p class="margin-text" style="margin-left: 28px">Tempat</p>
      <p style="margin-bottom: 0px">Dengan hormat,</p>
      <p class="margin-text">{{ $data->isi }}.</p>
      <p style="margin-bottom: 0px">Adapun rincian kegiatan yang direncanakan adalah sebagai berikut:</p>
    </div>

    {{-- KETERANGAN SURAT --}}
    <div class="font-style" id="Isi Surat" style="margin-left: 17%">
      <table style="width: 100%; text-align: left;" class="pembuka-surat">
        <tr class="pembuka-surat">
            <td style="width: 15%;">Hari/Tanggal</td>
            <td style="width: 2%;">:</td>
            @if ($data->tanggal_pelaksana === $data->tanggal_selesai)
              <td style="width: 83%;">{{ \Carbon\Carbon::parse($data->tanggal_pelaksana)->translatedFormat('l') }}, {{ \Carbon\Carbon::parse($data->tanggal_pelaksana)->translatedFormat('d F Y') }}</td>
            @else
              <td style="width: 83%;">{{ \Carbon\Carbon::parse($data->tanggal_pelaksana)->translatedFormat('l') }}, {{ \Carbon\Carbon::parse($data->tanggal_pelaksana)->translatedFormat('d F Y') }} - {{ \Carbon\Carbon::parse($data->tanggal_selesai)->translatedFormat('l') }}, {{ \Carbon\Carbon::parse($data->tanggal_pelaksana)->translatedFormat('d F Y') }}</td>
            @endif
        </tr>
        <tr class="pembuka-surat">
            <td>Waktu</td>
            <td>:</td>
            <td>{{ \Carbon\Carbon::parse($data->waktu_pelaksana)->format('H:i') }} - {{ \Carbon\Carbon::parse($data->waktu_selesai)->format('H:i') }} WITA</td>
        </tr>
        <tr class="pembuka-surat">
            <td>Tempat</td>
            <td>:</td>
            <td>{{ $data->tempat_pelaksana }}</td>
        </tr>
      </table>
    </div>

    {{-- PENUTUP SURAT --}}
    <div class="font-style margin-text" id="Isi Surat" style="margin-left: 17.4%; margin-bottom: 0px; margin-bottom: 0%">
      <p>Kami berkomitmen dengan baik serta akan mematuhi seluruh peraturan yang berlaku. Oleh karena itu, kami sangat mengharapkan izin dan dukungan dari Bapak/Ibu agar kegiatan ini dapat berjalan dengan lancar.</p>
    </div>

    {{-- PENGESAHAN SURAT --}}
    <div>
      <div class="font-style" id="Isi Surat" style="margin-left: 17%">
        <table style="width: 100%; text-align: left;" class="pembuka-surat">
          @for ($i = 0; $i < count($pengesahanInfo); $i += 2)
            <tr>
              @php
                $total = count($pengesahanInfo);
                // Ambil 2 item per baris: yang pertama (kanan), lalu yang kedua (kiri)
                $firstIndex = $i;
                $secondIndex = $i + 1;
                $indexes = [];
        
                // Jika cukup dua item, urutannya dibalik
                if (isset(array_values($pengesahanInfo)[$secondIndex])) {
                    $indexes = [$secondIndex, $firstIndex]; // kanan ke kiri
                } else {
                    $indexes = [$firstIndex]; // sisa 1 kolom saja
                }
              @endphp
        
              @foreach ($indexes as $index)
                @php
                  $pengesahan = array_values($pengesahanInfo)[$index];
                  if ($index === 0) {
                      $keterangan = 'Hormat Saya';
                  } elseif ($index === $total - 1) {
                      $keterangan = 'Menyetujui';
                  } else {
                      $keterangan = 'Mengetahui';
                  }
                @endphp
        
                <td style="width: 50%; vertical-align: top; padding-right: 20px;">
                  <p class="margin-text" style="margin-top: 1%">{{ $keterangan }},</p>
                  <p class="margin-text">{{ $pengesahan['jabatan'] ?? '-' }}</p>
                  <p class="margin-text">{{ $pengesahan['bidang'] ?? '-' }}</p>
                  <p style="padding-top: 40px; font-weight: bold; text-decoration: underline;" class="margin-text">
                    {{ $pengesahan['nama'] ?? '-' }}
                  </p>
                  <p class="margin-text">{{ $pengesahan['type_nomor_induk'] }}. {{ $pengesahan['nomor_induk'] ?? '-' }}</p>
                </td>
              @endforeach
            </tr>
          @endfor
        </table>
      </div>
    </div>

    {{-- KONTAK PERSON --}}
    <div class="font-style margin-text" id="Isi Surat" style="margin-left: 17.4%">
      <p style="font-size: 14px; font-style: italic">CP: Kania Afriansy (085298381263)</p>
    </div>
  </body>
</x-layout>