<?php

namespace App\Http\Controllers\Api\V1\Authorization;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Customers\StoreCustomer;
use App\Services\CustomerService;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;

class CustomerAuthController extends Controller
{
    private UserService $userService;
    private CustomerService $customerService;

    public function __construct(
        UserService  $userService,
        CustomerService  $customerService
    )
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
        $this->userService = $userService;
        $this->customerService = $customerService;
    }

    public function login(Request  $request): JsonResponse
    {
        $validator = Validator::make($request->all(),
            [
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]
        );

        if($validator->fails()){
            return $this->sendValidateResponse($validator->getMessageBag());
        }

       return $this->userService->login(['email' => $request->email, 'password' => $request->password]);
    }

    /**
     * @param StoreCustomer $request
     * @details: Validate customer data before storing
     * @return JsonResponse
     */
    public function register(StoreCustomer $request): JsonResponse
    {
        $this->customerService->save($request->all());

        return response()->json([
            'message' => 'Registered successfully',
            'status' => Response::HTTP_CREATED,
            'data' => [],
        ], Response::HTTP_CREATED);
    }

    public function details(): JsonResponse
    {
        return $this->sendResponse('Retrieved customer details successfully', [
            'data' => $this->customerService->getDetails(),
            'status' => Response::HTTP_OK
        ]);
    }

    public function getProfile(){
        return $this->sendResponse('Retrieved profile successfully', [
            'data' => $this->customerService->getProfile(),
            'status' => Response::HTTP_OK
        ]);
    }

    public function logout(): JsonResponse
    {
        auth('api')->logout();

        return $this->sendResponse('Logged out successfully', [
            'data' => [],
            'status' => Response::HTTP_OK
        ]);
    }

    /**
     * @param Request $request
     * @details Takes old password and new passwords as parameters, validating and updating password
     * @return JsonResponse
     */
    public function updatePassword(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|min:6',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);

        if($validator->fails()){
            return $this->sendValidateResponse($validator->getMessageBag());
        }

        if(!Hash::check($request->old_password, auth()->user()->password)){
            return $this->sendValidateResponse([
                'old_password' => ['Old password is not correct']
            ]);
        }

        $this->userService->updatePassword($request->all());

        return $this->sendResponse('Password updated successfully', [
            'data' => [],
            'status' => Response::HTTP_OK
        ]);
    }

    public function updateDetails(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|array',
            'city_id' => 'required|numeric'
        ]);

        if($validator->fails()){
            return $this->sendValidateResponse($validator->getMessageBag());
        }

        return $this->sendResponse('Personal details updated successfully', [
            'data' => $this->customerService->updateDetails($request->all()),
            'status' => Response::HTTP_OK
        ]);
    }

    public function delete(){
        $this->customerService->delete();
        return $this->sendResponse('Customer deleted', [
            'data' => [],
            'status' => Response::HTTP_OK
        ]);
    }
}
