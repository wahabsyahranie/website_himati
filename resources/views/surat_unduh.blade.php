<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Surat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header-table {
        width: 100%;
        text-align: center;
        border-collapse: collapse;
        }
        .header-table img {
            width: 80px; /* sesuaikan ukuran */
        }
        
        .content {
            margin-top: 20px;
        }
        .footer {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
        }

        .font-style {
          font-family: 'Times New Roman';
          font-weight: normal;
          margin: 0px;
        }

        .margin-text {
          margin-bottom: 2px;
          margin-top: 2px;
          text-align: justify;
        }

        .pembuka-surat {
          vertical-align: top;
        }

    </style>
  </head>
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
                <td style="font-weight: bold; padding-top: 10px;">{{ $data->dosen->jabatan }}</td>
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
    <div class="font-style margin-text" id="Isi Surat" style="margin-left: 17.4%; margin-bottom: 0px;">
      <p>Kami berkomitmen dengan baik serta akan mematuhi seluruh peraturan yang berlaku. Oleh karena itu, kami sangat mengharapkan izin dan dukungan dari Bapak/Ibu agar kegiatan ini dapat berjalan dengan lancar.</p>
    </div>

    {{-- TTD PENGESAHAN PENGURUS--}}
    <div style="margin-bottom: 0px">
      <div class="font-style margin-text" id="Isi Surat" style="margin-left: 17.4%">
        <p style="margin-bottom: 0px;">Hormat Kami,</p>
      </div>
      <div class="font-style" id="Isi Surat" style="margin-left: 17%">
        @php
          $info = $departemenMap[$data->departemen] ?? ['Sekretaris Umum', 'HMJ TI', 'Yemima Meilinda Munte', '236152003'];
        @endphp
        <table style="width: 100%; text-align: left; margin-top: 0px" class="pembuka-surat">
          <tr>
            <td style="width: 50%">Ketua Umum</td>
            <td style="width: 50%">{{ $info[0] }}</td>
          </tr>
          <tr>
            <td>HMJ TI</td>
            <td>{{ $info[1] }}</td>
          </tr>
          <tr>
            <td style="padding-top: 40px; font-weight: bold; text-decoration: underline;">Abdul Wahab Syahranie</td>
            <td style="padding-top: 40px; font-weight: bold; text-decoration: underline;">{{ $info[2] }}</td>
          </tr>
          <tr>
            <td>NIM. 236152003</td>
            <td>{{ $info[3] }}</td>
          </tr>
        </table>
      </div>
    </div>

    {{-- TTD PENGESAHAN PETINGGI --}}
    <div style="margin-top: 10px;">
      <div class="font-style" id="Isi Surat" style="margin-left: 17%">
        {{-- SATU TANDA TANGAN --}}
        @if(count($data->tandatangan) === 1)
          @foreach ($data->tandatangan as $nama )
            <table style="width: 100%; text-align: left; margin-top: 0px" class="pembuka-surat">
              <tr>
                <td style="width: 50%">Menyetujui,</td>
              </tr>
              <tr>
                <td>{{ $dosenInfo[$nama]['jabatan'] ?? '-' }}</td>
              </tr>
              <tr>
                <td>Teknologi Informasi</td>
              </tr>
              <tr>
                <td style="padding-top: 40px; font-weight: bold; text-decoration: underline;">{{ $nama }}</td>
              </tr>
              <tr>
                <td>NIP. {{ $dosenInfo[$nama]['nip'] ?? '-' }}</td>
              </tr>
            </table>
          @endforeach

        {{-- DUA TANDA TANGAN --}}
        @elseif (count($data->tandatangan) === 2)
        @php
          $nama_satu = $data->tandatangan[0];
          $nama_dua = $data->tandatangan[1];
        @endphp
          <table style="width: 100%; text-align: left; margin-top: 0px" class="pembuka-surat">
            <tr>
              <td style="width: 50%">Menyetujui,</td>
              <td style="width: 50%">Mengetahui,</td>
            </tr>
            <tr>
              <td>{{ $dosenInfo[$nama_satu]['jabatan'] ?? '-' }}</td>
              <td>{{ $dosenInfo[$nama_dua]['jabatan'] ?? '-' }}</td>
            </tr>
            <tr>
              <td>Teknologi Informasi</td>
              <td>Teknologi Informasi</td>
            </tr>
            <tr>
              <td style="padding-top: 40px; font-weight: bold; text-decoration: underline;">{{ $nama_satu }}</td>
              <td style="padding-top: 40px; font-weight: bold; text-decoration: underline;">{{ $nama_dua }}</td>
            </tr>
            <tr>
              <td>NIP. {{ $dosenInfo[$nama_satu]['nip'] ?? '-' }}</td>
              <td>NIP. {{ $dosenInfo[$nama_dua]['nip'] ?? '-' }}</td>
            </tr>
          </table>

        @endif
      </div>
    </div>

    {{-- KONTAK PERSON --}}
    <div class="font-style margin-text" id="Isi Surat" style="margin-left: 17.4%">
      <p style="font-size: 14px; font-style: italic">CP: Kania Afriansy (085298381263)</p>
    </div>
  </body>
</html>