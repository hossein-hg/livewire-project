<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminAddCouponComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expiry_date;
    public function mount()
    {
        $this->type = 'percent';
    }
    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function rules()
    {
        return [
            'code'=>'required',
            'type'=>'required',
            'value'=>'required',
            'cart_value'=>'required',
        ];
    }
    public function addCoupon()
    {
        $this->validate();
        $coupon = new Coupon();
        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->expiry_time = $this->expiry_date;
        $coupon->save();
        $this->dispatchBrowserEvent('sweetalert',['type'=>'success','message'=>'the coupon has been added successfully']);
    }
    public function render()
    {
        return view('livewire.admin.admin-add-coupon-component')->layout('layouts.base');
    }
}
