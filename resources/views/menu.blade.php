<!DOCTYPE html>
<html lang="ar" dir="rtl"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>kuşoğlu künefe</title>  
	<link rel="shortcut icon" href="{{asset('myfront/images/kusoglu-logo.png')}}" type="image/x-icon">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('myfront/css/bootstrap.min.css')}}">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('myfront/css/style.css')}}">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('myfront/css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('myfront/css/custom.css')}}">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="{{route('index')}}">
					<img src="{{asset('myfront/images/kusoglu-logo.png')}}" height="" width="" alt="" />
				</a>
			
			<h1 style="font-size: 30px;">  kuşoğlu künefe</h1>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<!-- Start All Pages -->

	<!-- End All Pages -->
	
	<!-- Start Menu -->

	<div class="menu-box" >
		<div class="container">
		
			<div class="row" >
				<div class="col-lg-12 main-nav">
					<div class="special-menu text-center">
						<div class="button-group filter-button-group">
							<button class="active" data-filter="*">جميع النتجات</button>
							@foreach ($categories as $category)
							<button data-filter=".{{$category->category}}">{{$category->category}}</button>

							@endforeach
					

						</div>
					</div>
				</div>
			</div>
			@if (session('success'))
			<div class="alert alert-success" style="text-align: center; font-weight: 400px">{{session('success')}}</div>
			@endif
			@if (session('field'))
			<p class="invalid-feedback d-block" style="text-align: center; font-size: 20px">{{session('field')}}</p>
			@endif

			@error('quantity.*')
			<p class="invalid-feedback d-block" style="text-align: center; font-size: 20px"> {{$message}}</p>
			@enderror
			@error('product_id')
			<p class="invalid-feedback d-block" style="text-align: center; font-size: 20px"> {{$message}}</p>
			@enderror
			@error('table')
			<p class="invalid-feedback d-block" style="text-align: center ;font-size: 20px"> {{$message}}</p>
			@enderror
			<div class="row special-list rtl">
				<form action="{{route('order.store')}} " method="POST">

				@foreach ($categories as $category)
					@foreach ($category->product as $product)
						
				<div class="col-lg-4 col-md-6 special-grid {{$category->category}}">
					<div class="gallery-single fix">
						<img src="{{$product->image_product}}" class="img-fluid" alt="Image">
						<div class="name-product">
							<h3 class="h2 p-0 m-0">{{$product->name}}</h3>
							<span> اضغط للطلب ب{{$product->price}} ريال</span>
						</div>
						<div class="why-text">
							<h5>{{$product->name}}</h5>
							<h6 style="font-size: 20px; color: rgb(255, 255, 255);">{{$product->price}} ريال</h6>
								@csrf
								<div class="form-group">
								<label for="number">الكمية</label>
								<input class="nummber" style="margin-right: 6px;" name="quantity[]"   type="number">
								<br>

								{{-- <label for="number">أطلب</label>
								<input type="checkbox" name="product_id[]"  value="{{$product->id}}" class="form-control" style="" > --}}
								
								<div class="form-check">
									<label class="form-check-label h4" for="flexCheckDefault">
										أطلب
									</label>
									<input class="form-check-input "  name="product_id[]"  value="{{$product->id}}" type="checkbox"  id="flexCheckDefault">

								  </div>

							</div>

						</div>
					</div>
				</div>
				@endforeach

				@endforeach					
				<div class="form-group send-order ">
					<label for="number">رقم الطاولة</label>
					<input type="number" class="from-control" required  name="table" id="">
					<input type="submit" class="form-control confirm btn btn-success" >
				</div>
			</form>

			
				
			</div>
		</div>
	</div>
	<!-- End Menu -->
	
	
		
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">All Rights Reserved. &copy; 2021 <a href="#">kuşoğlu künefe</a> Design By : 
					<a href="https://html.design/">html design</a></p>
					</div>
				</div>
			</div>
		</div>
		
	</footer>
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

	<!-- ALL JS FILES -->
	<script src="{{asset('myfront/js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('myfront/js/popper.min.js')}}"></script>
	<script src="{{asset('myfront/js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUGINS -->
	<script src="{{asset('myfront/js/jquery.superslides.min.js')}}"></script>
	<script src="{{asset('myfront/js/images-loded.min.js')}}"></script>
	<script src="{{asset('myfront/js/isotope.min.js')}}"></script>
	<script src="{{asset('myfront/js/baguetteBox.min.js')}}"></script>
	<script src="{{asset('myfront/js/form-validator.min.js')}}"></script>
    <script src="{{asset('myfront/js/contact-form-script.js')}}"></script>
    <script src="{{asset('myfront/js/custom.js')}}"></script>
</body>
</html>