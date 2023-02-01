<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    //
    public function getredirect(Request $request)
    {
        return Socialite::driver('google')->redirect();
    }

    public function getcallback(Request $request)
    {
        $user = Socialite::driver('google')->user();
        $users = User::updateOrCreate([
                'auth_id' => $user->id,
                'auth_type' => "google"
            ], [
                'auth_type' => "google",
                'auth_id' => $user->id,
                'password' => "nothave",
                'name' => $user->name,
                'email' => $user->email,
                'token' => $user->token,
                'refresh_token' => $user->refreshToken,
                'profile_photo_path' => $user->avatar,
                'active' => "1",
                'username' => $user->email,
            ]);

        Auth::login($users);


        // if ($users) {
        //     $refpermissions = RefPermissions::all();
        //     foreach ($refpermissions as $row) {
        //         $chk_admin = Permissions::join('users', 'users.id', '=', 'permissions.user_id')
        //         ->where([
        //             ['users.id',$users->id],
        //             ['permissions.permission',$row->id],
        //             ['permissions.active','1'],
        //         ])->first();

        //         if ($chk_admin) {
        //             Auth::guard($row->permission_en)->login($users);
        //         };
        //     }
        // }


        // return redirect('/users');
        return redirect('/dashboard');
        // return redirect('/conference');
        // return redirect(route("home"));


        // echo $user->token;
        // dd($user);
    }
}
