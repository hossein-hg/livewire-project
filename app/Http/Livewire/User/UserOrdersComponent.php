<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Livewire\Component;

class UserOrdersComponent extends Component
{

    public function render()
    {
        $orders = Order::query()->where('user_id',auth()->id())->get();

        return view('livewire.user.user-orders-component',compact('orders'))->layout('layouts.base');
    }
}
