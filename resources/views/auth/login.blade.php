@extends('frontend.layout.master')
@section('title', 'Checkout Page')
@section('content')
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

    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-lg-6 bg-primary" style="border-bottom-left-radius: 10px; border-top-left-radius: 10px; min-height: 60vh">
                    <div class="card " style="padding: 60px">
                        <div class="card-header mb-4">
                            <h4 style="margin-bottom: 30px; color: white; text-align: center">Login Form</h4>
                        </div>
                        <div class="card-body" >
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div style="margin-bottom: 10px">
                                    <input type="email" name="email" placeholder="Enter Your Email" class="form-control">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div style="margin-bottom: 10px">
                                    <input type="password" name="password" placeholder="Enter Your Password" class="form-control">
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div style="margin-bottom: 10px">
                                    <input type="submit"  class="btn btn-success" value="Login">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 bg-info" style="min-height: 60vh; border-bottom-right-radius: 10px; border-top-right-radius: 10px;">
                    <div class="card " style="padding: 60px">
                        <div class="card-header mb-4">
                            <h4 style="margin-bottom: 30px;  text-align: center">Register Form</h4>
                        </div>
                        <div class="card-body" >
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div style="margin-bottom: 10px">
                                    <input type="text" name="name" placeholder="Enter Your Name" class="form-control">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div style="margin-bottom: 10px">
                                    <input type="email" name="email" placeholder="Enter Your Email" class="form-control">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div style="margin-bottom: 10px">
                                    <input type="text" name="phone" placeholder="Enter Your Phone Number" class="form-control">
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div style="margin-bottom: 10px">
                                    <input type="password" name="password" placeholder="Enter Your Password" class="form-control">
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div style="margin-bottom: 10px">
                                    <input type="password" name="password_confirmation" placeholder="Enter Confirm Password" class="form-control">
                                    @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div style="margin-bottom: 10px">
                                    <input type="submit"  class="btn btn-success" value="Register">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
