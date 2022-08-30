<?php

namespace App\Http\Controllers\Api\V1\Authorization;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RecoveryController extends Controller
{
    public function __construct()
    {

    }

    public function emptyMethod() {
        // Go to Nuxt
    }

    public function forgotPassword(Request $request): JsonResponse
    {
        $validator = Validator::make($request->only('email'), [
            'email' => 'required|email'
        ]);

        if($validator->fails()) return $this->sendValidateResponse($validator->getMessageBag());

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT ? $this->sendResponse('', [
            'data' => $status,
            'status' => Response::HTTP_OK
        ]) : $this->sendValidateResponse(['email' => __($status)]);
    }

    public function resetPassword(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        if($validator->fails()) return $this->sendValidateResponse($validator->getMessageBag());

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();

                $user->setRememberToken(Str::random(60));

                event(new PasswordReset($user));
            }
        );

        return $status == Password::PASSWORD_RESET ? $this->sendResponse('Password successfully reset', [
            'data' => [],
            'status' => Response::HTTP_OK
        ])
            :  $this->sendValidateResponse(['email' => [__($status)]]);
    }
}
