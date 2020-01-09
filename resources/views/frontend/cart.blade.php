@extends('frontend.layouts.main')
@section('title','ตะกร้าสินค้า')
@section('content')
    <div class="page">
        <div class="navbar navbar-page">
            <div class="navbar-inner sliding">
                <div class="left">
                    <a href="#" class="link back">
                        <i class="ti-arrow-left"></i>
                    </a>
                </div>
                <div class="title">
                    Cart
                </div>
            </div>
        </div>
        <div class="page-content">
            <!-- cart -->
            <div class="cart cart-page segments-page">
                <div class="container">
                    <div class="wrap-content">
                        <div class="row">
                            <div class="col-25">
                                <div class="content-image">
                                    <img src="images/product1.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-55">
                                <div class="content-text">
                                    <a href="/product-details/"><p>Original Sweater With 100% Wool Fabric</p></a>
                                </div>
                            </div>
                            <div class="col-20">
                                <div class="content-info">
                                    <span class="price">$30.00</span>
                                    <form class="list">
                                        <div class="item-input-wrap">
                                            <input type="number" value="1">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- small divider -->
                    <div class="small-divider"></div>
                    <!-- end  small divider -->

                    <div class="wrap-content">
                        <div class="row">
                            <div class="col-25">
                                <div class="content-image">
                                    <img src="images/product12.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-55">
                                <div class="content-text">
                                    <a href="/product-details/"><p>Running Watches for Men in a Modern Style</p></a>
                                </div>
                            </div>
                            <div class="col-20">
                                <div class="content-info">
                                    <span class="price">$60.00</span>
                                    <form class="list">
                                        <div class="item-input-wrap">
                                            <input type="number" value="1">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- small divider -->
                    <div class="small-divider"></div>
                    <!-- end  small divider -->

                    <div class="wrap-content">
                        <div class="row">
                            <div class="col-25">
                                <div class="content-image">
                                    <img src="images/product14.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-55">
                                <div class="content-text">
                                    <a href="/product-details/"><p>Gamepad New Design With Modern Style</p></a>
                                </div>
                            </div>
                            <div class="col-20">
                                <div class="content-info">
                                    <span class="price">$33.00</span>
                                    <form class="list">
                                        <div class="item-input-wrap">
                                            <input type="number" value="1">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- small divider -->
                    <div class="small-divider"></div>
                    <!-- end  small divider -->

                    <div class="wrap-content">
                        <div class="row">
                            <div class="col-25">
                                <div class="content-image">
                                    <img src="images/product4.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-55">
                                <div class="content-text">
                                    <a href="/product-details/"><p>Casual Dress Shirt Men Long Sleeves</p></a>
                                </div>
                            </div>
                            <div class="col-20">
                                <div class="content-info">
                                    <span class="price">$30.00</span>
                                    <form class="list">
                                        <div class="item-input-wrap">
                                            <input type="number" value="1">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- small divider -->
                    <div class="small-divider"></div>
                    <!-- end  small divider -->

                    <div class="wrap-content">
                        <div class="row">
                            <div class="col-25">
                                <div class="content-image">
                                    <img src="images/product5.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-55">
                                <div class="content-text">
                                    <a href="/product-details/"><p>Limited Edition Backpacks 1 variant</p></a>
                                </div>
                            </div>
                            <div class="col-20">
                                <div class="content-info">
                                    <span class="price">$41.00</span>
                                    <form class="list">
                                        <div class="item-input-wrap">
                                            <input type="number" value="1">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- small divider -->
                    <div class="small-divider"></div>
                    <!-- end  small divider -->

                    <div class="wrap-content">
                        <div class="row">
                            <div class="col-25">
                                <div class="content-image">
                                    <img src="images/product6.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-55">
                                <div class="content-text">
                                    <a href="/product-details/"><p>Jacket Casual For Men or Women</p></a>
                                </div>
                            </div>
                            <div class="col-20">
                                <div class="content-info">
                                    <span class="price">$50.00</span>
                                    <form class="list">
                                        <div class="item-input-wrap">
                                            <input type="number" value="1">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- small divider -->
                    <div class="small-divider"></div>
                    <!-- end  small divider -->

                    <div class="wrap-action-cart">
                        <ul>
                            <li class="content-total">
                                <h6>Total : <span>$194.00</span></h6>
                            </li>
                            <li class="content-button">
                                <a href="/checkout/" class="button">Checkout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end cart -->
        </div>
    </div>
@endsection
