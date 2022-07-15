<?php

namespace App\Http\Controllers\Employee\Order;

use Illuminate\Http\Request;
use App\services\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Models\Employee\Order\Discount;

class DiscountTController extends Controller
{

    public function show(Discount $discount){
        return $discount;
    }
    public function store(Request $request)
    {
        $validated= $request->validate($this->rules());
        Discount::create($validated);
        return ResponseMessage::successResponse();
    }
    public function update(Request $request,Discount $discount){
        $validated= $request->validate($this->rules());
        $discount->update($validated);
        return ResponseMessage::successResponse();
    }
    public function destroy(Discount $discount)
    {
        $discount->delete();
        return ResponseMessage::successResponse();
    }
    private function rules()
    {
        return [
            'name'=>['nullable','string'],
            'description'=>['nullable','string'],
            'percent'=>['numeric','string'],
            'status'=> ["required","in:active,inactive"],
        ];
    }
}
