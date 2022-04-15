<?php

namespace App\Http\Livewire\Admin;

use App\Models\Sale;
use Livewire\Component;

class AdminSaleComponent extends Component
{
    public $status;
    public $sale_date;

    public function mount()
    {
        $sale_date = Sale::query()->find(1);
        $this->status = $sale_date->status;
        $this->sale_date = $sale_date->sale_date;
    }
    public function update()
    {
        $sale_date = Sale::query()->find(1);
        $sale_date->status = $this->status;
        $sale_date->sale_date = $this->sale_date;
        $sale_date->save();
        $this->dispatchBrowserEvent('sweetalert',['type'=>'success','message'=>'sale date has been updated successfully']);
    }
    public function render()
    {

        return view('livewire.admin.admin-sale-component')->layout('layouts.base');
    }
}
