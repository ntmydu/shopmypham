@extends('fontend.main')
@section('fontend-content')
<div class="container">
    <div class="row">

        <div class="col-md-6">

            <h2>Thông tin thanh toán</h2>
            <form>

                <div class="form-group">
                    <label for="name">Họ và tên:</label>
                    <input type="text" class="form-control" name="name" value="{{session('order.name')}}">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" value="{{session('order.email')}}">
                </div>


                <div class="form-group">
                    <label for="note">Ghi chú:</label>
                    <input type="text" class="form-control" name="note" value="{{session('order.note')}}"
                        placeholder="Nhập ghi chú về đơn hàng(Nếu có)">
                </div>
                <div id="dis" class="form-group">
                    <label class="discount-lab" for="note">Mã giảm giá:</label>
                    <input class="discount" type="text" class="form-control" placeholder="Nhập mã giảm giá">
                    <button class="btn btn-dark">Áp dụng</button>
                </div>


            </form>

        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="phone">Số điện thoại:</label>
                <input type="onlyread" class="form-control" name="phone" placeholder="Nhập số điện thoại"
                    value="{{session('order.phone')}}">
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ:</label>
                <input type="text" class="form-control" name="address" value="{{session('order.address')}}"
                    placeholder="Nhập địa chỉ" required>
            </div>

            <div class="form-group">
                <label>Phương Thức Thanh Toán:</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_method" id="credit_card"
                        value="credit_card" required>
                    <label class="form-check-label" for="credit_card">Thẻ Tín Dụng</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_method" id="paypal" value="paypal">
                    <label class="form-check-label" for="paypal">PayPal</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="payment_method" id="bank_transfer"
                        value="bank_transfer">
                    <label class="form-check-label" for="bank_transfer">Chuyển Khoản Ngân Hàng</label>
                </div>
                <form action="">
                    <button type="submit" class="btn btn-primary">Thanh Toán</button>
                </form>
            </div>
        </div>
        @endsection

    </div>
</div>