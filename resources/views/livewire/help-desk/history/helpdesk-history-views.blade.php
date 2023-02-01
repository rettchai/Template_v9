
<x-slot name="header">
    ประวัติการแจ้ง Help Desk
</x-slot>


<div class="container-fluid ">
    <div class="card card-body  shadow-blur m-3 ">

        <div class="row">
            <div class="col-md-12">

                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    รายละเอียด
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    สถานที่</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Status
                                </th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($get_helpdesks as $HD)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            {{-- <div>
                                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                                            </div> --}}
                                            {{-- <span class="badge badge-sm bg-gradient-success inline-block align-middle">Online</span> --}}
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">
                                                    @if ($HD->id == 0)
                                                        {{ $HD->OtherName }}
                                                    @else
                                                        {{ $HD->ItemName }}
                                                    @endif
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    {{ $HD->Details }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs text-secondary mb-0">
                                            {{ $HD->Place }}
                                        </p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        {{ $HD->StatusText }}
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        {{-- timeline , chat --}}
                                        <x-button amber sm class="" label="timeline"
                                            wire:click="onClickTimeline({{ $HD->id }})"></x-button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

            @if ($isModelOpen == true)
                @include('livewire.help-desk.history.timeline')
            @endif


        </div>
    </div>
</div>
