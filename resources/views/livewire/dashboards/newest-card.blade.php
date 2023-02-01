<div class="card-body pt-4 p-3">
    <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Newest</h6>
    <ul class="list-group">
        {{-- {{dd($Newest)}} --}}
        @foreach ($Newest as $New)
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center">
                    <button
                        class="btn btn-icon-only btn-rounded btn-outline-info mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                            class="fas fa-arrow-up"></i></button>
                    <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">{{ $New->ReceiptName }}</h6>
                        <span class="text-xs">
                            {{-- 27 March 2020, at 12:30 PM --}}
                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $New->created_at)->format('d M Y h:i a') }}
                        </span>
                    </div>
                </div>
                <div class="d-flex align-items-center text-info text-gradient text-sm font-weight-bold">
                    {{ $New->Amount }}
                </div>
            </li>
        @endforeach
    </ul>
</div>
