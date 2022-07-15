<?php

namespace App\Services\Auth;

use App\Models\Customer\Customer;
use App\services\ResponseMessage;

class RegisterCustomer
{
    private $data;
    public function store($request){
        try {
            $this->data = $request->all();
            $this->data['password'] = bcrypt($request['password']);
             Customer::create($this->data);
             return ResponseMessage::successResponse();    
        } catch (\Throwable $th) {
            throw $th;
        }
        
        
    }

}
