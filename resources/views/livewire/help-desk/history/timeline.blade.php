<link rel="stylesheet" href="{{ asset('css/timelines.css') }}">
<div class="col-md-12">

    <x-modal.card title="Timeline&Chat" blur wire:model.defer="isModelOpen">
        @if (!empty($get_helpdesksDetails))
            <div class="overflow-auto" style="background-color: #F0F2F5; height: 500px;flex-direction: column-reverse;">
                <section  style="background-color: #F0F2F5;">
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
            </div>

            @if ($hdd->getHelpdesk->StatusText != 'close')
                <div class="row">
                    <div class="col-md-12">
                        <x-input wire:model="Comments" class="border-2" label="Chat.."  wire:keydown.enter="onClickChat()"></x-input>
                        <x-button class=" pt-2" primary label="Send" class="w-full" wire:click="onClickChat()">
                        </x-button>
                    </div>
                </div>
            @endif
        @endif
    </x-modal.card>

</div>
