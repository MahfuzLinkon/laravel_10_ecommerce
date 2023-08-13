<!-- TOP HEADER -->
<div id="top-header">
    <div class="container">
        <ul class="header-links pull-left">
            <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
            <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
            <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
        </ul>
        <ul class="header-links pull-right">
            <li><a href="#"><i class="fa">&#2547;</i> BDT</a></li>
            @if(!auth()->check())
            <li><a href="{{ route('login') }}"><i class="fa fa-user-o"></i>Login</a></li>
            @else
            <li>
{{--                <a href="{{ route('login') }}"><i class="fa fa-user-o"></i>Logout</a>--}}
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" style="background-color: transparent; border: none; color: white" class=""><i class="fa fa-user-o"></i>Logout</button>
                </form>
            </li>
            @endif
        </ul>
    </div>
</div>
<!-- /TOP HEADER -->

<!-- MAIN HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class="col-md-3">
                <div class="header-logo">
                    <a href="{{ url('/') }}" class="logo">
                        <img src="{{ asset('frontend') }}/./img/logo.png" alt="">
                    </a>
                </div>
            </div>
            <!-- /LOGO -->

            <!-- SEARCH BAR -->
            <div class="col-md-6">
                <div class="header-search">
                    <form>
                        <select class="input-select">
                            <option value="0">All Categories</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                            @endforeach
                        </select>
                        <input class="input" placeholder="Search here">
                        <button class="search-btn">Search</button>
                    </form>
                </div>
            </div>
            <!-- /SEARCH BAR -->

            <!-- ACCOUNT -->
            <div class="col-md-3 clearfix">
                <div class="header-ctn">
                    <!-- Wishlist -->
                    <div>
                        <a href="#">
                            <i class="fa fa-heart-o"></i>
                            <span>Your Wishlist</span>
                            <div class="qty">2</div>
                        </a>
                    </div>
                    <!-- /Wishlist -->

                    <!-- Cart -->
                    @php
                        $cart_array = cartArray();
                    @endphp
                    <div class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Your Cart</span>
                            <div class="qty">{{ count($cart_array) }}</div>
                        </a>
                        <div class="cart-dropdown">
                            <div class="cart-list">
                                @foreach($cart_array as $item)
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="{{ asset(explode(',', $item['attributes'][0])[0]) }}" alt="">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-name"><a href="#">{{ $item['name'] }}</a></h3>
                                        <h4 class="product-price"><span class="qty">{{ $item['quantity'] }}x</span>&#2547; {{ $item['price'] }}.00</h4>
                                    </div>
                                    <a href="{{ route('product.remove-from-cart', $item['id']) }}" class="delete"><i class="fa fa-close"></i></a>
                                </div>
                                @endforeach

                            </div>
                            <div class="cart-summary">
                                <small>{{ count($cart_array) }} Item(s) selected</small>
                                <h5>SUBTOTAL: &#2547; {{ Cart::getTotal() }}.00</h5>
                            </div>
                            <div class="cart-btns">
                                <a href="">View Cart</a>
                                <a href="{{ route('product.checkout') }}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /Cart -->

                    <!-- Menu Toogle -->
                    <div class="menu-toggle">
                        <a href="#">
                            <i class="fa fa-bars"></i>
                            <span>Menu</span>
                        </a>
                    </div>
                    <!-- /Menu Toogle -->
                </div>
            </div>
            <!-- /ACCOUNT -->
        </div>
        <!-- row -->
    </div>
    <!-- container -->
</div>
<!-- /MAIN HEADER -->
