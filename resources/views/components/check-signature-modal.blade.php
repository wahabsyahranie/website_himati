<div class="modal-container" id="check-signature-step1-modal">
    <div class="shadow-lg w-[400px] max-w-[90%] rounded px-[30px] py-[24px] text-center bg-white modal-content text-black">
        <div class="flex items-center gap-2 justify-center mb-2">
            <img src="/img/qr-icon.png" alt="QR Icon" class="w-6 h-6" onerror="this.style.display='none'">
            <span class="font-semibold text-base">Cek Pengesahan</span>
        </div>
        <div class="mb-2 text-left">
            <div class="font-semibold text-xs mb-2">DETAIL PENGESAHAN</div>
            <label class="block text-xs font-semibold mb-1">URL</label>
            <input type="text" id="signature-url-input" class="w-full px-3 py-2 border rounded text-xs mb-2 text-black bg-gray-100" placeholder="https://..." disabled value="{{ url()->current() }}">
            <label class="block text-xs font-semibold mb-1">Nomor Pengesahan</label>
            <input type="text" id="signature-name-input" class="w-full px-3 py-2 border rounded text-xs mb-2 text-black bg-gray-100" placeholder="Nomor Pengesahan" disabled value="kartuli">
            <label class="block text-xs font-semibold mb-1">Masukkan Nomor Pengesahan</label>
            <input type="text" id="signature-code-input" class="w-full px-3 py-2 border rounded text-xs mb-2 text-black" placeholder="Masukkan Nomor Pengesahan">
        </div>
        <div class="modal-footer mt-4 flex justify-end gap-2">
            <button class="rounded px-4 py-2 close-modal-step1 text-xs hover:bg-primary hover:text-base cursor-pointer bg-transparent text-primary border border-primary">Tutup</button>
            <button id="check-signature-btn" class="rounded px-4 py-2 bg-primary text-white hover:bg-primary/80 text-xs">Periksa</button>
        </div>
    </div>
</div>

<div class="modal-container" id="check-signature-step2-success-modal">
    <div class="shadow-lg w-[500px] max-w-[95%] rounded px-[30px] py-[24px] text-center bg-white modal-content text-black">
        <div class="flex items-center gap-2 justify-center mb-2">
            <img src="/img/qr-icon.png" alt="QR Icon" class="w-6 h-6" onerror="this.style.display='none'">
            <span class="font-semibold text-base">QR Telah Discann</span>
        </div>
        <div class="mb-2 text-left">
            <div class="font-semibold text-xs mb-2">DETAIL SURAT</div>
            <div class="grid grid-cols-2 gap-2 mb-1">
                <div>
                    <label class='block text-[11px] font-semibold mb-1'>Nomor Surat</label>
                    <input type='text' class='w-full px-2 py-1 border rounded text-xs mb-1 text-black bg-gray-100' value='kartuli' disabled>
                </div>
                <div>
                    <label class='block text-[11px] font-semibold mb-1'>Perihal Surat</label>
                    <input type='text' class='w-full px-2 py-1 border rounded text-xs mb-1 text-black bg-gray-100' value='-' disabled>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-2 mb-1">
                <div>
                    <label class='block text-[11px] font-semibold mb-1'>Nama</label>
                    <input type='text' class='w-full px-2 py-1 border rounded text-xs mb-1 text-black bg-gray-100' value='Budi' disabled>
                </div>
                <div>
                    <label class='block text-[11px] font-semibold mb-1'>NIP</label>
                    <input type='text' class='w-full px-2 py-1 border rounded text-xs mb-1 text-black bg-gray-100' value='12345678' disabled>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-2 mb-1">
                <div>
                    <label class='block text-[11px] font-semibold mb-1'>Jabatan</label>
                    <input type='text' class='w-full px-2 py-1 border rounded text-xs mb-1 text-black bg-gray-100' value='Mahasiswa' disabled>
                </div>
                <div>
                    <label class='block text-[11px] font-semibold mb-1'>Ditandatangani Pada</label>
                    <input type='text' class='w-full px-2 py-1 border rounded text-xs mb-1 text-black bg-gray-100' value='2025-06-08' disabled>
                </div>
            </div>
            <div class="mb-1">
                <label class='block text-[11px] font-semibold mb-1'>Catatan</label>
                <input type='text' class='w-full px-2 py-1 border rounded text-xs mb-1 text-black bg-gray-100' value='Peminjaman Ruang' disabled>
            </div>
        </div>
        <div class="modal-footer mt-4 flex justify-end gap-2">
            <button class="rounded px-4 py-2 close-modal-step2 text-xs hover:bg-primary hover:text-base cursor-pointer bg-transparent text-primary border border-primary">Tutup</button>
            <button class='rounded px-4 py-2 bg-primary text-white hover:bg-primary/80 text-xs'>Lihat Surat Asli</button>
        </div>
    </div>
</div>

<div class="modal-container" id="check-signature-step2-fail-modal">
    <div class="shadow-lg w-[400px] max-w-[90%] rounded px-[30px] py-[24px] text-center bg-white modal-content text-black flex flex-col items-center">
        <div class="flex items-center gap-2 justify-center mb-2">
            <img src="/img/qr-icon.png" alt="QR Icon" class="w-6 h-6" onerror="this.style.display='none'">
            <span class="font-semibold text-base">Cek Pengesahan</span>
        </div>
        <div class='flex flex-col items-center w-full'>
            <div class='w-20 h-20 rounded-full bg-red-100 flex items-center justify-center mb-2'><svg class='w-16 h-16 text-red-600' fill='none' stroke='currentColor' stroke-width='2' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' d='M6 18L18 6M6 6l12 12'/></svg></div>
            <div class='font-bold text-red-700 text-base mt-2'>DETAIL PENGESAHAN TIDAK DITEMUKAN</div>
        </div>
        <div class="modal-footer mt-4 flex justify-end gap-2 w-full">
            <button class="rounded px-4 py-2 close-modal-step2 text-xs hover:bg-primary hover:text-base cursor-pointer bg-transparent text-primary border border-primary">Tutup</button>
        </div>
    </div>
</div>
