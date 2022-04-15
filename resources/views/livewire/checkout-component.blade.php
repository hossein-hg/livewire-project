<main id="main" class="main-site">

    <div class="container">
        @if(\Illuminate\Support\Facades\Session::has('success_message'))
            <div class="alert alert-success"><strong>Success </strong>{{\Illuminate\Support\Facades\Session::get('success_message')}}</div>
        @endif
        @if(\Illuminate\Support\Facades\Session::has('stripe_error'))
            <div class="alert alert-danger"><strong>Error </strong>{{\Illuminate\Support\Facades\Session::get('stripe_error')}}</div>
        @endif
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Checkout</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            <form wire:submit.prevent="submitForm()" onsubmit="$('#processing').show();">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wrap-address-billing">
                            <h3 class="box-title">Billing Address</h3>
                            <div class="billing-address">
                                <p class="row-in-form">
                                    <label for="fname">first name<span>*</span></label>
                                    <input wire:model="firstName" type="text" name="fname" value="" placeholder="Your name">
                                    @error('firstName')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="lname">last name<span>*</span></label>
                                    <input wire:model="lastName" type="text" name="lname" value="" placeholder="Your last name">
                                    @error('lastName')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="email">Email Addreess:</label>
                                    <input wire:model="email" type="email" name="email" value="" placeholder="Type your email">
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">Phone number<span>*</span></label>
                                    <input wire:model="mobile" type="number" name="phone" value="" placeholder="10 digits format">
                                    @error('mobile')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Line1:</label>
                                    <input wire:model="line1" type="text" name="add" value="" placeholder="Street at apartment number">
                                    @error('line1')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Line2:</label>
                                    <input wire:model="line2" type="text" name="add" value="" placeholder="Street at apartment number">
                                    @error('line2')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="country">Country<span>*</span></label>
                                    <input wire:model="country" id="country" type="text" name="country" value="" placeholder="United States">
                                    @error('country')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="country">Province<span>*</span></label>
                                    <input wire:model="province" id="country" type="text" name="country" value="" placeholder="United States">
                                    @error('province')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="zip-code">Postcode / ZIP:</label>
                                    <input wire:model="zipcode" type="number" name="zip-code" value="" placeholder="Your postal code">
                                    @error('zipcode')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Town / City<span>*</span></label>
                                    <input wire:model="city" type="text" name="city" value="" placeholder="City name">
                                    @error('city')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </p>
                                <p class="row-in-form fill-wife">

                                    <label class="checkbox-field">
                                        <input name="different-add" id="different-add" value="forever" type="checkbox" wire:model="ship_to_different">
                                        <span>Ship to a different address?</span>
                                    </label>
                                </p>
                            </div>
                        </div>
                    </div>
                    @if($ship_to_different)
                        <div class="col-md-12">
                            <div class="wrap-address-billing">
                                <h3 class="box-title">Shipping Address</h3>
                                <div class="billing-address">
                                    <p class="row-in-form">
                                        <label for="fname">first name<span>*</span></label>
                                        <input wire:model="s_firstName" type="text" name="fname" value="" placeholder="Your name">
                                        @error('s_firstName')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="lname">last name<span>*</span></label>
                                        <input wire:model="s_lastName" type="text" name="lname" value="" placeholder="Your last name">
                                        @error('s_lastName')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="email">Email Addreess:</label>
                                        <input wire:model="s_email" type="email" name="email" value="" placeholder="Type your email">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="phone">Phone number<span>*</span></label>
                                        <input wire:model="s_mobile" type="number" name="phone" value="" placeholder="10 digits format">
                                        @error('s_mobile')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="add">Line1:</label>
                                        <input wire:model="s_line1" type="text" name="add" value="" placeholder="Street at apartment number">
                                        @error('s_line1')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="add">Line2:</label>
                                        <input wire:model="s_line2" type="text" name="add" value="" placeholder="Street at apartment number">
                                    </p>
                                    <p class="row-in-form">
                                        <label for="country">Country<span>*</span></label>
                                        <input wire:model="s_country" id="country" type="text" name="country" value="" placeholder="United States">
                                        @error('s_country')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="country">Province<span>*</span></label>
                                        <input wire:model="s_province" id="country" type="text" name="country" value="" placeholder="United States">
                                        @error('s_province')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="zip-code">Postcode / ZIP:</label>
                                        <input wire:model="s_zipcode" type="number" name="zip-code" value="" placeholder="Your postal code">
                                        @error('s_zipcode')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="city">Town / City<span>*</span></label>
                                        <input wire:model="s_city" type="text" name="city" value="" placeholder="City name">
                                        @error('s_city')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </p>

                                </div>
                            </div>
                        </div>
                    @endif
                </div>



                <div class="summary summary-checkout">

                    <div class="summary-item payment-method">
                        <h4 class="title-box">Payment Method</h4>

                        <div class="wrap-address-billing">

                                <p class="row-in-form">
                                    <label for="city">Card Number</label>
                                    <input wire:model="card_no" type="text" name="city" value="" placeholder="Card Number">
                                    @error('card_no')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </p>

                                <p class="row-in-form">
                                    <label for="city">Expiry Month</label>
                                    <input wire:model="exp_month" type="text"  value="" placeholder="MM">
                                    @error('exp_month')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </p>

                                <p class="row-in-form">
                                    <label for="city">Expiry Year</label>
                                    <input wire:model="exp_year" type="text"  value="" placeholder="YYYY">
                                    @error('exp_year')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </p>

                                <p class="row-in-form">
                                    <label for="cvc">CVC</label>
                                    <input wire:model="cvc" type="password"  value="" placeholder="YYYY" class="form-control">
                                    @error('cvc')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </p>

                        </div>
                        <div class="choose-payment-methods">
                            <label class="payment-method">
                                <input name="payment-method" id="payment-method-bank" value="cod" type="radio" wire:model="paymentMode">
                                <span>Cash on Delivery</span>
                                <span class="payment-desc">Order Now Pay On Delivery</span>
                            </label>
                            <label class="payment-method">
                                <input name="payment-method" id="payment-method-visa" value="card" type="radio" wire:model="paymentMode">
                                <span>Debit / Credit Card</span>
                                <span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
                            </label>
                            <label class="payment-method">
                                <input name="payment-method" id="payment-method-paypal" value="paypal" type="radio" wire:model="paymentMode">
                                <span>Paypal</span>
                                <span class="payment-desc">You can pay with your credit</span>
                                <span class="payment-desc">card if you don't have a paypal account</span>
                            </label>
                            @error('paymentMode')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        @if(session()->has('checkout'))
                            <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">{{session()->get('checkout')['total']}}</span></p>
                        @endif
                        @if($errors->isEmpty())
                            <div wire:ignore id="processing" style="font-size: 22px;margin-bottom: 20px;padding-left: 37px;color: green;display: none">
                                <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                <span>Processing...</span>
                            </div>
                        @endif
                        <button class="btn btn-medium"  type="submit" >Place order now</button>
                    </div>

                    <div class="summary-item shipping-method">
                        <h4 class="title-box f-title">Shipping method</h4>
                        <p class="summary-info"><span class="title">Flat Rate</span></p>
                        <p class="summary-info"><span class="title">Fixed $0</span></p>

                    </div>
                </div>


            </form>
        </div><!--end main content area-->
    </div><!--end container-->

</main>
<!--main area-->

