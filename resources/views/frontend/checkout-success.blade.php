@extends('frontend.layouts.main')
@section('title','ประวัติคำสั่งซื้อ')
@section('content')
    <div class="col-full mt-5">
        <div class="row">
           <div class="col-sm-12">
               <div class="woocommerce-order">

                   <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">ขอบคุณสำหรับการสั่งซื้อ. เราได้รับคำสั่งซื้อของคุณแล้ว</p>

                   <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

                       <li class="woocommerce-order-overview__order order">
                           รหัสคำสั่งซื้อ :<strong>{{ $order->reference }}</strong>
                       </li>

                       <li class="woocommerce-order-overview__date date">
                           วันที่ :<strong>{{ $order->created_at }}</strong>
                       </li>


                       <li class="woocommerce-order-overview__total total">
                           ราคารวม :<strong><span class="woocommerce-Price-amount amount">{{ number_format($order->total,2) }} <span class="woocommerce-Price-currencySymbol">บาท</span></span></strong>
                       </li>

                       <li class="woocommerce-order-overview__payment-method method">
                           วิธีชำระเงิน : <strong>โอนผ่านธนาคาร</strong>
                       </li>

                   </ul>
                   <!-- .woocommerce-order-overview -->


                   <section class="woocommerce-order-details">
                       <h2 class="woocommerce-order-details__title">รายละเอียดคำสั่งซื้อ</h2>

                       <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

                           <thead>
                           <tr>
                               <th class="woocommerce-table__product-name product-name">สินค้า</th>
                               <th class="woocommerce-table__product-table product-total">ราคา</th>
                           </tr>
                           </thead>

                           <tbody>
                           @foreach($details as $index=>$detail)
                               <tr class="woocommerce-table__line-item order_item">

                                   <td class="woocommerce-table__product-name product-name">
                                       <a href="single-product-fullwidth.html">{{ $detail->product_name }}</a>
                                       <strong class="product-quantity">× {{ $detail->amount }}</strong>
                                   </td>

                                   <td class="woocommerce-table__product-total product-total">
                                       <span class="woocommerce-Price-amount amount">{{ number_format( $detail->price * $detail->amount,2) }} <span class="woocommerce-Price-currencySymbol">บาท</span></span>
                                   </td>

                               </tr>
                           @endforeach
                           </tbody>

                           <tfoot>
                           <tr>
                               <th scope="row">วิธีการชำระเงิน :</th>
                               <td>โอนเงินผ่านธนาคาร</td>
                           </tr>
                           <tr>
                               <th scope="row">ราคารวม : </th>
                               <td><span class="woocommerce-Price-amount amount">{{ number_format($order->total,2) }} <span class="woocommerce-Price-currencySymbol">บาท</span></span></td>
                           </tr>
                           </tfoot>
                       </table>
                       <!-- .woocommerce-table -->
                   </section>
                   <!-- .woocommerce-order-details -->


               </div>
           </div>
        </div>
        <!-- .row -->
    </div>
    <!-- .col-full -->
@endsection
@section('script')
    <script>
        sessionStorage.clear();
        $('.show-cart').html('');
        $('.total-cart').html(0);
        $('.total-count').html(0);
    </script>
@endsection
