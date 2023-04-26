<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NORSU BULLETIN &bullet; HOME</title>

    <!-- Custom fonts for this template -->
    <link href="{{URL::to('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{URL::to('css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <style>
        .navbar {
            background: rgb(253,187,45);
            background: linear-gradient(0deg, rgba(253,187,45,1) 0%, rgba(245,218,80,1) 100%);
            box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.75);
            -webkit-box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.75);
        }

        .navbar-brand img {
            width: 50px;
            height: 50px;
        }

        .navbar-brand span {
            margin-top: 12px;
        }

        .image {
            overflow: hidden;
            background-color: #333;
        }

        .card .image img {
            margin: 0 auto;
            transition: transform 1s;
        }

        .card .image img:hover {
            transform: scale(1.25);
        }

        .card-content {
            position: relative;
            padding-bottom: 30px;
        }

        .card-footer {
            position: absolute;
            width: 100%;
            bottom: 0;
            background-color: rgb(238, 206, 40);
        }

        .cover {
            background-size: cover;
            background-position: center center;
            height: 500px;
        }

        #navbar-expand .btn {
            height: 35px;
            border: 0;
            padding-top: 5px;
            border-radius: 0;
            margin-top: 2px;
        }

        @media (min-width:576px) {
            .card .image img {
                max-height: 30vh;
            }
        }
    </style>
</head>

<body class="bg-dark">
    <div class="navbar navbar-expand-sm text-light px-3 sticky-top">
        <div class="container-fluid">
            <a href="{{ route('home') }}" class="navbar-brand">
                <img src="{{URL::to('img/norsu.png')}}">
                <span class="d-inline-block align-text-middle">NORSU BULLETIN</span>
            </a>

            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar-expand">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div id="navbar-expand" class="collapse navbar-collapse justify-content-center justify-content-md-end text-center">
                <div class="navbar-nav">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                    <a href="{{ route('news') }}" class="nav-link">News</a>
                    <a href="#" class="nav-link">About</a>
                    <a href="{{ url('/login') }}" class="btn btn-outline-primary px-3">Login</a>
                </div>
            </div>
        </div>
    </div>

    <div id="carousel-ride" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carousel-ride" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carousel-ride" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carousel-ride" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div style="background-image: url({{ URL::to('img/cover0.jpg') }});" class="cover w-100"></div>
                <div class="carousel-caption">
                    <h5>Lorem ipsum dolor.</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, quidem?</p>
                </div>
            </div>
            <div class="carousel-item">
                <div style="background-image: url({{ URL::to('img/cover1.jpg') }});" class="cover w-100"></div>
                <div class="carousel-caption">
                    <h5>Lorem ipsum dolor.</h5>
                    <p>Lorem50  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, quidem?</p>
                </div>
            </div>
            <div class="carousel-item">
                <div style="background-image: url({{ URL::to('img/cover2.jpg') }});" class="cover w-100"></div>
                <div class="carousel-caption">
                    <h5>Lorem ipsum dolor.</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, quidem?</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-ride" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel-ride" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>

    <div class="container-fluid p-3 border bg-gradient-light">
        <h1 class="text-center">Latest news</h1>

        @foreach($bulletins as $bull)
        <div class="card mb-3">
            <div class="row g-0">
                <div class="image col-12 col-sm-3 d-flex align-items-center">
                    <img src="{{URL::to('cover')}}/{{$bull->image}}" class="img-fluid rounded-start w-100" alt="...">
                </div>
                <div class="card-content col-12 col-sm-9">
                    <div class="card-body">
                        <h5 class="card-title">{{$bull->title}}</h5>
                        <p class="card-text">
                            {!! $bull->description !!}
                            <span><a href="{{ route('show_news', $bull->id) }}" class="text-decoration-none">Read more</a></span>
                        </p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text"><small class="text-body-secondary">Last updated / created at {{$bull->created_at->toDayDateTimeString()}}</small></p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <div class="text-center">
            <a href="{{ route('news') }}" class="btn btn-lg btn-warning">View all news</a>
        </div>
    </div>

    <div class="container-fluid p-3 p-sm-5 bg-gradient-dark text-light">
        <span class="d-block text-center small">&copy; 2023 NORSU BAIS, All rights reserved</span>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{URL::to('vendor/jquery/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
