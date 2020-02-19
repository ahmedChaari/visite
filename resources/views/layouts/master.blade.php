<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title></title>

    <!-- Scripts -->


     <!-- Fonts -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
     <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
       
    <!-- Styles -->
    <style>
    #mainNavbar {
    padding-left: 50px;
    padding-top: 20px
}

.navbar-dark .navbar-brand {
    font-family: 'Source Serif Pro', serif
}

.navbar-nav .nav-link {
    font-family: 'Source Serif Pro', serif;
    font-size: 19px;
    color: white;
}

.display-4 {
    font-family: 'Source Serif Pro', serif
}

.lead {
    font-family: 'Source Serif Pro', serif
}

.navbar.scrolled {
    background: rgb(34, 31, 31);
    transition: background 500ms
}

.font-weight-light {
    font-family: 'Source Serif Pro', serif
}
.navbar-dark .navbar-nav .nav-link{
    color: white !important;
}
.navbar-dark .navbar-nav .nav-link:hover{
    BACKGROUND-COLOR: #007bff;
}
.fontHome{
    font-size: 28px;
}
.fontHome:hover{
    font-size: 28px;
    color: black;
}
.footer .btn{
    margin: 10px 7px;
    /* height: 36px; */
    width: 240px;
}

</style>

</head>
<body>

<nav id="mainNavbar" class="navbar navbar-dark navbar-expand-md py-0 fixed-top"> 
        <a href="#" class="navbar-brand">
        <i class="fa fa-home fontHome" aria-hidden="true"></i></a> 
                <button class="navbar-toggler"
                data-toggle="collapse" data-target="#navLinks"> <span class="navbar-toggler-icon"></span> 
                </button>
            <div class="collapse navbar-collapse" id="navLinks">
                <ul class="navbar-nav">  
                        <li class="nav-item"> <a href="" class="nav-link">المكتبة</a> </li>
                        <li class="nav-item"> <a href="" class="nav-link">قبة البرلمان</a> </li>
                        <li class="nav-item"> <a href="" class="nav-link">مرافق البرلمان</a> </li>
                        <li class="nav-item"><img src="" alt=""></li>
                </ul>
            </div>
</nav>
<header>
<div class="content" style="margin-top: 61px;">
    <div class="container">
        <div class="row" >
        <div class="col-md-3 arab">
                    <div class="list-group">
                        <a href="#" class="list-group-item active">إختيار نوع الزيارة</a>
                        <a href="#" class="list-group-item">الولوج إلى قبة البرلمان</a>
                        <a href="#" class="list-group-item">الولوج إلى المكتبة</a>
                        <a href="#" class="list-group-item">الولوج إلى مرافق البرلمان</a>
                    </div>
                </div>
                <div class="col-md-9" >
                        <div class="container-fluid">
                        @yield('content')
                        </div>
                </div>
                
        </div>
    </div>
</div>   
             

</header>



<section class="footer">
        
                    <p>
                        مجلس النواب ، شارع محمد الخامس ، الرباط ، المغرب - الهاتف: 0537679500/600/700
                        <br>
                        Copyright © 2019 مجلس النواب, جميع الحقوق محفوظة.  
                    </p>
          
            
</section>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
        crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous">
</script>
</body>
</html>
