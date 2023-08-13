@extends('frontend.layout.master')
@section('title', 'Checkout Page')
@section('content')

    @php
        $cart_array = cartArray();
    @endphp
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">Checkout</h3>
                    <ul class="breadcrumb-tree">
                        <li><a href="#">Home</a></li>
                        <li class="active">Checkout</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <form action="{{ route('place.order') }}" method="post">
                    @csrf
                <div class="col-md-7">
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Billing address</h3>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="name" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <input class="input" type="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="address" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="city" placeholder="City">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="country" placeholder="Country">
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="zip_code" placeholder="ZIP Code">
                        </div>
                        <div class="form-group">
                            <input class="input" type="tel" name="phone" placeholder="Telephone">
                        </div>
                    </div>
                    <!-- /Billing Details -->

                    <!-- Order notes -->
                    <div class="order-notes">
                        <textarea class="input" name="note" placeholder="Order Notes"></textarea>
                    </div>
                    <!-- /Order notes -->
                </div>



                <!-- Order Details -->
                <div class="col-md-5 order-details">
                    <div class="section-title text-center">
                        <h3 class="title">Your Order</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div><strong>PRODUCT</strong></div>
                            <div><strong>TOTAL</strong></div>
                        </div>
                        <div class="order-products">
                            @foreach($cart_array as $item)
                            <div class="order-col">
                                <div>{{ $item['quantity'] }}x {{ $item['name'] }}</div>
                                <div>&#2547;{{ Cart::get($item['id'])->getPriceSum() }}.00</div>
                            </div>
                            @endforeach

                        </div>
                        <div class="order-col">
                            <div>Shiping</div>
                            <div><strong>FREE</strong></div>
                        </div>
                        <div class="order-col">
                            <div><strong>TOTAL</strong></div>
                            <div><strong class="order-total">&#2547;{{ Cart::getTotal() }}.00</strong></div>
                        </div>
                    </div>
                    <div class="payment-method">
                        <div class="input-radio">
                            <input type="radio" value="cash_on_delivery" name="payment" id="payment-1">
                            <label for="payment-1">
                                <span></span>
                                Cash on delivery
                            </label>
                        </div>
                        <div class="input-radio">
                            <input type="radio" value="nagad" name="payment" id="payment-2">
                            <label for="payment-2">
                                <span></span>
                                Nagad
                            </label>

                        </div>
{{--                        <div class="input-radio">--}}
{{--                            <input type="radio" name="payment" id="payment-3">--}}
{{--                            <label for="payment-3">--}}
{{--                                <span></span>--}}
{{--                                Paypal System--}}
{{--                            </label>--}}
{{--                            <div class="caption">--}}
{{--                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                    <div class="input-checkbox">
                        <input type="checkbox" id="terms">
                        <label for="terms">
                            <span></span>
                            I've read and accept the <a href="#">terms & conditions</a>
                        </label>
                    </div>
                    <button type="submit" class="primary-btn order-submit">Place order</button>
                </div>
                </form>
                <!-- /Order Details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
