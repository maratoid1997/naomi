<?php


namespace App\Services;


use App\Models\User;
use App\Repositories\CustomerRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UserService
{
    private UserRepository $userRepository;
    private CustomerRepository $customerRepository;

    public function __construct(
        UserRepository  $userRepository,
        CustomerRepository $customerRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->customerRepository = $customerRepository;
    }

    /**
     * @param $credentials
     * @return JsonResponse
     */
    public function login($credentials): JsonResponse
    {
        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json([
                'message' => 'Login failed',
                'status' => Response::HTTP_UNAUTHORIZED,
                'statusCode'=> config('statuses.unauthorized'),
                'error' => 'Unauthorized'

            ], Response::HTTP_UNAUTHORIZED);
        }


        return $this->respondWithToken($token, User::LOGIN_TYPE_LOCAL);
    }


    public function refreshToken(): JsonResponse
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    public function logout(): JsonResponse
    {
        auth('api')->logout();
        return response()->json([
            'message' => 'Logged out successfully',
            'status' => Response::HTTP_OK,
            'statusCode' => config('statuses.ok'),
            'data' => []
        ]);
    }

    /**
     * @param $token
     * @return JsonResponse
     */
    public function respondWithToken($token, $type): JsonResponse
    {
        return response()->json([
            'message' => 'Logged in successfully',
            'status' => Response::HTTP_OK,
            'data' => [
                'access_token' => $token,
                'type' => $type,
                'token_type' => 'Bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 60
            ]
        ]);
    }

    public function updatePassword($credentials){
        return $this->userRepository->updatePassword(auth('api')->user()->id, $credentials);
    }

    public function loginSocial($userData){
        $loggedUser = $this->userRepository->findByEmail($userData->user['email']);
        if (!$loggedUser){
            $loggedUser = $this->userRepository->save(null, [
                'email' => $userData->getEmail(),
                'login_type' => User::LOGIN_TYPE_SOCIAL
            ]);

            $this->customerRepository->save(null, [
                'user_id' => $loggedUser->id,
                'fullname' => $userData->getName(),
                "phone" => "",
            ]);
        }

        return $token = auth('api')->fromUser($loggedUser);

//        return $this->respondWithToken(auth('api')->fromUser($loggedUser), User::LOGIN_TYPE_SOCIAL);
    }
}
