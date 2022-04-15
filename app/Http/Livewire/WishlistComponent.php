<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
class WishlistComponent extends Component
{
    public function removeFromWishlist($rowId)
    {
        Cart::instance('wishlist')->remove($rowId);
        $this->emit('refresh');
    }
    public function addToCart($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price);
        foreach (Cart::instance('wishlist')->content() as $item)
        {
            if ($product_id == $item->id)
            {
                Cart::instance('wishlist')->remove($item->rowId);
                $this->dispatchBrowserEvent('sweetalert',['type'=>'success','message'=>'item has been added to cart successfully']);
                $this->emit('refresh');
                return;
            }
        }
    }
    public function render()
    {
        return view('livewire.wishlist-component')->layout('layouts.base');
    }
}
