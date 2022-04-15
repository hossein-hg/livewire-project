<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
class ShopComponent extends Component
{
    public $min_price;
    public $max_price;
    public $pageSize;
    public $sorting;
    use WithPagination;

    public function mount()
    {
//        dd(session()->get('cart'));
        $this->max_price = 1000;
        $this->min_price = 1;
        $this->pageSize = 12;
        $this->sorting = 'default';
    }

    public function removeFromWishlist($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $item)
        {
            if ($item->id == $product_id)
            {
                Cart::instance('wishlist')->remove($item->rowId);
                $this->dispatchBrowserEvent('sweetalert',['type'=>'success','message'=>'the product has been deleted from wishlist successfully']);
                $this->emit('refresh');
            }
        }
    }
    public function addToWishlist($product_id,$product_name,$product_price)
    {
//        dd($product_id,$product_name,$product_price);
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->dispatchBrowserEvent('sweetalert',['type'=>'success','message'=>'the product has been added to wishlist successfully']);
        $this->emit('refresh');
    }
    public function addToCart($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->dispatchBrowserEvent('sweetalert',['type'=>'success','message'=>'محصول با موفقیت به سبد خرید اضافه شد']);
        $this->emit('refresh');

    }
    public function render()
    {
        if ($this->sorting == 'date')
        {
            $products = Product::query()->orderBy('created_at','DESC')->whereBetween('regular_price',[$this->min_price,$this->max_price])->paginate($this->pageSize);
        }
        elseif ($this->sorting == 'price')
        {
            $products = Product::query()->orderBy('regular_price','ASC')->whereBetween('regular_price',[$this->min_price,$this->max_price])->paginate($this->pageSize);
        }
        elseif ($this->sorting == 'price-desc')
        {
            $products = Product::query()->orderBy('regular_price','DESC')->whereBetween('regular_price',[$this->min_price,$this->max_price])->paginate($this->pageSize);
        }
        else{
            $products = Product::query()->whereBetween('regular_price',[$this->min_price,$this->max_price])->paginate($this->pageSize);
        }
        $categories = Category::query()->latest()->get();
        return view('livewire.shop-component',compact(['products','categories']))->layout('layouts.base');
    }
}
