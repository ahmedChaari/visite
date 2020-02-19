<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Erreur - {{ env('APP_NAME') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-theme.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
    <style type="text/css">
		.modal-header{
			color:red;
			font-weight:bold;
			font-size:18px;
			border:none;
			padding-bottom:0px;
		}
    </style>
</head>
<body>
    <div id="container" class="container">
		<!-- content depend on each section called from bootstrap and routes -->
		<div class="row">
            <div class="col-sm-10 col-md-8 col-lg-8 container" style="margin: 15px auto;float:none;">
                  <div class="span6">
                      <div class="" id="loginModal">
                        <div class="modal-header">
						  <div class="col-sm-5">{{ env('APP_ORG_NAME',"Chambre des représentants") }}</div>
						  <div class="col-sm-3">
							<img src="{{ asset('/img/coat-small.png') }}" width="75px">
						  </div>
						  <div class="col-sm-4">{{ env('APP_NAME') }}</div>
						  <div class="col-sm-12 text-center" style="color:#003366;">
							Erreur
						  </div>
                        </div>
                        <div class="modal-body">
							@yield('content')
						</div>
                  </div>
              </div>
          </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('/js/jquery-1.11.2.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/bootstrap.js') }}"></script>
</body>
</html>