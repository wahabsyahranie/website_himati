<x-layoutsurat>
  <body>
    {{-- KOP SURAT --}}
    <x-kop_surat></x-kop_surat>

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
                <td>-</td>
            </tr>
            <tr class="pembuka-surat">
                <td>Perihal</td>
                <td>:</td>
                <td>Surat Izin Kegiatan</td>
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
      <p class="margin-text">Dalam kesempatan ini, kami dari Himpunan Mahasiswa Jurusan Teknologi Informasi bermaksud mengajukan izin pelaksanaan kegiatan <strong>{{ $detail_surat['nama_kegiatan'] }}</strong> yang bertujuan untuk {{ $detail_surat['tujuan_kegiatan']}}.</p>
      <p style="margin-bottom: 0px">kegiatan ini dijadwalkan akan dilaksanakan pada:</p>
    </div>

    {{-- KETERANGAN SURAT --}}
    <div class="font-style" id="Isi Surat" style="margin-left: 17%">
      <table style="width: 100%; text-align: left;" class="pembuka-surat">
        <tr class="pembuka-surat">
            <td style="width: 15%;">Hari/Tanggal</td>
            <td style="width: 2%;">:</td>
            {{-- {{ dd($detail_surat) }} --}}
            @if ($detail_surat['tanggal_pelaksana'] == $detail_surat['tanggal_selesai'])
              <td style="width: 83%;">{{ \Carbon\Carbon::parse($detail_surat['tanggal_pelaksana'])->translatedFormat('l') }}, {{ \Carbon\Carbon::parse($detail_surat['tanggal_pelaksana'])->translatedFormat('d F Y') }}</td>
            @else
              <td style="width: 83%;">{{ \Carbon\Carbon::parse($detail_surat['tanggal_pelaksana'])->translatedFormat('l') }}, {{ \Carbon\Carbon::parse($detail_surat['tanggal_pelaksana'])->translatedFormat('d F Y') }} - {{ \Carbon\Carbon::parse($detail_surat['tanggal_selesai'])->translatedFormat('l') }}, {{ \Carbon\Carbon::parse($detail_surat['tanggal_selesai'])->translatedFormat('d F Y') }}</td>
            @endif
        </tr>
        <tr class="pembuka-surat">
            <td>Waktu</td>
            <td>:</td>
            <td>{{ \Carbon\Carbon::parse($detail_surat['waktu_pelaksana'])->format('H:i') }} - {{ \Carbon\Carbon::parse($detail_surat['waktu_selesai'])->format('H:i') }} WITA</td>
        </tr>
        <tr class="pembuka-surat">
            <td>Tempat</td>
            <td>:</td>
            <td>{{ $detail_surat['tempat_pelaksana'] }}</td>
        </tr>
      </table>
    </div>

    {{-- PENUTUP SURAT --}}
    <div class="font-style margin-text" id="Isi Surat" style="margin-left: 17.4%; margin-bottom: 0px; margin-bottom: 0%">
      <p>Besar harapan kami agar permohonan ini dapat dipertimbangkan. Kami siap memberikan informasi tambahan jika diperlukan. Atas perhatian dan dukungan Bapak/Ibu, kami ucapkan terima kasih.</p>
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
                  {{-- QR CODE --}}
                  @if(!empty($pengesahan['ttdDigital']))
                      <img style="margin-top: 5px; width: 70px; height: 70px;" src="data:image/png;base64,{{ $pengesahan['ttdDigital'] }}" alt="">
                  @else
                      <div style="margin-top: 5px; width: 70px; height: 70px;"></div>
                  @endif
                  <p style="padding-top: 5px; font-weight: bold; text-decoration: underline;" class="margin-text">
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
      <p style="font-size: 14px; font-style: italic">CP: {{ $detail_surat['nama_cp'] }} ({{ $detail_surat['nomor_cp'] }}) </p>
    </div>
  </body>
</x-layoutsurat>