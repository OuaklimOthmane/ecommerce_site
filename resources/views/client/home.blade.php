@extends('layouts.client')
@section('custom-css')
{{-- <link rel="stylesheet" href="{{asset("public/css/category/cosmetic-store.css")}}"> --}}
@endsection
@section('top-header')
@include('client.includes.top-header')
@endsection
@section('bottom-header')
@include('client.includes.bottom-header')
@endsection
@section('mobile-header')
@include('client.includes.mobile-header')
@endsection
@section('breadcrumb')

@endsection

@section('content')

<div class="full-row p-0 bg-light">
    <div id="slider" style="width:1200px; height:650px; margin:0 auto; margin-bottom:0px;">
        @foreach ($categories as $item)
        <div class="ls-slide" data-ls="duration:4000; transition2d:4; kenburnsscale:1.2;">
            <img width="1920" height="750" src="{{$item->photo}}" class="ls-bg" alt=""
                style="top:50%; left:50%; text-align:initial; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; width:100%;"
                data-ls="showinfo:1; durationin:2000; easingin:easeOutExpo; scalexin:1.5; scaleyin:1.5; position:fixed;">

            <p style="width:450px; font-size:80px; line-height:60px; top:40%; left:100px; white-space:normal; color:#fff !important;"
                class="ls-l higlight-font font-700 ls-hide-phone text-dark"
                data-ls="offsetyin:150; durationin:700; delayin:500; easingin:easeOutQuint; rotatexin:20; scalexin:1.4; offsetyout:600; durationout:400; parallaxlevel:0;">
                {{$item->libelle}}
            </p>
            <p style="font-size:14px; letter-spacing: 2px; line-height:20px; top:28%; left:100px; color:#fff !important;"
                class="ls-l ordenery-font text-dark text-uppercase font-700 ls-hide-phone"
                data-ls="offsetyin:150; durationin:700; easingin:easeOutQuint; rotatexin:20; scalexin:1.4; offsetyout:600; durationout:400; parallaxlevel:0;">
                Deal Upto 30%</p>

            <p style="width:580px; font-weight:600; font-size:15px; line-height:30px; top:58%; left:120px; white-space:normal; color:#fff !important;"
                class="ls-l ls-hide-phone text-dark ordenery-font text-uppercase"
                data-ls="offsetxin:150; durationin:700; easingin:easeOutBack; rotatexin:20; scalexin:1; offsetyout:600; durationout:400; parallaxlevel:0; delayin:900;">
                Les prix commence à 50DH<br>From <span class="text-primary font-600 font-large"> </span></p>

            <div style="width:3px; height:60px; border-radius:0; top:58%; left:100px;"
                class="ls-l ls-hide-phone bg-primary"
                data-ls="offsetxin:100; easingin:easeOutBack; delayin:700; durationout:400; offsetxout:-20; parallax:false; parallaxlevel:1;">
            </div>

            <a class="ls-l ls-hide-phone" href="#" target="_self"
                data-ls="offsetyin:150; durationin:700; delayin:1200; easingin:easeOutQuint; rotatexin:20; scalexin:1.4; offsetyout:600; durationout:400; hover:true; hoveropacity:1; hoverbgcolor:#e74c3c ; parallaxlevel:0;">
                <p style="color:#fff !important; cursor:pointer;padding-top:8px; padding-bottom:8px; font-weight: 500; font-size:14px; top:72%; left:100px; padding-right:25px; padding-left:25px; line-height:28px;"
                    class="bg-dark text-white">Acheter</p>
            </a>
        </div>
        @endforeach
        <!-- Slide 1-->

    </div>
</div>
<!--==================== Slider Section End ====================-->

