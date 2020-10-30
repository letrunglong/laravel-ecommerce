@extends('frontend.master')
@section('title','Chi tiết sản phẩm')
@section('main')	
	<link rel="stylesheet" href="css/details.css">
					<div id="wrap-inner">
						<div id="product-info">
							<div class="clearfix"></div>
							<h3>{{$item->prod_name}}</h3>
							<div class="row">
								<div id="product-img" class="col-xs-12 col-sm-12 col-md-6 text-center">
									<img src="{{asset('lib/storage/app/avatar/'.$item->prod_img)}}">
								</div>
								<div id="product-details" class="col-xs-12 col-sm-12 col-md-6">
									<p>Giá: <span class="price">{{number_format($item->prod_price,0,',','.')}} VND</span></p>
									<p>Bảo hành: {{$item->prod_warranty}}</p> 
									<p>Phụ kiện: {{$item->prod_accessories}}</p>
									<p>Tình trạng: {{$item->prod_condition}}</p>
									<p>Khuyến mại: {{$item->prod_promotion}}</p>
										@if($item->prod_promotion == 1)
											<p> Còn hàng: Còn hàng</p>
										@else <p> Còn hàng: Hết hàng</p>
										@endif
									<p class="add-cart text-center"><a href="{{asset('cart/add/'.$item->prod_id)}}">Đặt hàng online</a></p>
								</div>
							</div>							
						</div>
						<div id="product-detail">
							<h3>Chi tiết sản phẩm</h3>
							<p class="text-justify">{!!$item->prod_description!!}</p>
						</div>
					</div>
@stop				