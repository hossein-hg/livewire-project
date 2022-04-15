<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Livewire\Component;
use Cart;
class CheckoutComponent extends Component
{
    public $firstName;
    public $lastName;
    public $city;
    public $country;
    public $province;
    public $line1;
    public $line2;
    public $email;
    public $mobile;
    public $zipcode;

    public $s_firstName;
    public $s_lastName;
    public $s_city;
    public $s_country;
    public $s_province;
    public $s_line1;
    public $s_line2;
    public $s_email;
    public $s_mobile;
    public $s_zipcode;

    public $paymentMode;
    public $cvc;

    public $ship_to_different;
    public $tankYou;
    public function mount()
    {
        $this->verifyCheckout();

        $this->ship_to_different = false;

    }

    public function verifyCheckout()
    {
        if ( $this->tankYou== 1)
        {
            return redirect()->route('thankYou');
        }
        elseif (!session()->has('checkout') or session()->get('checkout')['total'] == 0)
        {
            return redirect()->route('cart');
        }
    }
    public function rules()
    {
        return [
            'firstName'=>'required',
            'lastName'=>'required',
            'city'=>'required',
            'country'=>'required',
            'province'=>'required',
            'line1'=>'required',
            'line2'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'zipcode'=>'required',
            'paymentMode'=>'required',
        ];
    }
    public function submitForm()
    {
        $this->validate();
        $order = new Order();
        $order->firstName = $this->firstName;
        $order->lastName = $this->lastName;
        $order->city = $this->city;
        $order->province = $this->province;
        $order->country = $this->country;
        $order->line1 = $this->line1;
        $order->line2 = $this->line2;
        $order->zipcode = $this->zipcode;
        $order->mobile = $this->mobile;
        $order->email = $this->email;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->total = session()->get('checkout')['total'];
        $order->discount = session()->get('checkout')['discount'];
        $order->tax = session()->get('checkout')['tax'];
        $order->user_id = auth()->id();
        $order->firstName = $this->firstName;
        $order->firstName = $this->firstName;
        $order->firstName = $this->firstName;
        $order->save();
        foreach (Cart::instance('cart')->content() as $item)
        {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }
        if ($this->ship_to_different) {
            $this->validate([
                's_firstName' => 'required',
                's_lastName' => 'required',
                's_city' => 'required',
                's_country' => 'required',
                's_province' => 'required',
                's_line1' => 'required',
                's_line2' => 'required',
                's_email' => 'required',
                's_mobile' => 'required',
                's_zipcode' => 'required',
            ]);
            $shipping = new Shipping();
            $shipping->firstName = $this->s_firstName;
            $shipping->lastName = $this->s_lastName;
            $shipping->city = $this->s_city;
            $shipping->province = $this->s_province;
            $shipping->country = $this->s_country;
            $shipping->line1 = $this->s_line1;
            $shipping->line2 = $this->s_line2;
            $shipping->zipcode = $this->s_zipcode;
            $shipping->mobile = $this->s_mobile;
            $shipping->email = $this->s_email;
            $shipping->order_id = $order->id;
            $shipping->save();
            $order->is_shipping_different = true;
            $order->save();
        }
            if ($this->paymentMode == 'cod')
            {
                $transaction = new Transaction();
                $transaction->order_id = $order->id;
                $transaction->user_id = auth()->id();
                $transaction->mode = 'cod';
                $transaction->status = 'pending';
                $transaction->save();
            }
            $this->tankYou = 1;
            Cart::instance('cart')->destroy();
            session()->forget('checkout');


    }


    public function dehydrate()
    {
        $this->verifyCheckout();
    }
    public function render()
    {

        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