<!--==================== Shop By Categories Section Start ====================-->
<div class="full-row pb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-head d-flex justify-content-between align-items-center pb-20">
                    <h3 class="text-secondary mb-0">Acheter Par Catègorie</h3>
                    <a href="{{route('shop.all-products')}}" class="btn-link-down-line text-uppercase font-small">Voir
                        toutes</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="row row-cols-lg-2 row-cols-1">
                    @foreach ($maincategories as $cat)
                    <div class="col">
                        <div class="banner-wrapper hover-img-zoom banner-one custom-class-113">

                            <a  href="{{route('shop.categoryProducts',['name'=>$cat->libelle,'id'=>$cat->id])}}"><div class="banner-image-1 overflow-hidden transation" style="background:linear-gradient( rgba(0, 0, 0, 0.13), rgba(0, 0, 0, 0.13) ),url({{asset($cat->photo)}}) ;background-size:cover;height:400px"></div></a>
                            <div class="banner-content position-absolute">
                                <span class="d-block font-500 font-small text-uppercase mb-2"></span>
                                <h4 ><a style="color:#fff !important;" href="{{route('shop.categoryProducts',['name'=>$cat->libelle,'id'=>$cat->id])}}" class="
                                        text-primary text-decoration-none">{{$cat->libelle}}</a></h4>
                                <a style="color:#fff !important;"href="{{route('shop.categoryProducts',['name'=>$cat->libelle,'id'=>$cat->id])}}" class="
                                    btn-link-down-line mt-20 text-uppercase">Acheter</a>
                            </div>
                        </div>
                    </div>
                    @endforeach


        </div>
    </div>
</div>
</div>
</div>
</div>
<!--==================== Shop By Categories Section End ====================-->

<!--==================== Exclusive Product Section Start ====================-->
<div class="full-row">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <span class="text-primary text-center pb-2 d-table mx-auto tagline text-uppercase font-small">Prduits
                    exclusifs</span>
                <h3 class="mb-4 w-50 text-center mx-auto w-sm-100 font-700 text-dark">les dernières produits</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="products product-style-3">
                    <div
                        class="row g-3 row-cols-lg-5 row-cols-md-3 row-cols-sm-2 row-cols-1 e-image-bg-light e-hover-image-zoom e-btn-set-hover-primary">

                        @foreach ($latest_prod as $item)
                        <div class="col">
                            <div class="product type-product">
                                <div class="product-wrapper">
                                    <div class="product-image" style="height: 230px;
">
                                        <a href="{{route('shop.productDetails',['name'=>$item->name,'id'=>$item->id])}}"
                                            class="woocommerce-LoopProduct-link"><img src="{{$item->main_image}}"
                                                alt="Product Image"></a>
                                        <div class="product-labels">
                                            <div class="badge1"><span>Nouveau</span></div>
                                        </div>
                                        <div class="on-sale">{{$item->discount}}</div>
                                    </div>
                                    <div class="product-info" style="background-color: #f8f6f5;
    padding: 1.5rem 1.5rem;line-height: 1.4;height:160px;">
                                        <h3 class="product-title"><a
                                                href="{{route('shop.productDetails',['name'=>$item->name,'id'=>$item->id])}}"
                                                style="font-size: 16px !important;">{{$item->name}}</a></h3>
                                        <div class="product-price">
                                            <div class="price">
                                                @if (!$item->discount)
                                                <ins>{{$item->price}}.00DH</ins>
                                                @else
                                                <ins>{{calculatePriceAfterDiscount($item->price,$item->discount)}}DH</ins>
                                                <del>{{$item->price}}.00DH</del>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="hover-area" style="justify-content: space-around;">
                                            <form action="{{route('shopping-cart.add')}}" method="post"
                                                id="add-to-cart-form{{$item->id}}">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$item->id}}">

                                                <div class="cart-button">
                                                    <a href="{{route('shopping-cart.add')}}"
                                                        onclick="event.preventDefault();
                                                       document.getElementById('add-to-cart-form{{$item->id}}').submit();" class="button add_to_cart_button"
                                                        data-bs-toggle="tooltip" data-bs-placement="right" title=""
                                                        data-bs-original-title="Add to Cart"
                                                        aria-label="Add to Cart">Add to
                                                        Cart</a>
                                                </div>
                                            </form>



                                            {{-- <div class="cart-button">
                                                        <a href="#" class="button add_to_cart_button">Add to Cart</a>
                                                    </div> --}}
                                            <div class="wishlist-button">
                                                <a class="add_to_wishlist" href="#" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title=""
                                                    data-bs-original-title="Add to Wishlist"
                                                    aria-label="Add to Wishlist">Wishlist</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==================== Exclusive Product Section End ====================-->

