@extends('layouts.public')

@section('content')

<style>
.choice{
    padding: 29% 34%;
    background-repeat: no-repeat;
    background-size: 361px 243px
   
}
.home{
    padding-left: 4%;
    padding-top: 20%;
    padding-bottom: 14%;
}

.intro-img {
    width: 100%;
}

.row {    
    padding-right: 2%;
    padding-left: 2%;
}

.link {
    color:#fff;
    font-size: 20px;
    margin: auto;
    position: absolute;
    top: 50%;
    left: 0;
    bottom: 0;
    right: 0;
}
.link span {
    background-color: rgba(146, 115, 35, 0.83);
    padding: 14px;
    border-radius: 25px;
}

.link:hover{
    color: #fff;
}

.intro-img:hover {
    filter: drop-shadow(2px 4px 6px black);
}

</style>
    {{-- <div class="row home">
            <div class="col-md-4 to-marge text-center" style="background-image: url(http://localhost:8000/img/img4.jpg);    
                                                            height: 270px;
                                                            background-repeat: no-repeat;">
                <a href="{{ url('visites/bibliotheques/create') }}" class="align-middle">
                    الولوج إلى المكتبة
                </a>
            </div>
            <div class="col-md-4 to-marge text-center" style="background-image: url(http://localhost:8000/img/img1.jpg);    
                                                            height: 270px;
                                                            background-repeat: no-repeat;">
                <a href="{{ url('visites/hemicycles/choix') }}" class="align-middle">
                    الولوج لقاعة الجلسات
                </a>
            </div>
            <div class="col-md-4 to-marge text-center" style="background-image: url(http://localhost:8000/img/img2.jpg);    
                                                            height: 270px;
                                                            background-repeat: no-repeat;">
                <a href="{{ url('visites/pavillons/create') }}" class="align-middle">
                    الولوج إلى مرافق البرلمان
                </a>
            </div>
    </div>
    </div> --}}


        <div class="row home">
                <div class="col-md-4 text-center">
                    <img src="../public/img/img4.jpg" alt="" class="intro-img">
                    <a href="{{ url('visites/bibliotheques/create') }}" class="link">
                        <span>
                                الولوج إلى المكتبة 
                        </span>
                    </a>
                </div>
                <div class="col-md-4 text-center">
                    <img src="../public/img/img1.jpg" alt="" class="intro-img">
                    <a href="{{ url('visites/hemicycles/choix') }}" class="link">
                        <span>
                                الولوج لقاعة الجلسات
                        </span>
                    </a>
                </div>
                <div class="col-md-4 text-center">
                    <img src="../public/img/img2.jpg" alt="" class="intro-img">
                    <a href="{{ url('visites/pavillons/create') }}" class="link">
                        <span>
                                الولوج إلى مرافق البرلمان
                        </span>
                    </a>
                </div>
        </div>


                
@endsection
              