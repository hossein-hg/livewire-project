<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminEditCouponComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $coupon;
    public $expiry_date;
    public function mount(Coupon $coupon)
    {
        $this->coupon = $coupon;
        $this->type = $coupon->type;
        $this->code = $coupon->code;
        $this->value = $coupon->value;
        $this->expiry_date = $coupon->expiry_time;
        $this->cart_value = $coupon->cart_value;
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
    public function editCoupon()
    {
        $this->validate();
        $coupon = $this->coupon;
        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->expiry_time = $this->expiry_date;
        $coupon->save();
        $this->dispatchBrowserEvent('sweetalert',['type'=>'success','message'=>'the coupon has been updated successfully']);
    }
    public function render()
    {

        return view('livewire.admin.admin-edit-coupon-component')->layout('layouts.base');
    }
}
