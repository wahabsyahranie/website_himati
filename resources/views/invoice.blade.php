<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <x-pdf_style></x-pdf_style>
  <title>invoice</title>
</head>
<body>
  <div class="watermark">
    <img src="{{ public_path('img/lambang_hima_ti.png') }}" alt="Watermark">
  </div>
  {{-- TABLE HEADER --}}
  <div class="invoice-container invoice-font">
    <p class="text-bold">HMJ TI</p>
    <p class="invoice-center invoice-color-base">Penyewaan Anda Telah Dikonfirmasi!</p>
    <p class="invoice-text-xs invoice-color-base invoice-text-right">Dicetak pada: {{ $tanggalCetak }}</p>
    <hr class="invoice-color-base">  
    <div class="invoice-hr-padding">
      <table class="invoice-table">
        <tr>
          <td class="invoice-color-base">Tanggal Sewa</td>
          <td class="invoice-color-base">Nomor Pesanan</td>
          <td class="invoice-color-base">Nama</td>
        </tr>
        <tr>
          <td class="invoice-font-small">{{ \Carbon\Carbon::parse($info->tanggal_pinjam)->translatedFormat('d F Y') }} s.d. {{ \Carbon\Carbon::parse($info->tanggal_kembali)->translatedFormat('d F Y') }}</td>
          <td class="invoice-font-small">{{ $info->nomor_pesanan }}</td>
          <td class="invoice-font-small">{{ $info->user->name }}</td>
        </tr>
      </table>
    </div>
    <hr class="invoice-color-base">
  </div>

  {{-- TABLE RINCIAN PESANAN --}}
  <div class="invoice-container invoice-font">
    <table class="invoice-table">
      @foreach ($info->detail_penyewaans as $detail )
      <tr>
        <td class="invoice-td-image"><img src="{{ public_path('storage/'.$detail->inventaris->gambar) }}" alt="produk1" class="invoice-produk"></td>
        <td class="invoice-align-top" style="width: 250px;">
          <div class="text-bold">{{ $detail->inventaris->nama}}</div>
          <div class="invoice-font-small">Rp {{ number_format($detail->inventaris->harga, 0, ',', '.') }}</div>
        </td>
        <td class="invoice-font-small invoice-text-right invoice-align-top">{{ $jumlahHari }} Hari</td>
        <td class="invoice-font-small invoice-text-right invoice-align-top">Rp {{ number_format($detail->sub_total_harga, 0, ',', '.') }}</td>
      </tr>
      @endforeach
    </table>
  </div>

  {{-- TABLE TOTAL PESANAN --}}
  <div class="invoice-container invoice-font">
    <hr class="invoice-color-base">
    <table class="invoice-table">
      <tr>
        <td class="text-bold invoice-text-right">Total: <span class="invoice-color-base ">Rp {{ number_format($totalHarga, 0, ',', '.') }}</span></td>
      </tr>
    </table>
  </div>

  {{-- FOOTER --}}
  <p class="invoice-text-xs invoice-color-base">{{ $info->nomor_pesanan }} | <span>Dicetak pada: {{ $tanggalCetak }}</span></p>
</body>
</html>