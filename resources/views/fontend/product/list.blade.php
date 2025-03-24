@extends('fontend.main')
@section('fontend-content')
<section class="product">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{$menu->name}}</h1>
            </div>
        </div>
        <div class="row row-cols-4">
            @foreach($products as $product)
            <div class="col-3">
                <a href="{{route('product.detail', $product->id)}}">
                    <div class="shop-card">
                        <div class="card-banner img-holder" style="--width: 540 ; --height: 720;">
                            @foreach($images as $image)
                            @if($image->product_id === $product->id)
                            <img src="{{ asset($image->image_name) }}" width="100" height="100" loading="lazy"
                                class="img-product" alt="{{ $product->name }}">
                            @endif
                            @endforeach
                            <span class="badge" aria-label="20% off">-20%</span>
                            <div class="card-actions">
                                <button class="'action-btn" aria-hidden="true">
                                    <i class="lni lni-cart-1"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-content">
                            <div class="price">
                                <del class="del">{{number_format($product->price)}}đ</del>
                                <span class="span">{{number_format($product->price_sale)}}đ</span>
                            </div>
                            <h3>
                                <a href="#" class="card-title">{{$product->name}}</a>
                            </h3>
                            <div class="add-to-cart">
                                <i class="lni lni-cart-1"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

</section>

@endsection