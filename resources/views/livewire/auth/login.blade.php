<section>
    <div class="page-header section-height-75">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                    <div class="card card-plain mt-8">

                        <div class="card-body blur-shadow">
                            <x-card>


                                <div class="card-body">
                                    <form wire:submit.prevent="login" action="#" method="POST"
                                        role="form text-left">
                                        <div class="mb-3">
                                            <label for="username">{{ __('username') }}</label>
                                            <div class="@error('username')border border-danger rounded-3 @enderror">
                                                <input wire:model="username" id="email" type="text"
                                                    class="form-control" placeholder="username" aria-label="username"
                                                    aria-describedby="email-addon">
                                            </div>
                                            @error('username')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="password">{{ __('Password') }}</label>
                                            <div class="@error('password')border border-danger rounded-3 @enderror">
                                                <input wire:model="password" id="password" type="password"
                                                    class="form-control" placeholder="Password" aria-label="Password"
                                                    aria-describedby="password-addon">
                                            </div>
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-check form-switch">
                                            <input wire:model="remember_me" class="form-check-input" type="checkbox"
                                                id="rememberMe">
                                            <label class="form-check-label"
                                                for="rememberMe">{{ __('Remember me') }}</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn bg-info w-100 mt-4 mb-0">{{ __('Sign in') }}</button>
                                        </div>
                                    </form>
                                </div>

                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-bolder text-info text-gradient text-center">
                                        {{ __('Welcome') }}</h3>
                                    <p class="mb-0 text-center">{{ __('Create a new acount') }}<br></p>
                                    <p class="mb-0 text-center">{{ __('OR Sign in with Social Media') }}</p>
                                </div>

                                <a type="button" href="{{ route('google-login') }}"
                                    class="btn bg-gradient-danger bg-danger w-100 mt-4 mb-0">
                                    <i class="fa-brands fa-google fa-xl"></i>
                                    &nbsp;&nbsp;Sign in with Google
                                </a>

                                <a type="button" href="{{ route('facebook-login') }}"
                                    class="btn bg-gradient-info bg-info w-100 mt-4 mb-0">
                                    <i class="fa-brands fa-facebook fa-xl"></i>
                                    &nbsp;&nbsp;
                                    Sign in with Facebook
                                </a>
                            </x-card>


                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                        <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                            style="background-image:url('../assets/img/curved-images/curved6.jpg')"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
