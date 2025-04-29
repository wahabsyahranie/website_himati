<?php

namespace App;

use App\Models\DetailPengurus;

trait HandlesDepartemen
{
    public function syncDepartemens($pengurus, array $departemens): void
    {
        $pengurus->detailPenguruses()->delete();

        foreach ($departemens as $departemen) {
            DetailPengurus::create([
                'penguruses_id' => $pengurus->id,
                'departemen' => $departemen,
            ]);
        }
    }
}
