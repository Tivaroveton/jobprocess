<!doctype html>
<html lang="en" dir="ltr">
	<head>
		
		@include('dashboard.head')

	</head>

	<body class="app">

		<!-- Global Loader-->
		<div id="global-loader"><img src="{{asset('external2/images/svgs/loader.svg')}}" alt="loader"></div>

		<div class="page">
			<div class="page-main">

				@include('dashboard.nav')

				@include('dashboard.menubar')
				

				<div class="container content-area">

					<!-- Content1 -->
					@include('dashboard.content1')
					<!-- Content1 End -->

					<!-- Content2 Sidebar-right-->
					@include('dashboard.content2')
					<!--Content2 Sidebar-right End-->

		@include('dashboard.footer')
		