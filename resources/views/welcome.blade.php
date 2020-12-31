<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>
    </head>
    <body class="antialiased welcome">

        <nav class="navbar navbar-expand-lg navbar-light  fixed-top" id="home">
            <div class="container">
                <a class="navbar-brand  main-color" href="#home"><img src="{{ asset('images/logo.png') }}" width="40px" /></a> <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                       <li class="nav-item active">
                           <a class="nav-link" href="#home">Home</a>
                       </li>
                       <li class="nav-item">
                        <a class="nav-link" href="#apropos">A PROPOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#notreHistoire">Notre Histoire</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#notreMession">Notre Mession</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#notreCommunaute">Notre Communauté</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contacter nous</a>
                        </li>
                    </ul>
                    @if (Route::has('login'))
                    @auth
                    <ul class="navbar-nav ml-auto list-unstyled">
                        <li class="nav-item list-unstyled ">
                            <a href="{{ url('/dashboard') }}" class="nav-link text-light">Dashboard</a>
                        </li>
                        @else
                        <li class="nav-item list-unstyled " >
                            <a href="{{ route('login') }}" class="nav-link text-light">Login</a>
                        </li>
                    </ul>
                    @endauth
                    @endif
                </div>
            </div>
        </nav>

        <div class="carousel slide" data-ride="carousel" id="carouselExampleIndicators">
            <div class="coverly bg-shape"></div>
            <ol class="carousel-indicators">
                <li class="active" data-slide-to="0" data-target="#carouselExampleIndicators"></li>
                <li data-slide-to="1" data-target="#carouselExampleIndicators"></li>
                <li data-slide-to="2" data-target="#carouselExampleIndicators"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img alt="First slide" class="d-block w-100 zoominheader" src="{{ asset('images/slide_active.jpg') }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="animated bounceInRight" style="animation-delay: 1s">A Propos</h5>
                        <p class="animated bounceInLeft" style="animation-delay: 2s">
                            Une plate-forme électronique intégrée spécialisée dans le commerce électronique, fournissant une centrale des risques dont les e-commerçants et les entrepreneurs ont besoin, nécessaire pour avoir un taux très bas de retour marchandise et le développement de votre affaire. Stop-Retour est un service en ligne simple et facile à la disposition de tous pour gérer votre business en ligne de manière professionnelle.
                        </p>
                        <p class="animated bounceInRight" style="animation-delay: 3s"><a class="main-bg-color" href="#apropos">Plus d'information</a></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img alt="Second slide" class="d-block w-100 zoominheader" src="{{ asset('images/slide_2.jpg') }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="animated slideInDown" style="animation-delay: 1s">Notre Histoire</h5>
                        <p class="animated fadeInUp" style="animation-delay: 2s">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollit</p>
                        <p class="animated zoomIn" style="animation-delay: 3s"><a class="main-bg-color" href="#">Achter</a></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img alt="Third slide" class="d-block w-100 zoominheader" src="{{ asset('images/slide_3.jpg') }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="animated zoomIn" style="animation-delay: 1s">Register now</h5>
                        <p class="animated fadeInLeft" style="animation-delay: 2s">Register with us for ....</p>
                        <p class="animated zoomIn" style="animation-delay: 3s"><a class="main-bg-color" href="{{ route('register') }}">Register</a></p>
                    </div>
                </div>
            </div><a class="carousel-control-prev" data-slide="prev" href="#carouselExampleIndicators" role="button"><span aria-hidden="true" class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" data-slide="next" href="#carouselExampleIndicators" role="button"><span aria-hidden="true" class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
        </div>

        <!-- A propos-->
        <div class="container mt-5 py-5" id="apropos">
            <h2 class="text-center mb-5 headline">a propos</h2>
            <div class="row">
                <div class="col-md-6 d-flex align-items-center">
                    <div class="text-sm-center text-md-left">
                        <h6><i class="fas fa-store-slash aproposIcon"></i></h6>
                        <h5 class="mt-3">À propos de la plateforme Stop-Retour</h5>
                        <p class="mt-3">
                         Une plate-forme électronique intégrée spécialisée dans le commerce électronique, fournissant une centrale des risques dont les e-commerçants et les entrepreneurs ont besoin, nécessaire pour avoir un taux très bas de retour marchandise et le développement de votre affaire. Stop-Retour est un service en ligne simple et facile à la disposition de tous pour gérer votre business en ligne de manière professionnelle.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <img src="{{ asset('images/a-1.png') }}" width="100%" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Notre Histoire -->
        <div class="container mt-5 py-5" id="notreHistoire">
            <h2 class="text-center mb-5 headline"> Notre histoire </h2>
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <img src="{{ asset('images/a-2.png') }}" width="100%" />
                    </div>
                </div>
                <div class="col-md-6  d-flex align-items-center">
                    <div class="text-sm-center text-md-left">
                        <h6><i class="fas fa-landmark aproposIcon"></i></h6>
                        <h5 class="mt-3">Notre histoire</h5>
                        <p class="mt-3">
                            Le grand développement dans le domaine du commerce électronique dans le monde, nous a inspiré pour créer une plate-forme intégrée pour prévenir d’éventuels risques du retour marchandise la source de perte la plus importante pour le e-commerçant, et pour pénétrer ce marché qui se développe de jour en jour, en profitant de la grande expérience que nos équipes ont accumulé dans la pratique du commerce électronique pendant de nombreuses années. En 2020, nous avons programmé la plateforme Stop-Retour et l'avons rendue accessible à tous, la plateforme prévoit un gain de plus de 50% sur le taux de retour habituel. Nous croyons que Stop-Retour fera la différence, profitera à tous pour décoller avec leur propres business et faire plus de profit.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notre Mession -->
        <div class="container mt-5 py-5 text-center" id="notreMession">
            <h2 class="text-center mb-5 headline"> Notre Mession </h2>
            <div class="row">
                <div class="col-md-6 d-flex align-items-center">
                    <div class="text-sm-center text-md-left">
                        <h6><i class="fas fa-bullseye aproposIcon"></i></h6>
                        <h5 class="mt-3">Notre Mission</h5>
                        <p class="mt-3">
                            Notre mission est de rendre le commerce électronique facile et simple pour tous en minimisant les charges due au taux de retour marchandise élevé. Nous pensons que le commerce électronique est la solution pour offrir de nombreuses opportunités d'emploi et faire avancer la roue de l'économie. Par cela, nous avons l'intention de commencer aujourd'hui à faciliter le processus de de travail des e-commerçants en les aidants à minimiser la perte du profit, à réaliser des résultats impressionnants et de devenir un professionnel dans le monde du commerce électronique, ce qui offre de nombreuses opportunités qui changeront la vie de nombreux jeunes.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <img src="{{ asset('images/a-3.png') }}" width="100%" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Notre communauté  -->
        <div class="container mt-5 py-5 text-center" id="notreCommunaute">
            <h2 class="text-center headline"> Notre communauté</h2>
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <img src="{{ asset('images/a-1.png') }}" width="100%" />
                    </div>
                </div>
                <div class="col-md-6  d-flex align-items-center">
                    <div class="text-sm-center text-md-left">
                        <h6><i class="fas fa-people-arrows aproposIcon"></i></h6>
                        <h5 class="mt-3">Prêt à rejoindre la communauté ?</h5>
                        <p class="mt-3">
                            Une plate-forme électronique intégrée spécialisée dans le commerce électronique, fournissant une centrale des risques dont les e-commerçants et les entrepreneurs ont besoin, nécessaire pour avoir un taux très bas de retour marchandise et le développement de votre affaire. Stop-Retour est un service en ligne simple et facile à la disposition de tous pour gérer votre business en ligne de manière professionnelle.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact us -->
        <div class="imgCoverly mt-5 py-5" id="contact">
            <div class="coverly  bg-shape"></div>
            <div class="container">
                <h2 class="text-center mb-5 headline">Contacer nous</h2>
                <div class="row">
                    <div class="col-md-7">
                        <form action="#" class="d-flex flex-column" style="height:100%">
                            <div  class="row">
                                <div class="col-md-6 mb-2">
                                  <input type="text" name="name" class="form-control" placeholder="Nom complte" aria-describedby="helpId">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <input type="email" name="email" class="form-control" placeholder="Email" aria-describedby="helpId">
                                </div>
                                <div class="col-12 mb-2">
                                    <input type="tel" name="tel" class="form-control" placeholder="Téléphone" aria-describedby="helpId">
                                </div>
                            </div>
                            <div class="row  mt-auto">
                                <div class="col-12 mb-2">
                                    <textarea class="form-control" name="message" rows="3" placeholder="Message"></textarea>
                                </div>
                                <div class="col-12">
                                    <input type="submit"  class="form-control main-bg-color" value="Envoyer">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-5 text-dark">
                        <ul class="list-group">
                            <li class="list-group-item">Rabat Agdale N 201</li>
                            <li class="list-group-item">Maroc</li>
                            <li class="list-group-item"><i class="fas fa-phone"></i> +212 67 4903880</li>
                            <li class="list-group-item"><i class="fas fa-phone"></i> +212 67 6703880</li>
                            <li class="list-group-item"><i class="fas fa-envelope"></i> contact@gestiondc.com</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <footer class="text-light">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-sm-6">
                        <p  style="margin-bottom: 0 !important">© Tous droit sont réservé 2020</p>
                    </div>
                    <div class="col-sm-6">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                        <span><i class="fab fa-instagram-square"></i></span>
                    </div>
                </div>
            </div>
        </footer>

        <a href="#" class="to-top"><i class="fas fa-chevron-up"></i></a>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/smooth-scroll.js') }}"></script>
        <script src="{{ asset('js/nice-scroll.js') }}"></script>
        <script>
            /* start use smooth scroll links */
            var scroll = new SmoothScroll('a[href*="#"]');
            /* start use nice scroll */
            $("body").niceScroll({
                cursoropacitymin:0.1,
                cursorcolor:'#debe5b',
                cursorwidth:'12px',
                cursorborder:'none',
                cursorborderradius:4,
                autohidemode:"scroll",
                zindex:"auto" | [9999]
            });

            // change color the navbar in scrolltop bigger 600 to black
            $(window).scroll(function(){
                $('nav').toggleClass('scrolledTheme',$(this).scrollTop() > 600);
            })

        </script>
    </body>
</html>
