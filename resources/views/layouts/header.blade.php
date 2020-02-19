<style>
.header-img{
	margin:5px auto;
	display: block;
}
.logeHome{
	float: right;
    font-size: 28px;
}
.imgHea{
	display: none !important;
	}

@media (max-width: 640px) {
	.header-img img{
		width: 298px !important;
}
	

}

@media (max-width: 768px) {
	.header-img img{
		width: 298px !important;
	}
}
</style>

<div class="header">
	<div class="col-md-1 logeHome">
		<a href="{{ route('login') }}">
		<i class="fas fa-sign-in-alt"></i>
		</a>
	</div>

	<div class="col-md-11">
		<center>
			<div class="header-img">
				<a href="http://www.chambredesrepresentants.ma/" target="_blank">
				<img src="{{ asset('/img/header.jpg') }}"></a>
				
			
			</div>	
			<div class="clearfix"></div>
		</center>	
	</div>
</div>