<!--==================== Special Offer Section Start ====================-->
<div class="full-row" style="background: url({{asset('public/images/banner.jpg')}}) no-repeat center / cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6" style="background:linear-gradient( rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1) ), url({{asset('public/images/plateau.jpg')}});background-size:cover;background-position:center;">
                <div class="p-50 text-white bg-primary" style="background-color:unset !important;">
                    <div class="text-uppercase text-white font-500">Offre spécial</div>
                    <h1 class="text-white my-4">Promotion du <strong>50%</strong> sur ce produit</h1>
                    <div class="font-medium w-75">
                        <p>PLATEAU TRADITIONNEL CISELÉ DE MOTIFS ORIENTAUX</p>
                    </div>
                    <a href="#" class="btn btn-dark mt-4">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==================== Special Offer Section End ====================-->

<!--==================== Trending Products Section Start ====================-->
<div class="full-row">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                {{-- <span class="text-primary text-center pb-2 d-table mx-auto tagline text-uppercase font-small">Top</span> --}}
                <h3 class="mb-4 w-50 text-center mx-auto w-sm-100 font-700 text-dark">Top produits</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="products product-style-3">
                    <div
                        class="row g-3 row-cols-lg-5 row-cols-md-3 row-cols-sm-2 row-cols-1 e-image-bg-light e-hover-image-zoom e-btn-set-hover-primary">

                        @foreach ($featured as $item)
                        <div class="col">
                            <div class="product type-product">
                                <div class="product-wrapper">
                                    <div class="product-image" style="    height: 230px;
