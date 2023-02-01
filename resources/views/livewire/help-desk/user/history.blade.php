<link rel="stylesheet" href="{{ asset('css/timelines.css') }}">
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
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Status
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

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

    <div class="col-md-12">

        <x-modal.card title="Timeline&Chat" blur wire:model.defer="isModelOpen">
            @if (!empty($get_helpdesksDetails))
                <section style="background-color: #F0F2F5;">
                    <div class="container py-5">
                        <div class="main-timeline-2">

                            @foreach ($get_helpdesksDetails as $hdd)
                                @php
                                    $textal = $hdd->created_type == 'user' ? 'right-2 ' : ' left-2';
                                @endphp
                                <div class="timeline-2 {{ $textal }}">
                                    <div class="card">

                                        <div class="card-body p-2">
                                            <h4 class="fw-bold mb-2">
                                                {{ $hdd->DetailStatusText }}
                                            </h4>
                                            <p class="text-muted mb-2"><i class="far fa-clock" aria-hidden="true"></i>
                                                {{ $hdd->created_at }}
                                            </p>
                                            <p class="mb-0">
                                                {{ $hdd->Comments }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </section>

                @if ($hdd->getHelpdesk->StatusText != 'close')
                    <div class="row">
                        <div class="col-md-12">
                            <x-input class="border-2" label="Chat.."></x-input>
                            {{-- {{$hdd->getHelpdesk->StatusText}} --}}
                            <x-button class=" pt-2" primary label="Send" class="w-full"></x-button>
                        </div>
                    </div>
                @endif
            @endif
        </x-modal.card>



    </div>
</div>
