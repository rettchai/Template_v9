<div>

    <span class="d-sm-inline  {{ in_array(request()->route()->getName(),['profile', 'my-profile']) ? 'text-white' : '' }}" wire:click="logout">
        Sign Out
    </span>
    <i class="fa fa-logout "></i>
</div>
