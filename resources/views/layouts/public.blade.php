<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>{{ env('APP_NAME') }}</title>
    <meta name="keywords" content="">
    <center> <link rel="icon" type="image/png" href="{{ asset('/img/logo.png') }}"></center> 
     
	 


	
	

 <!-- jquery -->

 <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   
      
<!-- css -->

		<link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-theme.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-override.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/fontawesome.css') }}" >
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/solid.css') }}" >
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}" >

    
	<!-- /css -->

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

.coat img{
	margin: 6px;
	display: inline-block;
}

.header-left-text{
	display: inline-block;
	float: right;
	font-weight: bold;
	margin: 10px;
	margin-top: 20px;
}

.footer {
    position: relative;
    bottom: 0;
    width: 100%;
    height: auto;
    /*background-color: #f5f5f5;*/
    padding-top: 10px;
}

.ui-datepicker table {
	font-size: 0.7em !important;
}



</style>

<body>
	<div class="container" id="container">
		<div class="row">
			@include( 'layouts.header' )
		    @yield('content')	
			@include('sweet::alert')
		</div>
	</div>
		@include( 'layouts.footer' )
	
 <!-- jquery -->

	<script type="text/javascript" src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="{{ asset('/js/bootstrap.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/jquery-ui_1.11.2.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/jquery.ui.datepicker-ar.js') }}"></script>
	<script src="{{ asset('/js/toastr.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    @toastr_js
    @toastr_render

<script>
  @if(Session::has('success'))
    toastr.success('{{ Session::get('success') }}');
  @endif
</script>


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
			$("#date_ar_bibl").datepicker({
				minDate: 1
					});
			});



!function(e){
	var t=function(t,
	n){
		this.$element=e(t),
		this.type=this.$element.data("uploadtype")||(this.$element.find(".thumbnail").length>0?"image":"file"),
		this.$input=this.$element.find(":file");if(this.$input.length===0)return;this.name=this.$input.attr("name")||n.name,
		this.$hidden=this.$element.find('input[type=hidden][name="'+this.name+'"]'),
		this.$hidden.length===0&&(this.$hidden=e('<input type="hidden" />'),
		this.$element.prepend(this.$hidden)),
		this.$preview=this.$element.find(".fileupload-preview");var r=this.$preview.css("height");this.$preview.css("display")!="inline"&&r!="0px"&&r!="none"&&this.$preview.css("line-height",
		r),
		this.original={
			exists:this.$element.hasClass("fileupload-exists"),
			preview:this.$preview.html(),
			hiddenVal:this.$hidden.val()
		},
		this.$remove=this.$element.find('[data-dismiss="fileupload"]'),
		this.$element.find('[data-trigger="fileupload"]').on("click.fileupload",
		e.proxy(this.trigger,
		this)),
		this.listen()
	};t.prototype={
		listen:function(){
			this.$input.on("change.fileupload",
			e.proxy(this.change,
			this)),
			e(this.$input[
				0
			].form).on("reset.fileupload",
			e.proxy(this.reset,
			this)),
			this.$remove&&this.$remove.on("click.fileupload",
			e.proxy(this.clear,
			this))
		},
		change:function(e,
		t){
			if(t==="clear")return;var n=e.target.files!==undefined?e.target.files[
				0
			]:e.target.value?{
				name:e.target.value.replace(/^.+\\/,
				"")
			}:null;if(!n){
				this.clear();return
			}this.$hidden.val(""),
			this.$hidden.attr("name",
			""),
			this.$input.attr("name",
			this.name);if(this.type==="image"&&this.$preview.length>0&&(typeof n.type!="undefined"?n.type.match("image.*"):n.name.match(/\.(gif|png|jpe?g)$/i))&&typeof FileReader!="undefined"){
				var r=new FileReader,
				i=this.$preview,
				s=this.$element;r.onload=function(e){
					i.html('<img src="'+e.target.result+'" '+(i.css("max-height")!="none"?'style="max-height: '+i.css("max-height")+';"':"")+" />"),
					s.addClass("fileupload-exists").removeClass("fileupload-new")
				},
				r.readAsDataURL(n)
			}else this.$preview.text(n.name),
			this.$element.addClass("fileupload-exists").removeClass("fileupload-new")
		},
		clear:function(e){
			this.$hidden.val(""),
			this.$hidden.attr("name",
			this.name),
			this.$input.attr("name",
			"");if(navigator.userAgent.match(/msie/i)){
				var t=this.$input.clone(!0);this.$input.after(t),
				this.$input.remove(),
				this.$input=t
			}else this.$input.val("");this.$preview.html(""),
			this.$element.addClass("fileupload-new").removeClass("fileupload-exists"),
			e&&(this.$input.trigger("change",
			[
				"clear"
			]),
			e.preventDefault())
		},
		reset:function(e){
			this.clear(),
			this.$hidden.val(this.original.hiddenVal),
			this.$preview.html(this.original.preview),
			this.original.exists?this.$element.addClass("fileupload-exists").removeClass("fileupload-new"):this.$element.addClass("fileupload-new").removeClass("fileupload-exists")
		},
		trigger:function(e){
			this.$input.trigger("click"),
			e.preventDefault()
		}
	},
	e.fn.fileupload=function(n){
		return this.each(function(){
			var r=e(this),
			i=r.data("fileupload");i||r.data("fileupload",
			i=new t(this,
			n)),
			typeof n=="string"&&i[
				n
			]()
		})
	},
	e.fn.fileupload.Constructor=t,
	e(document).on("click.fileupload.data-api",
	'[data-provides="fileupload"]',
	function(t){
		var n=e(this);if(n.data("fileupload"))return;n.fileupload(n.data());var r=e(t.target).closest('[data-dismiss="fileupload"],[data-trigger="fileupload"]');r.length>0&&(r.trigger("click.fileupload"),
		t.preventDefault())
	})
}(window.jQuery)


   </script>
	
	@yield('script')
</body>
</html>