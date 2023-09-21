<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-light bg-light m-2">
        <div class="container">
            <a href="#" class="navbar-brand mb-0 h1">
                <img class="d-inline-block align-top" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30"/>
                Navbar 
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
                        <a href="<?php echo e(url('/qrscan')); ?>" class="nav-link">
                            Qr code
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(url('/liststudents')); ?>" class="nav-link">
                            Liste Sortie
                        </a>
                    </li>

                </ul>
            </div>
            <?php if(Auth::check()): ?>
            <?php else: ?>
            <div class="d-flex">
                <ul class="navbar-nav">
                <li><a href="<?php echo e(route('login')); ?>" class="dropdown-item">
                        se connecter
                    </a></li>
                </ul>
            </div>
           <?php endif; ?>
        </div>
    </nav>
    <div class="container">
        <img src="<?php echo e(url('/imagecss/img1.jpg')); ?>" alt="">
    </div>
</body>
</html><?php /**PATH C:\wamp\www\Laravel9\gestion_sortie\resources\views/home.blade.php ENDPATH**/ ?>