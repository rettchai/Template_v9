 <x-slot name="header">
     Dashboard
 </x-slot>

 {{-- <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg "> --}}
 <main class="h-100 border-radius-lg ">
     @if ($isModelOpen and $isPages == 'popup-create-donate')
         @include('Livewire.dashboards.popup-create-donate')
     @endif
     <div class="container-fluid py-4">
         <div class="row">
             <x-dialog z-index="z-50" blur="md" align="center" />
             {{-- <x-button icon="pencil" info label="Primary" /> --}}
             @include('livewire.dashboards.card-alert')
         </div>
         <div>
             @if (session()->has('message') or session()->has('error_message'))
                 <div class="row p-2">
                     <div class="card">
                         <div class="card-header">
                             @if (session()->has('message'))
                                 <x-components.alert.info>
                                     <x-slot name="text">
                                         {{ session('message') }}
                                     </x-slot>
                                 </x-components.alert.info>
                             @endif
                             @if (session()->has('error_message'))
                                 <x-components.alert.error>
                                     <x-slot name="text">
                                         {{ session('error_message') }}
                                     </x-slot>
                                 </x-components.alert.error>
                             @endif
                         </div>
                     </div>
                 </div>
             @endif
         </div>
         <div class="row my-4">
             <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
                 <div class="card">
                     <div class="card-header pb-0">
                         <div class="row">
                             <div class="col-lg-6 col-7">
                                 <h6>Receipt</h6>
                                 <p class="text-sm mb-0">
                                     <i class="fa fa-check text-info" aria-hidden="true"></i>
                                     <span class="font-weight-bold ms-1">All Time
                                         <span wire:loading wire:target="onClickCreateDonate"> loading.....</span>
                                     </span>
                                 </p>
                             </div>
                             <div class="col-lg-6 col-5 my-auto text-end">
                                 <button wire:click="onClickCreateDonate()" class="btn btn-info">Create Donate</button>
                             </div>
                         </div>
                     </div>
                     <div class="card-body px-0 pb-2">
                         @include('livewire.dashboards.table' , ['TableDonates' => $TableDonates] )
                     </div>
                 </div>
             </div>
             <div class="col-lg-4 col-md-6">
                 @include('livewire.dashboards.receipt-card')
                 {{-- <div class="card min-h-50 my-2">
                     @include('livewire.dashboards.newest-card')
                 </div> --}}
             </div>



         </div>
     </div>
 </main>
