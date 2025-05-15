<div class="modal-container" id="global-modal">
    <div class="shadow-lg w-[600px] max-w-[80%] rounded px-[50px] py-[30px] text-center bg-text-primary modal-content">
        {{ $slot }}
        <div class="modal-footer mt-6 flex justify-end">
            <button class="rounded px-[10px] py-[5px] close-modal text-[14px] hover:bg-primary hover:text-base cursor-pointer bg-transparent text-primary">Tutup</button>
        </div>
    </div>
</div>