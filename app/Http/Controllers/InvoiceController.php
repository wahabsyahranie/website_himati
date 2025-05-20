<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\DetailPenyewaan;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function invoice($nomor_pesanan) {
        $info = Penyewaan::with('detail_penyewaans.inventaris')->where('nomor_pesanan', $nomor_pesanan)->where('status', 'disetujui')->firstOrFail();
        $jumlahHari = Carbon::parse($info->tanggal_pinjam)->diffInDays(Carbon::parse($info->tanggal_kembali)) + 1;
        $totalHarga = 0;
        $tanggalCetak = now();

        foreach ($info->detail_penyewaans as $detail) {
            $hargaPerHari = $detail->inventaris->harga ?? 0;
            $detail->sub_total_harga = $hargaPerHari * $jumlahHari;

            $totalHarga += $detail->sub_total_harga;
        }
        // return view('invoice', compact('info', 'jumlahHari', 'totalHarga'));
        $namaFile = $info->nomor_pesanan ." - " . $info->user->name;
        $pdf = Pdf::loadView('invoice', compact('info', 'jumlahHari', 'totalHarga', 'tanggalCetak'))->setPaper('a5', 'landscape');

        return $pdf->stream($namaFile . '.pdf');
    }
}
