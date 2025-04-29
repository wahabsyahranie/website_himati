<?php

namespace App\Observers;

use App\Models\Penyewaan;
use Illuminate\Support\Carbon;

class PenyewaanObserver
{
    /**
     * Handle the Penyewaan "created" event.
     */
    public function created(Penyewaan $penyewaan): void
    {
        //
    }

    /**
     * Handle the Penyewaan "updated" event.
     */
    public function updated(Penyewaan $penyewaan): void
    {
        //
    }

    /**
     * Handle the Penyewaan "deleted" event.
     */
    public function deleted(Penyewaan $penyewaan): void
    {
        if ($penyewaan->isDirty('status') && $penyewaan->status === 'disetujui') {
            $this->scheduleStockChanges($penyewaan);
        }
    }

    protected function scheduleStockChanges(Penyewaan $penyewaan)
    {
        // Pengurangan stok (H-1 sebelum tanggal_pinjam)
        $tanggalKurangStok = Carbon::parse($penyewaan->tanggal_pinjam)->subDay();
        $penyewaan->update(['pengurangan_stok_at' => $tanggalKurangStok]);

        // Pengembalian stok (H+1 setelah tanggal_kembali)
        $tanggalKembaliStok = Carbon::parse($penyewaan->tanggal_kembali)->addDay();
        $penyewaan->update(['pengembalian_stok_at' => $tanggalKembaliStok]);
    }


    /**
     * Handle the Penyewaan "restored" event.
     */
    public function restored(Penyewaan $penyewaan): void
    {
        //
    }

    /**
     * Handle the Penyewaan "force deleted" event.
     */
    public function forceDeleted(Penyewaan $penyewaan): void
    {
        //
    }
}
