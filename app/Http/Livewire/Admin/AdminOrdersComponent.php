<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class AdminOrdersComponent extends Component
{
    use WithPagination;

    public function updateOrderStatus($order_id,$status)
    {
        $order = Order::query()->find($order_id);

        if ($status == 'delivered')
        {
            $order->status = 'delivered';
            $order->delivered_date = Carbon::now()->format('Y-m-d');
        }

        elseif ($status == 'canceled')
        {

            $order->status = 'canceled';
            $order->canceled_date = Carbon::now()->format('Y-m-d');
        }

        $order->save();
        $this->dispatchBrowserEvent('sweetalert',['type'=>'success','message'=>'Order status has been updated successfully']);
    }
    public function render()
    {
        $orders = Order::query()->latest()->paginate(15);
        return view('livewire.admin.admin-orders-component',compact('orders'))->layout('layouts.base');
    }
}
