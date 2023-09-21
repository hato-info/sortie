<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <sty src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <title>Document</title>

<style>
  #blog-page{
    width: 900px;
    margin: auto;
}
header{
    background: url('imagecss/separateur.png') repeat-x bottom;
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
}
#logo{
    display: flex;
    flex-direction: row;
    align-items: baseline;
}
#logo img{ 
    width: 41px;
    height: 40px;
}
header h1
{
    font-family: 'BallparkWeiner', serif;
    font-size: 2.5em;
    font-weight: normal;
    margin: 0 0 0 10px;
}
div h2
{
    font-family: Dayrom, serif;
    font-size: 1.1em;
    margin-top: 0px;
    font-weight: normal;
}
#banniere_image
{
    /* background: url('/imagecss/sanfrancisco.jpg') no-repeat; */
    position: relative;
    margin-top: 15px;
    margin-bottom: 25px;
    height: 150px;
    width: 100%;
    border-radius: 5px;
    box-shadow: 0px 4px 4px #1c1a19;
}

.img-2   
{
    /*background: url('/imagecss/sanfrancisco.jpg') no-repeat;*/
    position: absolute;
    align-items: center;
    height: 600px;
    width: 100%;
    border-radius: 5px;
    float: none;
    
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
    height: 600px;
    width: 100%;
}
</style>

</head>
<body>

    <nav class="navbar navbar-expand-sm navbar-light bg-light m-2">
        <div class="container">
            <a href="#" class="navbar-brand mb-0 h1">
                <!-- <img class="d-inline-block align-top" src="{{ url('/imagecss/img4.jpg') }}" width="50" height="50"/>
                Navbar  -->
                <div id="logo">
            <img src="{{ url('/imagecss/img4.jpg') }}" alt="Logo de Zozor" />
            <h2>  </h2>
        </div>
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
            @if(Auth::check())
            @else
            <div class="d-flex">
                <ul class="navbar-nav">
                <li><a href="{{ route('login') }}" class="dropdown-item">
                        se connecter
                    </a></li>
                </ul>
            </div>
           @endif
        </div>
    </nav>
    <div class="container">
    <div id="banniere_image">
    <img  class="img-2" src="{{ url('/imagecss/ecole1.png') }}"/>
    </div>  
</div>
    <!-- <div class="container">
        <img src="{{ url('/imagecss/img1.jpg') }}" alt="">
    </div> -->
    <!-- <div class="container">
            <img class="img1" src="{{ url('/imagecss/img1.jpg') }}" alt="...">
    </div> -->
       
</body>
</html>