<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Lỗi trang 404</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers">

	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="{{ $publicUrl }}/css/bootstrap-grid.css" />
	<link rel="stylesheet" href="{{ $publicUrl }}/css/icons.css">
	<link rel="stylesheet" href="css/animate.min.css">
	<link rel="stylesheet" type="text/css" href="{{ $publicUrl }}/css/style.css" />
	<link rel="stylesheet" type="text/css" href="{{ $publicUrl }}/css/responsive.css" />
	<link rel="stylesheet" type="text/css" href="{{ $publicUrl }}/css/chosen.css" />
	<link rel="stylesheet" type="text/css" href="{{ $publicUrl }}/css/colors/colors.css" />
	<link rel="stylesheet" type="text/css" href="{{ $publicUrl }}/css/bootstrap.css" />
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
	
</head>
<body>

<div class="page-loading">
	<img src="{{ $publicUrl }}/images/loader.gif" alt="" />
</div>

<div class="theme-layout" id="scrollup">

	<section>
		<div class="block no-padding">
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="main-featured-sec witherror">
							<ul class="main-slider-sec text-arrows">
								<li><img src="{{ $publicUrl }}/images/resource/mslider3.jpg" alt="" /></li>
								<li><img src="{{ $publicUrl }}/images/resource/mslider2.jpg" alt="" /></li>
								<li><img src="{{ $publicUrl }}/images/resource/mslider1.jpg" alt="" /></li>
							</ul>
							<div class="error-sec">
								<img src="{{ $publicUrl }}/images/404.png" alt="" />
                                <span>Chúng tôi rất tiếc, không tìm thấy trang</span>
                                <p>Rất tiếc, không thể tìm thấy trang bạn đang tìm. Nó có thể tạm thời không có sẵn, đã di chuyển hoặc không còn tồn tại. Kiểm tra Url bạn đã nhập xem có lỗi nào không và thử lại.</p>
								<h6><a href="{{ route('job.index.index') }}" title="">Quay lại trang chủ</a></h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>


<script src="{{ $publicUrl }}/js/jquery.min.js" type="text/javascript"></script>
<script src="{{ $publicUrl }}/js/modernizr.js" type="text/javascript"></script>
<script src="{{ $publicUrl }}/js/script.js" type="text/javascript"></script>
<script src="{{ $publicUrl }}/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ $publicUrl }}/js/wow.min.js" type="text/javascript"></script>
<script src="{{ $publicUrl }}/js/slick.min.js" type="text/javascript"></script>

</body>

</html>

