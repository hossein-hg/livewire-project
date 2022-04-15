<?php

namespace App\Http\Livewire;
use App\Models\Coupon;
use Cart;
use Illuminate\Support\Carbon;
use Livewire\Component;
use function Symfony\Component\Translation\t;

class CartComponent extends Component
{
    public $code;
    public $haveCode;
    public $codeStatus;
    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;
    public $cart_total;
    public $item_total;
    public function mount()
    {

        foreach (Cart::instance('cart')->content() as $item)
        {
            $this->cart_total += $item->qty * $item->price;
        }
    }

    public function checkout()
    {
        if (auth()->check())
        {
            return redirect()->route('checkout');
        }
        else
        {
            return  redirect()->route('login');
        }
    }

    public function setAmountForCheckout()
    {
        if (session()->has('coupon'))
        {
            session()->put('checkout',[
                'discount'=>$this->discount,
                'subtotal'=>$this->subtotalAfterDiscount,
                'tax'=>$this->taxAfterDiscount,
                'total'=>$this->totalAfterDiscount,
            ]);
        }
        else{
            session()->put('checkout',[
                'discount'=>0,
                'subtotal'=>Cart::instance('cart')->subtotal(),
                'tax'=>Cart::instance('cart')->tax(),
                'total'=>Cart::instance('cart')->total(),
            ]);
        }
    }
    public function removeCoupon()
    {
        session()->forget('coupon');
    }
    public function apply()
    {
        $coupon = Coupon::query()->where('code',$this->code)->where('expiry_time','>',Carbon::parse()->format('Y-m-d h:m:s'))->first();
        if (!$coupon)
        {
            $this->dispatchBrowserEvent('sweetalert',['type'=>'error','message'=>'The code is incorrect']);
            return;
        }
        session()->put('coupon',[
            'code'=>$coupon->code,
            'type'=>$coupon->type,
            'value'=>$coupon->value,
            'cart_value'=>$coupon->cart_value,
        ]);

    }

    public function calculateDiscount()
    {

        if (session()->has('coupon'))
        {
            if (session()->get('coupon')['type'] == 'fixed')
            {
                $this->discount = session('coupon')['value'];
            }
            else
            {
                $this->discount = ($this->cart_total * session('coupon')['value']) / 100;
            }
            $this->subtotalAfterDiscount = $this->cart_total - $this->discount;
            $this->taxAfterDiscount = ($this->subtotalAfterDiscount * config('cart.tax') / 100);
            $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfterDiscount;
        }
    }
    public function increase($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        $qty = $item->qty+1;
        Cart::update($rowId,$qty);
        $this->emit('refresh');
    }

    public function moveToCart($rowId)
    {
        $item = Cart::instance('saveForLater')->get($rowId);
        Cart::instance('saveForLater')->remove($item->rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emit('refresh');
        $this->dispatchBrowserEvent('sweetalert',['type'=>'success','message'=>'product has been added to cart Successfully']);
    }
    public function switchToSaveForLater($rowId)
    {

        $item = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($item->rowId);
        Cart::instance('saveForLater')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emit('refresh');
        $this->dispatchBrowserEvent('sweetalert',['type'=>'success','message'=>'product has been added to saveForLater Successfully']);
    }
    public function decrease($rowId)
    {
        $item = Cart::instance('cart')->get($rowId);
        if ($item->qty > 0)
        {
            $qty = $item->qty-1;
            Cart::update($rowId,$qty);
            $this->emit('refresh');
        }

    }

    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->dispatchBrowserEvent('sweetalert',['type'=>'success','message'=>'the item has been removed from cart successfully']);
        $this->emit('refresh');
    }

    public function destroySave($rowId)
    {
        Cart::instance('saveForLater')->remove($rowId);
        $this->dispatchBrowserEvent('sweetalert',['type'=>'success','message'=>'the item has been removed from saveForLater successfully']);
    }
    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
        $this->dispatchBrowserEvent('sweetalert',['type'=>'success','message'=>'the cart has been removed  successfully']);
    }
    public function render()
    {
        if (session()->has('coupon'))
        {
            $this->calculateDiscount();
        }


        $this->setAmountForCheckout();
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
