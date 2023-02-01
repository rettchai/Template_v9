<div class="card min-h-100">
    <div class="card-header pb-0 p-3">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">
                <h6 class="mb-0">Receipt</h6>
            </div>
        </div>
    </div>
    <div class="card-body p-3 pb-0">
        <ul class="list-group">
            @foreach ($Newest as $New)
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark font-weight-bold text-sm">
                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $New->created_at)->format('d M Y h:i a') }}
                        </h6>
                        <span class="text-xs">ReceiptID : {{ $New->ReceiptID }}</span>
                    </div>
                    <div class="d-flex align-items-center text-sm">
                        {{ $New->Amount }}
                        <button wire:click="genPDF(1)" class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i
                                class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
