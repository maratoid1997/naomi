<?php


namespace App\Http\Controllers\Api\V1\Authorization;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    private UserService $userService;

    public function __construct(
        UserService  $userService
    )
    {
        $this->userService = $userService;
    }

    public function handleGetUserFacebook(){
        $providerUser = Socialite::driver('facebook')->stateless()->user();
        $token = $this->userService->loginSocial($providerUser);
        if ($token) {
            return redirect(env('APP_URL') . '?access_token=' . $token);
        } else {
            return redirect('/');
        }
    }

    public function handleGetUserFromGoogle(){
       // $userData = Socialite::driver('google')->userFromToken(request()->get('access_token'));

        $providerUser = Socialite::driver('google')->stateless()->user();
        $token = $this->userService->loginSocial($providerUser);
        if ($token) {
            return redirect(env('APP_URL') . '?access_token=' . $token);
        } else {
            return redirect('/');
        }
    }

    public function backHandleGetUserFacebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function backHandleGetUserFromGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
}
