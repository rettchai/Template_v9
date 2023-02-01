<div>
    <x-slot name="header">
        Profile
    </x-slot>

    <div class="container-fluid ">

        <div class="card card-body  shadow-blur m-3 ">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        {{-- <img src="{{ auth()->user()->profile_photo_path ?? '../assets/img/bruce-mars.jpg' }}" --}}
                        <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=0D8ABC&color=fff"
                            alt="{{ auth()->user()->name }}" class="w-100 border-radius-lg shadow-sm">
                        {{-- <a href="javascript:;"
                            class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2">
                            <i class="fa fa-pen top-0" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Edit Image"></i>
                        </a> --}}
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ auth()->user()->name }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ auth()->user()->email }}
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">{{ __('Profile Information') }}</h6>
                </div>
                <div class="card-body pt-4 p-3">

                    @if ($showDemoNotification)
                        <div wire:model="showDemoNotification"
                            class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                            <span class="alert-text text-white">
                                {{ __('You are in a demo version, you can\'t update the profile.') }}</span>
                            <button wire:click="$set('showDemoNotification', false)" type="button" class="btn-close"
                                data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    @endif

                    @if (Session::has('message'))
                        <div class="alert alert-warning" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif


                    @if ($showSuccesNotification)
                        <div wire:model="showSuccesNotification"
                            class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                            <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                            <span
                                class="alert-text text-white">{{ __('Your profile information have been successfuly saved!') }}</span>
                            <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close"
                                data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    @endif

                    <form wire:submit.prevent="save" action="#" method="POST" role="form text-left">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-name" class="form-control-label">{{ __('ชื่อในระบบ') }}</label>
                                    <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                        <input readonly wire:model="user.name" class="form-control" type="text"
                                            placeholder="Name" id="user-name">
                                    </div>
                                    @error('user.name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-email" class="form-control-label">{{ __('Email') }}</label>
                                    <div class="@error('user.email')border border-danger rounded-3 @enderror">
                                        <input readonly wire:model="user.email" class="form-control" type="email"
                                            placeholder="@example.com" id="user-email">
                                    </div>
                                    @error('user.email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user.phone" class="form-control-label">{{ __('Phone') }}</label>
                                    <div class="@error('user.phone')border border-danger rounded-3 @enderror">
                                        <input wire:model="user.phone" class="form-control" type="tel"
                                            placeholder="Phone" id="phone">
                                    </div>
                                    @error('user.phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user.FullNameDoc"
                                        class="form-control-label">{{ __('ชื่อสำหรับลงเอกสาร') }}</label>
                                    <div class="@error('user.FullNameDoc') border border-danger rounded-3 @enderror">
                                        <input wire:model="user.FullNameDoc" class="form-control" type="text"
                                            placeholder="ชื่อสำหรับลงเอกสาร" id="FullNameDoc">
                                    </div>
                                    @error('user.FullNameDoc')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user.FacID" class="form-control-label">{{ __('หน่วยงาน') }}</label>
                                    <div class="@error('user.FacID') border border-danger rounded-3 @enderror">

                                        {{-- <input wire:model="user.FacID" class="form-control" type="text"
                                            placeholder="ชื่อสำหรับลงเอกสาร" id="FacID"> --}}

                                        <x-native-select wire:model="user.FacID">
                                            <option value="">กรุณาเลือกหน่วยงาน</option>
                                            @foreach ($ref_facs as $fac)
                                                <option value="{{ $fac->id }}">{{ $fac->FacNameTH }}</option>
                                            @endforeach
                                        </x-native-select>


                                        {{-- <x-select class="border-1" placeholder="หน่วยงาน" wire:model.defer="user.FacID">

                                            <x-select.option label="กรุณาเลือกหน่วยงาน" value="0" />
                                            @foreach ($ref_facs as $fac)
                                                <x-select.option label="{{ $fac->FacNameTH }}"
                                                    value="{{ $fac->id }}" />
                                            @endforeach

                                        </x-select> --}}

                                    </div>
                                    {{-- @error('user.FacID')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror --}}
                                </div>
                            </div>

                        </div>

                        {{-- <div class="form-group">
                            <label for="about">{{ 'About Me' }}</label>
                            <div class="@error('user.about')border border-danger rounded-3 @enderror">
                                <textarea wire:model="user.about" class="form-control" id="about" rows="3"
                                    placeholder="Say something about yourself"></textarea>
                            </div>
                            @error('user.about')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div> --}}

                        <div class="d-flex justify-content-end">
                            <button type="submit"
                                class="btn bg-gradient-dark w-full bg-info btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
