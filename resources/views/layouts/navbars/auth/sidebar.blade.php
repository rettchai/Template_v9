<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-2 border-radius-xl my-3 fixed-start ms-3"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ route('dashboard') }}">
            <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="...">
            <span class="ms-3 font-weight-bold">Donate RMUTR</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    {{-- <livewire:auth.logout /> --}}
    <div class=" navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item pb-2">
                <h5 class="nav-link-text ms-1">User</h5>
                </a>
            </li>
            <li class="nav-item pb-2">
                <a class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}"
                    href="{{ route('dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        @
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'user-profile' ? 'active' : '' }}"
                    href="{{ route('user-profile') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <span class="nav-link-text ms-1">User Profile</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'booking-rooms' ? 'active' : '' }}"
                    href="{{ route('booking-rooms') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        @
                    </div>
                    <span class="nav-link-text ms-1">จองห้อง</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'booking-items' ? 'active' : '' }}"
                    href="{{ route('booking-items') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        @
                    </div>
                    <span class="nav-link-text ms-1">ยืมอุปกรณ์</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'helpdesk' ? 'active' : '' }}"
                    href="{{ route('helpdesk') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        @
                    </div>
                    <span class="nav-link-text ms-1">Help Desk</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'helpdesk-history' ? 'active' : '' }}"
                    href="{{ route('helpdesk-history') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        @
                    </div>
                    <span class="nav-link-text ms-1">ประวัติ Help Desk</span>
                </a>
            </li>


            {{-- staff --}}
            @auth('staff')
                <li class="nav-item pb-2">
                    <h5 class="nav-link-text ms-1">Staff</h5>
                    </a>
                </li>
                <li class="nav-item pb-2">
                    <a class="nav-link {{ Route::currentRouteName() == 'staff-items' ? 'active' : '' }}"
                        href="{{ route('staff-items') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            @
                        </div>
                        <span class="nav-link-text ms-1">เพิ่มห้อง/อุปกรณ์</span>
                    </a>
                </li>

                <li class="nav-item pb-2">
                    <a class="nav-link {{ Route::currentRouteName() == 'staff-approves' ? 'active' : '' }}"
                        href="{{ route('staff-approves') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            @
                        </div>
                        <span class="nav-link-text ms-1">Approves</span>
                    </a>
                </li>

                <li class="nav-item pb-2">
                    <a class="nav-link {{ Route::currentRouteName() == 'staff-helpdesk' ? 'active' : '' }}"
                        href="{{ route('staff-helpdesk') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            @
                        </div>
                        <span class="nav-link-text ms-1">Helpdesk</span>
                    </a>
                </li>
            @endauth

            @auth('admin')
                {{-- admin --}}
                <li class="nav-item pb-2">
                    <h5 class="nav-link-text ms-1">Admin</h5>
                    </a>
                </li>
                <li class="nav-item pb-2">
                    <a class="nav-link {{ Route::currentRouteName() == 'admin-permission' ? 'active' : '' }}"
                        href="{{ route('admin-permission') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            @
                        </div>
                        <span class="nav-link-text ms-1">กำหนดสิทธิ์</span>
                    </a>
                </li>
                <li class="nav-item pb-2">
                    <a class="nav-link {{ Route::currentRouteName() == 'admin-addedituser' ? 'active' : '' }}"
                        href="{{ route('admin-addedituser') }}">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            @
                        </div>
                        <span class="nav-link-text ms-1">กำหนดผู้ดูแล</span>
                    </a>
                </li>
            @endauth

            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'logout' ? 'active' : '' }}" href="#"
                    wire:click="logout">
                    <div
                        class="fa-solid fa-right-from-bracket mr-2  icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <div>
                            {{-- <i class="fa-solid fa-user"></i> --}}

                        </div>
                    </div>
                    <span class="d-sm-inline " wire:click="logout">
                        <livewire:auth.logout />
                    </span>
                    {{-- <i class="fa-solid fa-right-from-bracket"></i> --}}
                </a>
            </li>

        </ul>
    </div>
</aside>
