<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">  

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
<script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <title><?php echo $__env->yieldContent('title', $title); ?></title>
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
                    <li class="nav-item active">
                        <a href="<?php echo e(url('/eleve')); ?>" class="nav-link active">
                            Gestion Elève
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo e(url('/classe/index')); ?>" class="nav-link">
                            Gestion des Classes
                        </a>
                    </li>
                    
                    <?php if(Auth::check()): ?>
                         <?php if(Auth::user()->rolle == "admin"): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(url('/user')); ?>" class="nav-link">
                            Gestion des Utilisateurs
                        </a>
                    </li>
                        <?php endif; ?>
                    <?php endif; ?>
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
            
            <div class="d-flex">
                <ul class="navbar-nav">
                <?php if(Auth::check()): ?>
                    <li class="nav-item dropdown">
                        
                        <a href="" class="nav-link dropdown-toggle"
                                id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">
                                    <?php echo e(Auth::user()->name); ?>

                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                           
                            <li><a href="" class="dropdown-item">
                           
                            </a></li>
                             <li><a href="<?php echo e(route('password')); ?>" class="dropdown-item">
                            change password
                            </a></li>
                            
                            <?php if(auth()->guard()->check()): ?>
                            <li><a href="<?php echo e(route('logout')); ?>" class="dropdown-item">
                                Déconnexion
                            </a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php else: ?>
                    <li><a href="<?php echo e(route('login')); ?>" class="dropdown-item">
                            Login
                    </a></li>
                    <?php endif; ?>
                </ul>
            </div>
           
        </div>
    </nav>
    <div class="container">
    <main class="py-4">
        <h1 class="text-center"><?php echo $__env->yieldContent('title', $title); ?></h1>
            <?php echo $__env->yieldContent('content'); ?>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
            <?php echo $__env->yieldContent('scripts'); ?>
    </main>
    </div>    
</body>
</html><?php /**PATH C:\wamp\www\Laravel9\gestion_sortie\resources\views/app.blade.php ENDPATH**/ ?>