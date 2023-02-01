<div class="table-responsive">
    <table class="table align-items-center mb-0">
        <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    UpdateDate</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    TexID</th>
                {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    กองทุน</th> --}}
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    ได้รับเงินจาก</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    เบอร์โทร</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Amount</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Status</th>
                {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Actions</th> --}}
            </tr>
        </thead>
        <tbody class="text-sm">
            @foreach ($TableDonates as $row)
                <tr>
                    <td>
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->updated_at)->format('d/m/y h:i a') }}
                    </td>
                    <td>
                        {{ $row->ReceiptTexID }}
                    </td>
                    {{-- <td class="align-middle text-center text-sm">
                        {{ $row->getFund->FundName }}
                    </td> --}}
                    <td class="align-middle text-center text-sm">
                        {{ $row->ReceiptName }}
                    </td>
                    <td class="align-middle">
                        {{ $row->ContactTel }}
                    </td>
                    <td class="align-middle">
                        {{ number_format($row->Amount, 2) }}
                    </td>
                    <td class="align-middle">
                        {{ $row->ReceiptStatus }}
                    </td>
                    {{-- <td class="align-middle text-center">
                        <x-button.circle class="border-0 p-2 ">
                            <i class="fa-solid fa-circle-info text-blue-500"></i>
                        </x-button.circle>

                        <x-button.circle class="border-0 p-2 ">
                            <i class="fa-solid fa-pen-to-square text-orange-500"></i>
                        </x-button.circle>

                    </td> --}}
                </tr>
            @endforeach

            @if ($TableDonates->total() > 1)
                <tr class="text-center text-sm">
                    <td colspan="6">
                        {{ $TableDonates->onEachSide(5)->links() }}
                    </td>
                </tr>
            @endif

        </tbody>
    </table>

</div>
{{-- {{ dd($TableDonates) }} --}}
