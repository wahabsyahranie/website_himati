<x-layoutsurat>
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
              <td>1 (satu)</td>
          </tr>
          <tr class="pembuka-surat">
              <td>Perihal</td>
              <td>:</td>
              <td>Surat Peminjaman</td>
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
    <p class="margin-text">Dalam kesempatan ini, kami dari Himpunan Mahasiswa Jurusan Teknologi Informasi bermaksud mengajukan permohonan peminjaman sejumlah fasilitas yang diperlukan guna mendukung kelancaran kegiatan <strong>{{ $detail_surat['nama_kegiatan'] }}</strong>. Adapun rincian fasilitas yang dimohonkan tercantum pada lampiran surat ini.</p>
    <p style="margin-bottom: 0px">Peminjaman ini dijadwalkan akan dilaksanakan pada:</p>
  </div>

  {{-- KETERANGAN SURAT --}}
  <div class="font-style" id="Isi Surat" style="margin-left: 17%">
    <table style="width: 100%; text-align: left;" class="pembuka-surat">
      <tr class="pembuka-surat">
          <td style="width: 15%;">Hari/Tanggal</td>
          <td style="width: 2%;">:</td>
          @if ($detail_surat['tanggal_pelaksana'] === $detail_surat['tanggal_selesai'])
            <td style="width: 83%;">{{ \Carbon\Carbon::parse($detail_surat['tanggal_pelaksana'])->translatedFormat('l') }}, {{ \Carbon\Carbon::parse($detail_surat['tanggal_pelaksana'])->translatedFormat('d F Y') }}</td>
          @else
            <td style="width: 83%;">{{ \Carbon\Carbon::parse($detail_surat['tanggal_pelaksana'])->translatedFormat('l') }} S.D. {{ \Carbon\Carbon::parse($detail_surat['tanggal_selesai'])->translatedFormat('l') }}, {{ \Carbon\Carbon::parse($detail_surat['tanggal_pelaksana'])->translatedFormat('d') }} - {{ \Carbon\Carbon::parse($detail_surat['tanggal_selesai'])->translatedFormat('d F Y') }}</td>
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
    <p>Demikian surat peminjaman ini kami sampaikan. Besar harapan kami agar Bapak/Ibu/Saudara/Saudari berkenan memberikan dukungan melalui peminjaman barang sebagaimana tercantum dalam lampiran. Atas perhatian dan kerjasamanya, kami ucapkan terima kasih.</p>
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

  {{-- PAGE 2 DUA --}}
  {{-- PAGE 2 DUA --}}
  {{-- PAGE 2 DUA --}}
  <div class="page-break"></div>
  <x-kop_surat></x-kop_surat>
  <p class="textdefmarginleft">Lampiran</p>
  <table style="width: 90%;" class="pembuka-surat margin-text tableborder table-bordered">
    <tr>
      <td class="text-bold">Nomor</td>
      <td class="text-bold">Nama</td>
      <td class="text-bold">Jumlah</td>
    </tr>

    {{-- {{ dd($detail_surat) }} --}}
    @foreach ($detail_surat['lampiran'] as $lampiran )
      <tr>
        <td style="width: 10%; text-align: center;z">{{ $loop->iteration }}</td>
        <td>{{ $lampiran['nama'] }}</td>
        <td>{{ $lampiran['jumlah'] }}</td>
      </tr>
    @endforeach
  </table>
</x-layoutsurat>