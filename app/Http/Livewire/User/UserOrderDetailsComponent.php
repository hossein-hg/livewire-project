<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Carbon\Carbon;
use Livewire\Component;

class UserOrderDetailsComponent extends Component
{
    public $order;
    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function cancelOrderStatus()
    {
        $this->order->status = 'canceled';
        $this->order->canceled_date = Carbon::now()->format('Y-m-d');
        $this->order->save();
        $this->dispatchBrowserEvent('sweetalert',['type'=>'success','message'=>'Order status has been updated successfully']);
    }
    public function render()
    {
        $order = $this->order;
        return view('livewire.user.user-order-details-component',compact('order'))->layout('layouts.base');
    }
}
