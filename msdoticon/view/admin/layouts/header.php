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

</head>
<body>

    <?php echo block('content'); ?>

    <div class="mt-5 p-4 bg-dark text-white text-center">
            <p>Footer</p>
        </div>
    </body>
</html>