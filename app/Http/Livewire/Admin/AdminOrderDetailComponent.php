<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

class AdminOrderDetailComponent extends Component
{
    public $order;

    public function mount(Order $order)
    {
        $this->order = $order;
    }
    public function render()
    {
        $order = $this->order;
        return view('livewire.admin.admin-order-detail-component',compact('order'))->layout('layouts.base');
    }
}
