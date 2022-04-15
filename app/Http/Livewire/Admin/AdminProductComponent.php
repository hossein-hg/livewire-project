<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;
    public function delete(Product $product)
    {
        $product->delete();
        $this->dispatchBrowserEvent('sweetalert',['type'=>'success','message'=>'the product has been deleted successfully']);
    }
    public function render()
    {
        $products = Product::query()->latest()->paginate(10);
        return view('livewire.admin.admin-product-component',compact('products'))->layout('layouts.base');
    }
}