">
                                        <a href="{{route('shop.productDetails',['name'=>$item->name,'id'=>$item->id])}}" class="woocommerce-LoopProduct-link"><img
                                                src="{{$item->main_image}}" alt="Product Image"></a>
                                        <div class="product-labels">
                                            <div class="badge1"><span>Top</span></div>
                                        </div>
                                        <div class="on-sale">-60%</div>
                                    </div>
                                    <div class="product-info"  style="background-color: #f8f6f5;
    padding: 1.5rem 1.5rem;line-height: 1.4;height:160px;">
                                        <h3 class="product-title"  style="font-size: 16px !important;"><a href="{{route('shop.productDetails',['name'=>$item->name,'id'=>$item->id])}}">{{$item->name}}</a></h3>
                                        <div class="product-price">
                                            <div class="price">
                                                @if (!$item->discount)
                                                <ins>{{$item->price}}.00DH</ins>
                                                @else
                                                <ins>{{calculatePriceAfterDiscount($item->price,$item->discount)}}DH</ins>
                                                <del>{{$item->price}}.00DH</del>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="hover-area" style=" justify-content: space-around;">
                                            <form action="{{route('shopping-cart.add')}}" method="post"
                                                id="add-to-cart-form{{$item->id}}">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$item->id}}">

                                                <div class="cart-button">
                                                    <a href="{{route('shopping-cart.add')}}"
                                                        onclick="event.preventDefault();
                                                       document.getElementById('add-to-cart-form{{$item->id}}').submit();"
                                                        class="button add_to_cart_button">Add to
                                                        Cart</a>
                                                </div>
                                            </form>


                                            <div class="wishlist-button">
                                                <a class="add_to_wishlist" href="#" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title=""
                                                    data-bs-original-title="Add to Wishlist"
                                                    aria-label="Add to Wishlist">Wishlist</a>
                                            </div>
                                            {{-- <div class="compare-button">
                                                        <a class="compare button" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Compare" aria-label="Compare">Compare</a>
                                                    </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==================== Trending Products Section End ====================-->

<!--==================== Banner Section Start ====================-->
{{-- <div class="full-row p-0 d-none d-sm-block">
    <div class="container">
        <div class="row row-cols-lg-2 row-cols-1 g-3">
            <div class="col">
                <div class="banner-wrapper hover-img-zoom banner-one custom-class-112">
                    <div class="banner-image overflow-hidden transation"><img src="assets/images/banner/63.png"
                            alt="Banner Image"></div>
                    <div class="banner-content position-absolute">
                        <span class="text-dark font-500 font-small text-uppercase d-block mb-2">Natural Product</span>
                        <h4><a href="#" class="text-dark font-700 text-decoration-none">Beauty Essintial Product</a>
                        </h4>
                        <div class="font-fifteen">
                            <p>Turpis pulvinar amet sodales. Dui eget interdum molestie vivamus tempus.</p>
                        </div>
                        <a href="#" class="btn-link-down-line mt-20 text-uppercase">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="banner-wrapper hover-img-zoom banner-one custom-class-112">
                    <div class="banner-image overflow-hidden transation"><img src="assets/images/banner/64.png"
                            alt="Banner Image"></div>
                    <div class="banner-content position-absolute">
                        <span class="text-dark font-500 font-small text-uppercase d-block mb-2">Sale Upto 30%</span>
                        <h4><a href="#" class="text-dark font-700 text-decoration-none">Beauty Essintial Product</a>
                        </h4>
                        <div class="font-fifteen">
                            <p>Turpis pulvinar amet sodales. Dui eget interdum molestie vivamus tempus.</p>
                        </div>
                        <a href="#" class="btn-link-down-line mt-20 text-uppercase">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  --}}
<!--==================== Banner Section End ====================-->


<div class="full-row pb-0">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-md-12">
                <div class="owl-carousel dot-disable nav-disable six-carousel">
                    <div class="item">
                        <div class="hover-img-zoom overflow-hidden transation">
                            <a href="{{asset('public/images/5.jpg')}}" data-fancybox="gallery"
                                data-caption="Caption for single image">
                                <img class="transation" src="{{asset('public/images/5.jpg')}}" alt="Image not found!">
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="hover-img-zoom overflow-hidden transation">
                            <a href="{{asset('public/images/2.jpg')}}" data-fancybox="gallery"
                                data-caption="Caption for single image">
                                <img class="transation" src="{{asset('public/images/2.jpg')}}" alt="Image not found!">
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="hover-img-zoom overflow-hidden transation">
                            <a href="{{asset('public/images/4.jpg')}}" data-fancybox="gallery"
                                data-caption="Caption for single image">
                                <img class="transation" src="{{asset('public/images/4.jpg')}}" alt="Image not found!">
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="hover-img-zoom overflow-hidden transation">
                            <a href="{{asset('public/images/6.jpg')}}" data-fancybox="gallery"
                                data-caption="Caption for single image">
                                <img class="transation" src="{{asset('public/images/6.jpg')}}" alt="Image not found!">
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="hover-img-zoom overflow-hidden transation">
                            <a href="{{asset('public/images/7.jpg')}}" data-fancybox="gallery"
                                data-caption="Caption for single image">
                                <img class="transation" src="{{asset('public/images/7.jpg')}}" alt="Image not found!">
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="hover-img-zoom overflow-hidden transation">
                            <a href="{{asset('public/images/8.jpg')}}" data-fancybox="gallery"
                                data-caption="Caption for single image">
                                <img class="transation" src="{{asset('public/images/8.jpg')}}" alt="Image not found!">
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="hover-img-zoom overflow-hidden transation">
                            <a href="{{asset('public/images/10.jpg')}}" data-fancybox="gallery"
                                data-caption="Caption for single image">
                                <img class="transation" src="{{asset('public/images/10.jpg')}}" alt="Image not found!">
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="hover-img-zoom overflow-hidden transation">
                            <a href="{{asset('public/images/9.jpg')}}" data-fancybox="gallery"
                                data-caption="Caption for single image">
                                <img class="transation" src="{{asset('public/images/9.jpg')}}" alt="Image not found!">
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
