<?php

namespace App\Http\Controllers;

use App\Models\TandatanganDigital;
use Illuminate\Http\Request;

class TtdController extends Controller
{
    public function cek(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
        ]);

        $code = $request->input('code');
        $tandatangan = TandatanganDigital::where('nomor_registrasi', $code)->first();
        
        if ($tandatangan) {
            return response()->json([
                'valid' => true,
                'data' => [
                    'nomor_registrasi' => $tandatangan->nomor_registrasi,
                    'perihal_surat' => $tandatangan->pengajuan_surats->nomor_surat,
                    'nama' => $tandatangan->pengesahans->sumberable->user->name,
                    'nip' => $tandatangan->pengesahan_id->sumberable->user->dosen->nip,
                    'jabatan' => $tandatangan->pengesahans->jabatan,
                    'waktu' => $tandatangan->updated_at,
                    'catatan' => $tandatangan->catatan
                ]
            ]);
        } else {
            return response()->json([
                'valid' => false,
            ]);
        }
    }
}
