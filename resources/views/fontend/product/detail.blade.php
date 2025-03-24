@extends('fontend.main')
@section('fontend-content')

<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="small-container single-product">
        <div class="row">
            <div class="col-6">
                <ul>
                    @foreach($images as $index => $image)
                    <!-- Giả sử $images là mảng các hình ảnh -->
                    <!-- Kiểm tra ID sản phẩm -->
                    @if($image->product_id === $product->id && $index === 0)
                    <li>
                        <img src="{{ asset($image->image_name)}}" alt="{{ $product->name }}" style="width: 100%"
                            id="product-img" class="product-img">
                        <div class="list-thumbs-footer">
                            <div class="row">
                                @foreach($images as $indexInner => $image)
                                <div class="col">
                                    <img src="{{ asset($image->image_name)}}" alt="{{ $product->name }}"
                                        style="width: 100px" class="product-img-thumb" id="product-img-thumb"
                                        onclick="handleChangeImage('{{ asset($image->image_name)}}')">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>


            <div class="col-6" style="margin-bottom: 160px;">
                <div>
                    <h2 class="title">{{$product->name}}</h2>
                </div>

                <p class="price">390.00đ</p>
                <form class="add_to-cart" action="{{route('cart.add')}}" method="POST">
                    @csrf
                    <div class="select">
                        <div class="select-number">
                            <label class="font-weight-bold" for="">Số lượng:</label>
                            <input class="qty" type="number" name="qty" min="1" value="1">
                            <input type="hidden" name="product_hidden" value="{{$product->id}}">
                        </div>
                        <input type="hidden" name="product_hidden" value="{{$product->id}}">
                        <button class="btn btn-dark" type="submit">Thêm vào giỏ hàng</button>
                    </div>
                </form>

                <div>
                    <h4 class="sub-title">Mô tả sản phẩm</h4>
                    <p class="description">4</p>
                </div>

                <div class="mt-4 line">
                    <h5 class="sub-title">Thông tin bổ sung</h5>
                    <ul class="list-inline">
                        <li class="list-inline-item"><i class="lni lni-check-circle-1"></i> Không chứa cồn</li>
                        <li class="list-inline-item"><i class="lni lni-check-circle-1"></i> Không sulfate</li>
                        <li class="list-inline-item"><i class="lni lni-check-circle-1"></i> Không dầu khoáng</li>
                        <li class="list-inline-item"><i class="lni lni-check-circle-1"></i> Không paraben</li>
                    </ul>
                </div>

                <div class="mt-4">
                    <h5 class="sub-title">Thích hợp với</h5>
                    <p class="description">Mọi loại da</p>
                </div>

                <div class="mt-4">
                    <h5 class="sub-title">Thành phần chính</h5>
                    <p class="description">Với tinh bột nghệ, Yến mạch và Vitamin B3</p>
                </div>

            </div>

        </div>
    </div>

</section>


@endsection

<script>
const handleChangeImage = (urlImg) => {
    document.getElementById('product-img').src = urlImg;

    const thumbs = document.getElementsByClassName('product-img-thumb');

    // Lặp qua tất cả thumbnail để thêm hoặc xóa class 'active'
    for (let i = 0; i < thumbs.length; i++) {
        if (thumbs[i].src === urlImg) {
            thumbs[i].style.border = '1px solid'; // Thêm border cho thumbnail đã nhấn
        } else {
            thumbs[i].style.border = 'none'; // Xóa border cho thumbnail không phải là thumbnail đã nhấn
        }
    }
}

window.onload = function() {
    const thumbs = document.getElementsByClassName('product-img-thumb');
    if (thumbs.length > 0) {
        // Lấy nguồn của thumbnail đầu tiên
        const firstThumb = thumbs[0].src;
        handleChangeImage(firstThumb); // Đặt ảnh chính là thumbnail đầu tiên
        thumbs[0].style.border = '1px solid'; // Thêm border cho thumbnail đầu tiên
    }
}
</script>