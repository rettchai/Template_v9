<x-layouts.base>
    {{-- If the user is authenticated --}}
    @auth()
        {{-- If the user is authenticated on the static sign up or the sign up page --}}
        @if (in_array(request()->route()->getName(),
            ['sign-in', 'login']))
            @include('layouts.navbars.guest.login')
            {{ $slot }}
            @include('layouts.footers.guest.description')
        @elseif (in_array(request()->route()->getName(),
            ['profile', 'my-profile']))
            @include('layouts.navbars.auth.sidebar')
            <div class="main-content position-relative bg-gray-100">
                @include('layouts.navbars.auth.nav-profile')
                <div>
                    {{ $slot }}
                    @include('layouts.footers.auth.footer')
                </div>
            </div>
            {{-- @include('components.plugins.fixed-plugin') --}}
        @else
            @include('layouts.navbars.auth.sidebar')
            @include('layouts.navbars.auth.nav')
            {{-- @include('components.plugins.fixed-plugin') --}}

            @if (isset($header))
                <header class="container-fluid mb-n7">
                    <div class="page-header min-height-200 border-radius-xl mt-4"
                        style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
                        <span class="mask  opacity-6">
                            <h2 class="text-lg text-center bg-white p-3 mt-5 mx-3 rounded-lg text-red-700">{{$header}}</h2>
                        </span>
                    </div>
                </header>
            @endif

            {{ $slot }}
            <main>
                <div class="container-fluid">
                    <div class="row">
                        @include('layouts.footers.auth.footer')
                    </div>
                </div>
            </main>
        @endif
    @endauth

    {{-- If the user is not authenticated (if the user is a guest) --}}
    @guest
        {{-- If the user is on the login page --}}
        @if (!auth()->check() &&
            in_array(request()->route()->getName(),
                ['login']))
            @include('layouts.navbars.guest.login')
            {{ $slot }}
            <div class="mt-5">
                @include('layouts.footers.guest.with-socials')
            </div>

            {{-- If the user is on the sign up page --}}
        @elseif (!auth()->check() &&
            in_array(request()->route()->getName(),
                ['sign-up']))
            <div>
                @include('layouts.navbars.guest.sign-up')
                {{ $slot }}
                @include('layouts.footers.guest.with-socials')
            </div>
        @endif
    @endguest

</x-layouts.base>
