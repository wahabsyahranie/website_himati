<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use App\Models\PengajuanSurat;

class SendController extends Controller
{

    public function send($id)
    {
        $getId = Kegiatan::find($id);
        $tanggalPelaksana = Carbon::parse($getId->tanggal_pelaksana);
        $tanggal = $tanggalPelaksana->translatedFormat('l, j F Y');
        $jam = $tanggalPelaksana->format('H:i');

        $message = "Assalamualaikum Wr. Wb.\n\nDengan hormat, kami sampaikan pemberitahuan bahwa akan diadakan *$getId->nama* yang bertujuan untuk $getId->tujuan_rapat. Adapun detail pelaksanaan rapat adalah sebagai berikut:\n\nHari/Tanggal : $tanggal \nWaktu : $jam WITA \nTempat : $getId->tempat_pelaksanaan \n\nCatatan Penting:\nKehadiran seluruh pengurus dan kader bersifat wajib mengingat pentingnya agenda rapat ini demi kelancaran dan keberhasilan organisasi. Mohon untuk hadir tepat waktu.\n\nAtas perhatian dan kerjasama Saudara/i kami ucapkan terima kasih.\nWassalamualaikum Wr. Wb.";

        $encodedMessage = urlencode($message);
        $whatsappUrl = "whatsapp://send?text={$encodedMessage}";
        return redirect($whatsappUrl);
    }
}
