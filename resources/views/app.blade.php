<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">  

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/bower_components/jquery-qrcode/jquery.qrcode.min.js"></script>
    <script src="./html5-qrcode.js"></script>

    <script src="./jsqrcode-combined.js"></script>

    <script src="https://raw.githubusercontent.com/mebjas/html5-qrcode/master/minified/html5-qrcode.min.js"></script>


            <!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<!-- Remember to include jQuery :) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <title>@yield('title', $title)</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light m-2">
        <div class="container">
            <a href="#" class="navbar-brand mb-0 h1">
                <img class="d-inline-block align-top" src="{{ url('/imagecss/img4.jpg') }}" width="40" height="40"/>
                 
            </a> 
            <button type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                class="navbar-toggler"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-lobel="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a href="{{ url('/eleve') }}" class="nav-link active">
                            Gestion Elève
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/classe/index') }}" class="nav-link">
                            Gestion des Classes
                        </a>
                    </li>
                    
                    @if(Auth::check())
                         @if(Auth::user()->rolle == "admin")
                    <li class="nav-item">
                        <a href="{{ url('/user') }}" class="nav-link">
                            Gestion des Utilisateurs
                        </a>
                    </li>
                        @endif
                    @endif
                    <li class="nav-item">
                        <a href="{{ url('/qrscan') }}" class="nav-link">
                            Qr code
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/liststudents') }}" class="nav-link">
                            Liste Sortie
                        </a>
                    </li>

                </ul>
            </div>
            
            <div class="d-flex">
                <ul class="navbar-nav">
                @if(Auth::check())
                    <li class="nav-item dropdown">
                        
                        <a href="" class="nav-link dropdown-toggle"
                                id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">
                                    {{ Auth::user()->name;}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                           
                            <li><a href="" class="dropdown-item">
                           
                            </a></li>
                             <li><a href="{{ route('password') }}" class="dropdown-item">
                            change password
                            </a></li>
                            
                            @auth
                            <li><a href="{{ route('logout') }}" class="dropdown-item">
                                Déconnexion
                            </a></li>
                            @endauth
                        </ul>
                    </li>
                    @else
                    <li><a href="{{ route('login') }}" class="dropdown-item">
                            Login
                    </a></li>
                    @endif
                </ul>
            </div>
           
        </div>
    </nav>
    
    <div class="container">
    <div id="banniere_image">
    <img  class="img-2" src="{{ url('/imagecss/img1.jpg') }}"/>
    </div>
    <main class="py-4">
    
            @yield('content')
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
            @yield('scripts')
    </main>
    
    </div>    
</body>
<style>
 .img-2   
{
    /*background: url('/imagecss/sanfrancisco.jpg') no-repeat;*/
    position: absolute;
    align-items: center;
    height: 150px;
    width: 100%;
    border-radius: 5px;
    
    /* display: block; */
    /* box-shadow: 0px 4px 4px #1c1a19; */
}
#banniere_image
{
    position: relative;
    display: flex;
    align-items: center;
    margin-top: 15px;
    margin-bottom: 15px;
    height: 150px;
    width: 100%;
}
</style>
</html>