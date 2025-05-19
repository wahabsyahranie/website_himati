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
              <td>Surat Permohonan Dispensasi</td>
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
    <p class="margin-text">Sehubungan dengan akan diselenggarakannya kegiatan <strong>{{ $data->nama_kegiatan }}</strong> yang diadakan oleh Himpunan Mahasiswa Jurusan Teknologi Informasi, kami selaku panitia pelaksana memohon dengan hormat kepada Bapak/Ibu untuk dapat memberikan dispensasi perkuliahan kepada mahasiswa yang namanya tercantum dalam lampiran surat ini, karena yang bersangkutan akan mengikuti kegiatan tersebut.</p>
    <p style="margin-bottom: 0px">Dispensasi ini diajukan untuk tanggal pelaksanaan berikut:</p>
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
            <td style="width: 83%;">{{ \Carbon\Carbon::parse($data->tanggal_pelaksana)->translatedFormat('l') }} S.D. {{ \Carbon\Carbon::parse($data->tanggal_selesai)->translatedFormat('l') }}, {{ \Carbon\Carbon::parse($data->tanggal_pelaksana)->translatedFormat('d') }} - {{ \Carbon\Carbon::parse($data->tanggal_selesai)->translatedFormat('d F Y') }}</td>
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
    <p>Demikian surat permohonan dispensasi ini kami sampaikan. Besar harapan kami agar Bapak/Ibu dapat memberikan izin kepada mahasiswa yang bersangkutan untuk mengikuti kegiatan dimaksud sesuai jadwal yang telah ditentukan. Atas perhatian dan kebijaksanaan Bapak/Ibu, kami ucapkan terima kasih.</p>
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
    <p style="font-size: 14px; font-style: italic">CP: {{ $data->nama_cp }} ({{ $data->nomor_cp }}) </p>
  </div>

  {{-- PAGE 2 DUA --}}
  {{-- PAGE 2 DUA --}}
  {{-- PAGE 2 DUA --}}
  <div class="page-break"></div>
  <x-kop_surat></x-kop_surat>
  <p class="textdefmarginleft">Lampiran</p>
  <table style="width: 90%;" class="pembuka-surat margin-text tableborder table-bordered">
    <tr>
      <td class="text-bold">No</td>
      <td class="text-bold">Nama</td>
      <td class="text-bold">NIM</td>
      <td class="text-bold">Kelas</td>
    </tr>
    @foreach ($data->lampiran as $lampiran )
      <tr>
        <td style="width: 7%; text-align: center;z">{{ $loop->iteration }}</td>
        <td>{{ $lampiran['nama'] }}</td>
        <td>{{ $lampiran['nim'] }}</td>
        <td style="width: 20%;">{{ $lampiran['kelas'] }}</td>
      </tr>
    @endforeach
  </table>
</x-layoutsurat>