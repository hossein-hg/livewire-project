<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminCouponsComponent extends Component
{
    public function delete(Coupon $coupon)
    {
        $coupon->delete();
        $this->dispatchBrowserEvent('sweetalert',['type'=>'success','message'=>'the coupon has been deleted successfully']);
    }
    public function render()
    {
        $coupons = Coupon::all();
        return view('livewire.admin.admin-coupons-component',compact('coupons'))->layout('layouts.base');
    }
}
