@extends('frontend.master')
@section('title','Tìm kiếm sản phẩm')
@section('main')
	<link rel="stylesheet" href="css/search.css">


					<div id="wrap-inner">
						<div class="products">
							<h3>Tìm kiếm với từ khóa: <span></span></h3>
							<div class="product-list row">
							@foreach($product as $item)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img src="{{asset('lib/storage/app/avatar/'.$item->prod_img)}}" class="img-thumbnail"></a>
									<p><a href="#">{{$item->prod_name}}</a></p>
									<p class="price">{{number_format($item->prod_price,0,',','.')}}</p>	  
									<div class="marsk">
										<a href="{{asset('details/'.$item->prod_id.'/'.$item->prod_slug)}}">Xem chi tiết</a>
									</div>                                    
								</div>
							@endforeach
							</div>                	                	
						</div>

					</div>
@stop