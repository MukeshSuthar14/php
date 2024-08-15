<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo (isset($pageTitle) && !empty($pageTitle) ? ($pageTitle) : 'Home' ); ?> | <?php echo SITE_TITLE; ?></title>

    <link href="<?php echo asset('css/bootstrap.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo asset('js/bootstrap.bundle.min.js'); ?>"></script>

    <link rel="shortcut icon" href="<?php echo asset('images/msdoticon.png'); ?>" type="image/x-icon">

    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
    </style>

</head>
<body>
    <div class="p-1 bg-white d-flex justify-content-between">
        <div class="p-3">
            <img src="<?php echo asset('images/msdoticon.png'); ?>" alt="<?php echo SITE_TITLE; ?>" style="height: 100px;"/>
        </div>
        <div class="text-center p-5">
            
        </div>
        <div class="text-center p-3">
            <h1 class="text-white"> <span style="color: lightblue;">MS</span><span style="color: black;">DOT</span><span style="color: red;">ICON</span></h1>
            <p class="text-white"> <span style="color: black;">Jr.</span> <span style="color: lightblue;">PHP</span> <span style="color: red;">Developer</span></p>
        </div>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link <?php echo (isset($pageTitle) && $pageTitle === 'Home' ? 'active' : '') ?>" href="index.html"><?php echo trans('home'); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo (isset($pageTitle) && $pageTitle === 'About Us' ? 'active' : '') ?>" href="about-us"><?php echo trans('about-us'); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo (isset($pageTitle) && $pageTitle === 'Contact Us' ? 'active' : '') ?>" href="contact-us"><?php echo trans('contact-us'); ?></a>
            </li>
            <?php /* ?>
            <li class="nav-item">
                <a class="nav-link disabled" href="#"><?php echo trans('disabled'); ?></a>
            </li>
            <?php */ ?>
        </ul>
    </div>
    </nav>

    <?php echo block('content'); ?>

    <div class="mt-5 p-4 bg-dark text-white d-flex justify-content-between">
        <div class="p-3">
            <img src="<?php echo asset('images/msdoticon.png'); ?>" alt="<?php echo SITE_TITLE; ?>" style="height: 100px;"/>
        </div>
    </div>
</body>
</html>
