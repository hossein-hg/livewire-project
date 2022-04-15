<div>
    <div class="container">
    <div class="row">
        @if(Cart::instance('wishlist')->count() > 0)
        <h1 class="shop-title">WishList</h1>
    <ul class="product-list grid-products equal-container">
        @foreach(Cart::instance('wishlist')->content() as $item)
            <li class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ">
                <div class="product product-style-3 equal-elem ">
                    <div class="product-thumnail">
                        <a href="{{route('singleProduct',[$item->model->slug])}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                            <figure><img src="{{asset('assets/images/products/'.$item->model->image)}}" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                        </a>
                    </div>
                    <div class="product-info">
                        <a href="#" class="product-name"><span>{{$item->name}}</span></a>
                        <div class="wrap-price"><span class="product-price">${{$item->price}}</span></div>
                        <a href="#" class="btn add-to-cart" wire:click.prevent="addToCart({{$item->id}},'{{$item->name}}',{{$item->price}})">Add To Cart</a>
                        <div class="product-wish" >
                        <a href="#" wire:click.prevent="removeFromWishlist('{{$item->rowId}}')"><i class="fa fa-trash "></i></a>
                        <div class="product-wish" >
                        </div>


                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
        @else
            <h1 class="shop-title">No Items in Wishlist</h1>
        @endif
    </div>
    </div>
</div>
