<?php


namespace App\Services;

use App\Repositories\CustomerRepository;
use App\Repositories\UserRepository;
use App\Http\Resources\V1\Customers\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class CustomerService
{
    private CustomerRepository $customerRepository;
    private UserRepository $userRepository;

    public function __construct(
        CustomerRepository  $customerRepository,
        UserRepository  $userRepository
    )
    {
        $this->customerRepository = $customerRepository;
        $this->userRepository = $userRepository;
    }

    public function save($credentials)
    {
        $customer = $this->customerRepository->save(null, [
                            'fullname' => $credentials['fullname'],
                            'phone' => $credentials['phone'],
                            'gender' => $credentials['gender'],
                            'user_id' => $this->userRepository->save(null,[
                                'email' => $credentials['email'],
                                'password' => Hash::make($credentials['password']),
                            ])->id
                        ]);

        if(isset($credentials['address'])){
            $addresses = [];

            foreach ($credentials['address'] as $address) {
                $addresses[] = [
                    'customer_id' => $customer->id,
                    'address' => $address,
                    'city_id' => $credentials['city_id'],
                ];
            }

            $this->customerRepository->createCustomerAddresses($customer->id, $addresses);
        }

        return $this->customerRepository->getDetails($customer->id);
    }

    public function getDetails(){
        $customerId = auth('api')->user()->customer->id;

        return Cache::rememberForever('customer.'.$customerId.'.details',function () use ($customerId){
            return new Customer($this->customerRepository->getDetails($customerId));
        });
    }

    public function getProfile(){
        return
            [
                [
                    'text' => __('nav.homepage'),
                    'to' => '/'
                ],
                [
                    'text' => __('nav.myCabinet'),
                    'to' => '/cabinet'
                ],
            ];
    }

    public function updateDetails($credentials){
        $customerId = auth('api')->user()->customer->id;
        Cache::forget('customer.'.$customerId.'.details');

        $customer = $this->customerRepository->save($customerId, [
            'fullname' => $credentials['fullname'],
            'phone' => $credentials['phone'],
            'address' => $credentials['address'],
        ]);

        if(isset($credentials['address'])){
            $addresses = [];

            foreach ($credentials['address'] as $address) {
                $addresses[] = [
                    'customer_id' => $customer->id,
                    'address' => $address['value'],
                    'city_id' => $credentials['city_id'],
                ];
            }

            $this->customerRepository->createCustomerAddresses($customer->id, $addresses);
        }

        return new Customer($customer);
    }

    public function delete(){
        return $this->customerRepository->delete(auth()->user()->customer->id);
    }
}
