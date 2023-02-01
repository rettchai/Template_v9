<div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
        {{-- <i class="fa-solid fa-user"></i> user --}}
        <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                    <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold text-blue-500">Approved</p>
                        <h5 class="font-weight-bolder mb-0 text-blue-500">
                            {{ number_format($sumApproved, 2) }}
                            {{-- <span class="text-success text-sm font-weight-bolder">+55%</span> --}}
                        </h5>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
        <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                    <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold text-yellow-500">Pending</p>
                        <h5 class="font-weight-bolder mb-0 text-yellow-500">
                            {{ number_format($sumPending, 2) }}
                            {{-- <span class="text-success text-sm font-weight-bolder">+3%</span> --}}
                        </h5>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                        <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
        <div class="card-body p-3">
            <div class="row">
                <div class="col-8">
                    <div class="numbers">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Reject</p>
                        <h5 class="font-weight-bolder mb-0">
                            {{ number_format($sumReject, 2) }}
                            {{-- <span class="text-danger text-sm font-weight-bolder">-2%</span> --}}
                        </h5>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                        <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
