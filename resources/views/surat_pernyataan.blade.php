<x-layoutsurat>
  <x-kop_surat></x-kop_surat>
  <div class="container">
    {{-- KETERANGAN SURAT --}}
    <p class="text-bold text-underline text-center" style="margin-bottom: 0px;">SURAT PERNYATAAN</p>
    <p style="margin-top: 0px;" class="text-center">Nomor: {{ $data->nomor_surat }}</p>

    {{-- PEMBUKA SURAT --}}
    <div class="font-style">
      <p class="margin-text">Saya yang bertanda tangan dibawah ini:</p>
    </div>

    {{-- RINCIAN MANDAT --}}
    <div style="margin-top: 15px ">
      <table class="table-margin">
        @foreach ($data->lampiran as $lampiran )
          <tr>
            <td style="width: 120px">Nama</td>
            <td>: {{ $lampiran['nama'] }}</td>
          </tr>
          <tr>
            <td>NIM</td>
            <td>: {{ $lampiran['nim'] }}</td>
          </tr>
          <tr>
            <td>Prodi</td>
            <td>: {{ $lampiran['prodi'] }}</td>
          </tr>
          <tr>
            <td>Jurusan</td>
            <td>: Teknologi Informasi</td>
          </tr>
          <tr>
            <td>Jabatan</td>
            <td>: {{ $lampiran['jabatan'] }}</td>
          </tr>
          {{-- PERNYATAAN --}}
          @if ($loop->first)
            </table>

            <div style="margin-top: 15px; margin-bottom: 15px;">
              <p class="margin-text">Dengan ini menyatakan bahwa:</p>
            </div>

            <table class="table-margin">
          @endif
        @endforeach
      </table>
    </div>

    {{-- PENUTUP --}}
    <div style="margin-top: 15px " class="font-style">
      <p class="margin-text">Merupakan anggota aktif organisasi Himpunan Mahasiswa Jurusan Teknologi Informasi Politeknik Negeri Samarinda. dalam kepengurusan tahun {{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('Y') }}.</p>
    </div>

    {{-- PENGESHAAN --}}
    <div style=" margin-top: 15px">
      <div class="font-style">
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
        
                <td style="width: 50%; vertical-align: top;">
                  <p class="margin-text" style="margin-top: 1%">Ditetapkan di Samarinda</p>
                  <p class="margin-text">Pada tanggal {{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y') }}</p>
                  <p class="margin-text">{{ $pengesahan['jabatan'] ?? '-' }} {{ $pengesahan['bidang'] ?? '-' }}</p>
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
  </div>
</x-layoutsurat>