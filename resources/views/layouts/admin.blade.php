<!DOCTYPE html>
<html>
<head>
<html dir="rtl" lang="ar">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>{{ env('APP_NAME') }}</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-theme.css') }}">
	
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/fontawesome.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/solid.css') }}">
	
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-datetimepicker.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/jquery-ui.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
	 <!-- jquery -->
	
	 <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
    

</head>
<style>
body{
	background-image: url('{{ asset('/img/bg_header.png') }}');
}
.container{
	background-color: #fff !important;
	height: 100%;
	box-shadow: 0 0 8px 2px;
	min-height:100vh;
}
.arabPos{

	float: right !important;
	
}
.navbar-default .navbar-nav > li > a{
	color: #fcf8e3 !important;
	font-size: 17px !important;
	
    font-family: 'arial',sans-serif;
    width: 118px;
    line-height: 16px;

}
.navbar-default {

background-color: #90182b !important;
}
.navbar-default .navbar-brand {
	color: #f5f5f5 !important;
}
.navbar-default .navbar-nav > li > a:hover{
	background-color: rgba(0, 0, 0, 0.23) !important;
}
.ui-datepicker table {
	font-size: 0.7em !important;
}
</style>
<body>
	<div id="container" class="container">
		<div class="row">
        	<div class="col-sm-12" style="margin: 0px auto; float:none;">
				<!-- start navbar -->
				<!-- <h3>{{ env('APP_NAME') }}</h3> -->
				 
				<nav class="navbar navbar-default" style="margin-top:10px; ">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header arabPos">
							
							<a class="navbar-brand" href="{{ url('/') }}">
							<i class="fas fa-home"></i>
							الصفحة الرئيسية</a>
						</div>
						<div id="navbar"  class="collapse navbar-collapse">
							<ul class="nav navbar-nav arabPos">
								
							<li class="">
									<a href="{{ url('visites/bibliotheques') }}" >المكتبة</a></li>
								<li class="">
									<a href="{{ url('visites/hemicycles') }}"> قاعة الجلسات</a></li>			
								<li class="">
									<a href="{{ url('visites/pavillons') }}">مرافق البرلمان</a></li>
								
								
							</ul>
							<ul class="nav navbar-nav navbar-left">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
										
										<span class="glyphicon glyphicon-user"></span>
										<span class="hidden-sm">
										
										</span>
										
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            الخروج
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
								</li>
							</ul>
						</div>
					</div>
				</nav>
				<!-- end navbar -->
				@yield('content')
			</div>
		</div>
		</div>
		<!-- footer -->
		<div class="footer">
		@include( 'layouts.footer' )
		</div>

		
	
	

		<script type="text/javascript" src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="{{ asset('/js/jquery-ui_1.11.2.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/js/bootstrap.js') }}"></script>
		
	
		<script type="text/javascript" src="{{ asset('/js/jquery.ui.datepicker-ar.js') }}"></script>

		<script type="text/javascript">
			$(document).ready(function() {
				$("#date_ar").datepicker({
					
						});
			});
			
			$(document).ready(function() {
				$("#date_ar1").datepicker({
				
						});
			});	
			$(document).ready(function() {
				$("#date_ar2").datepicker({
				
						});
			});	
			</script>
			<script type="text/javascript">
			$(document).ready(function() {
			$("#date_ar_bibl").datepicker({
				
					});
			});

  		</script>


	@yield('script')
</body>
</html>