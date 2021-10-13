<!DOCTYPE html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tìm việc làm, tìm việc nhanh, tìm việc làm 24h nhanh hiệu quả - Job KayG</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<meta name="author" content="CreativeLayers">

<!-- Styles -->
<link rel="stylesheet" type="text/css" href="{{ $publicUrl }}/css/bootstrap-grid.css" />
<link rel="stylesheet" href="{{ $publicUrl }}/css/icons.css">
<link rel="stylesheet" href="{{ $publicUrl }}/css/animate.min.css">
<link rel="stylesheet" type="text/css" href="{{ $publicUrl }}/css/style.css" />
{{--  <link rel="stylesheet" type="text/css" href="{{ $publicUrl }}/css/alertmess.css" />  --}}
<link rel="stylesheet" type="text/css" href="{{ $publicUrl }}/css/responsive.css" />
<link rel="stylesheet" type="text/css" href="{{ $publicUrl }}/css/chosen.css" />
<link rel="stylesheet" type="text/css" href="{{ $publicUrl }}/css/colors/colors.css" />
<link rel="stylesheet" type="text/css" href="{{ $publicUrl }}/css/bootstrap.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css
">
{{--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />  --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
{{--  <style>
	.c-logo img {
		max-width: 76%;
	}
	/* ======= Toast message ======== */

	#toast {
	position: fixed;
	top: 32px;
	right: 32px;
	z-index: 999999;
	}

	.toast {
	display: flex;
	align-items: center;
	background-color: #fff;
	border-radius: 2px;
	padding: 20px 0;
	min-width: 400px;
	max-width: 450px;
	border-left: 4px solid;
	box-shadow: 0 5px 8px rgba(0, 0, 0, 0.08);
	transition: all linear 0.3s;
	}

	@keyframes slideInLeft {
	from {
		opacity: 0;
		transform: translateX(calc(100% + 32px));
	}
	to {
		opacity: 1;
		transform: translateX(0);
	}
	}

	@keyframes fadeOut {
	to {
		opacity: 0;
	}
	}

	.toast--success {
	border-color: #47d864;
	}

	.toast--success .toast__icon {
	color: #47d864;
	}

	.toast--info {
	border-color: #2f86eb;
	}

	.toast--info .toast__icon {
	color: #2f86eb;
	}

	.toast--warning {
	border-color: #ffc021;
	}

	.toast--warning .toast__icon {
	color: #ffc021;
	}

	.toast--error {
	border-color: #ff623d;
	}

	.toast--error .toast__icon {
	color: #ff623d;
	}

	.toast + .toast {
	margin-top: 24px;
	}

	.toast__icon {
	font-size: 24px;
	}

	.toast__icon,
	.toast__close {
	padding: 0 16px;
	}

	.toast__body {
	flex-grow: 1;
	}

	.toast__title {
	font-size: 16px;
	font-weight: 600;
	color: #333;
	}

	.toast__msg {
	font-size: 14px;
	color: #888;
	margin-top: 6px;
	line-height: 1.5;
	}

	.toast__close {
	font-size: 20px;
	color: rgba(0, 0, 0, 0.3);
	cursor: pointer;
	}

</style>  --}}
<body class="newbg">
<div id="toast"></div>
<div class="page-loading">
<img src="{{ $publicUrl }}/images/loader.gif" alt="" />
 {{--  <img src="https://media.giphy.com/media/feN0YJbVs0fwA/giphy.gif" alt="">   --}}
</div>
<div class="theme-layout" id="scrollup">
<div class="responsive-header">
<div class="responsive-menubar">
<div class="res-logo"><a href="{{ route('job.index.index') }}" title=""><img src="{{ $publicUrl }}/images/resource/logo.png" alt="" /></a></div>
<div class="menu-resaction">
<div class="res-openmenu">
<img src="{{ $publicUrl }}/images/icon.png" alt="" /> Menu
</div>
<div class="res-closemenu">
<img src="{{ $publicUrl }}/images/icon2.png" alt="" /> Đóng
</div>
</div>
</div>
<div class="responsive-opensec">
<!-- Header Left -->
@include('templates.job.header-left')
<!-- END HEADER LEFT -->
<form class="res-search">
<input type="text" placeholder="Tiêu đề công việc, vị trí, địa điểm làm việc..." />
<button type="submit"><i class="la la-search"></i></button>
</form>
<div class="responsivemenu">
@include('templates.job.header-menu')
</div>
</div>
</div>
<header class="stick-top forsticky new-header">
<div class="menu-sec">
<div class="container">
<div class="logo">
<a href="{{ route('job.index.index') }}" title="">
	<img class="hidesticky" src="{{ $publicUrl }}/images/resource/logo.png" alt="" />
	<img class="showsticky" src="{{ $publicUrl }}/images/resource/logo10.png" alt="" /></a>
</div><!-- Logo -->
<style>
	.my-profiles-sec > span{
		color: black;
	}
	.bg-color, .post-job-btn, .account-popup .close-popup, .blog-metas a::before {
    	color: black;
}
</style>
<!-- Header Left -->
@include('templates.job.header-left')
<!-- END HEADER LEFT -->
<style>
	.menu-sec nav {
	    float: none;
	    /*margin-right: 20px;
	    margin-top: 0px;*/
	}
</style>
<nav>
@include('templates.job.header-menu')
</nav><!-- Menus -->
</div>
</div>
</header>