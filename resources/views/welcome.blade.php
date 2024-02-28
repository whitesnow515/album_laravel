<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }}</title>
    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">
</head>

<body>  
    <!-- Header Area Start -->
    <header class="header-area">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 h-100">
                    <div class="main-menu h-100">
                        <nav class="navbar h-100 navbar-expand-lg">
                            <!-- Logo Area  -->
                            <a class="navbar-brand" href="/"><img src="img/core-img/logo.png" style="height: 50px" alt="Logo"></a>
                            @auth
                                <!-- User is logged in -->
                                <div class="collapse navbar-collapse" id="studioMenu">
                                    <!-- Menu Area Start  -->
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="/myalbum"> My Album</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Welcome, {{ auth()->user()->name }}</a>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <!-- User is not logged in -->
                                <div class="collapse navbar-collapse" id="studioMenu">
                                    <!-- Menu Area Start  -->
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="/login">Login <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/register">Register</a>
                                        </li>
                                    </ul>
                                </div>
                            @endauth
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->
    
    <!-- ***** Welcome Area Start ***** -->
    <section class="welcome-area">
        <div class="carousel h-100 slide" data-ride="carousel" id="welcomeSlider">
            <!-- Carousel Inner -->
            <div class="carousel-inner h-100">
                <div class="carousel-item h-100 bg-img active" style="background-image: url(img/bg-img/1.jpg);">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>01.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(img/bg-img/2.jpg);">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>02.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(img/bg-img/3.jpg);">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>03.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(img/bg-img/4.jpg);">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>04.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(img/bg-img/5.jpg);">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>05.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(img/bg-img/6.jpg);">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>06.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(img/bg-img/7.jpg);">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>07.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(img/bg-img/8.jpg);">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>08.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(img/bg-img/9.jpg);">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>09.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(img/bg-img/10.jpg);">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>10.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(img/bg-img/11.jpg);">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>11.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(img/bg-img/12.jpg);">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>12.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div>
                </div>
                <div class="carousel-item h-100 bg-img" style="background-image: url(img/bg-img/13.jpg);">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>13.</span>
                            <h2> Believe you can fly</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Carousel Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#welcomeSlider" data-slide-to="0" class="active bg-img" style="background-image: url(img/bg-img/1.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="1" class="bg-img" style="background-image: url(img/bg-img/2.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="2" class="bg-img" style="background-image: url(img/bg-img/3.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="3" class="bg-img" style="background-image: url(img/bg-img/4.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="4" class="bg-img" style="background-image: url(img/bg-img/5.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="5" class="bg-img" style="background-image: url(img/bg-img/6.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="6" class="bg-img" style="background-image: url(img/bg-img/7.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="7" class="bg-img" style="background-image: url(img/bg-img/8.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="8" class="bg-img" style="background-image: url(img/bg-img/9.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="9" class="bg-img" style="background-image: url(img/bg-img/10.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="10" class="bg-img" style="background-image: url(img/bg-img/11.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="11" class="bg-img" style="background-image: url(img/bg-img/12.jpg);"></li>
                <li data-target="#welcomeSlider" data-slide-to="12" class="bg-img" style="background-image: url(img/bg-img/13.jpg);"></li>
            </ol>
        </div>
    </section>

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>

</html>