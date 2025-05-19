<x-layoutsurat>
  <x-kop_surat></x-kop_surat>
  <div class="container">
    {{-- KETERANGAN SURAT --}}
    <p class="text-bold text-underline text-center" style="margin-bottom: 0px;">SURAT MANDAT</p>
    <p style="margin-top: 0px;" class="text-center">Nomor: {{ $data->nomor_surat }}</p>

    {{-- PEMBUKA SURAT --}}
    <div class="font-style">
      <p class="margin-text">{{$data->tujuan_kegiatan}}</p>
    </div>

    {{-- RINCIAN MANDAT --}}
    <div style="margin-top: 15px ">
      <table class="table-margin">
        @foreach ($data->lampiran as $lampiran )
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>Nama</td>
            <td>: {{ $lampiran['nama'] }}</td>
          </tr>
          <tr>
            <td></td>
            <td>NIM</td>
            <td>: {{ $lampiran['nim'] }}</td>
          </tr>
          <tr>
            <td></td>
            <td>Prodi</td>
            <td>: {{ $lampiran['prodi'] }}</td>
          </tr>
          <tr>
            <td></td>
            <td>Jurusan</td>
            <td>: Teknologi Informasi</td>
          </tr>
          <tr>
            <td></td>
            <td>No HP</td>
            <td>: {{ $lampiran['no_hp'] }}</td>
          </tr>
          <tr>
            <td></td>
            <td>Jabatan</td>
            <td>: {{ $lampiran['jabatan'] }}</td>
          </tr>
        @endforeach
      </table>
    </div>

    {{-- PENUTUP --}}
    <div style="margin-top: 15px " class="font-style">
      <p class="margin-text">Demikian surat mandat ini dibuat untuk dipergunakan sebagaimana mestinya. Kami berharap yang bersangkutan dapat menjalankan amanah, tugas, dan tanggung jawab yang diberikan dengan penuh tanggung jawab serta menjunjung tinggi nama baik Himpunan Mahasiswa Jurusan Teknologi Informasi.</p>
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