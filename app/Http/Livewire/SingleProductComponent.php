<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;
use Cart;
class SingleProductComponent extends Component
{
    public $quantity;
    public $product;
    public function mount(Product $product)
    {
//        dd(session()->get('cart'));
        $this->quantity = 1;
        $this->product = $product;
    }

    public function increase()
    {
        $this->quantity += 1;
    }
    public function decrease()
    {
        $this->quantity -= 1;
    }
    public function addToWishlist($product_id,$product_name,$product_price)
    {
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->dispatchBrowserEvent('sweetalert',['type'=>'success','message'=>'the product has been added to wishlist successfully']);
        $this->emit('refresh');
    }

    public function removeFromWishlist($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $item)
        {
            if ($product_id == $item->id)
            {
                Cart::instance('wishlist')->remove($item->rowId);
                $this->emit('refresh');
                $this->dispatchBrowserEvent('sweetalert',['type'=>'success','message'=>'the product has been remove from wishlist successfully']);
            }
        }
    }
    public function addToCart($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,$this->quantity,$product_price)->associate('App\Models\Product');
        $this->dispatchBrowserEvent('sweetalert',['type'=>'success','message'=>'the product has been added to cart successfully']);
        $this->emit('refresh');
    }
    public function render()
    {
        $product = $this->product;
        $sale = Sale::query()->find(1);
        return view('livewire.single-product-component',compact(['product','sale']))->layout('layouts.base');
    }
}
