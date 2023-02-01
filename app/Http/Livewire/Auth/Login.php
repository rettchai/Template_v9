<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use App\Models\Permissions;
use App\Models\RefPermissions;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email = '';
    public $username = '';
    public $password = '';
    public $remember_me = false;

    protected $rules = [
        'username' => 'required',
        'password' => 'required',
    ];

    public function mount()
    {
        // dd(auth()->user());

        if (auth()->user()) {
            redirect('/dashboard');
        }
        $this->fill(['username' => 'automail', 'password' => 'itsc2241']);
    }

    public function login()
    {
        // dd($this);
        $credentials = $this->validate();

        // if (Auth::attempt($credentials)) {
        // Authentication passed...
        // return redirect()->intended('dashboard');
        // }

        $validated = Auth::validate([
                        'samaccountname' => $this->username,
                        'password' => $this->password
                    ]);
        // dd($validated);
        $validated ? Auth::getLastAttempted() : null;

        if ($validated) {
            // dd(Auth::getLastAttempted()->id );
            Auth::loginUsingId(Auth::getLastAttempted()->id);
            // Auth::attempt($credentials);

            $users = auth()->user();
            if ($users) {
            $refpermissions = RefPermissions::all();
            foreach ($refpermissions as $row) {
                $chk_admin = Permissions::join('users', 'users.id', '=', 'permissions.user_id')
                ->where([
                    ['users.id',$users->id],
                    ['permissions.permission',$row->id],
                    ['permissions.active',true],
                ])->first();

                if ($chk_admin) {
                    Auth::guard($row->permission_en)->login($users);
                };
            }
            }


            return redirect()->intended('/dashboard');
        }


        //  $validated ? Auth::getLastAttempted() : null;

        // if (auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember_me)) {
        //     $user = User::where(["email" => $this->email])->first();
        //     auth()->login($user, $this->remember_me);
        //     return redirect()->intended('/dashboard');
        // } else {
        //     return $this->addError('email', trans('auth.failed'));
        // }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
