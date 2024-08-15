<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error | <?php echo SITE_TITLE; ?></title>

    <link rel="shortcut icon" href="<?php echo asset('images/msdoticon.png'); ?>" type="image/x-icon">
    <link href="<?php echo asset('css/bootstrap.min.css'); ?>" rel="stylesheet">
    <script src="<?php echo asset('js/bootstrap.bundle.min.js'); ?>"></script>
</head>
<body>
    <div style="display: flex;justify-content: center;align-items: center;height: <?php echo (SHOW_ERROR === true ? '80vh': '100vh'); ?>;width: 100%;">
        <img src="<?php echo asset('images/error-500.png') ?>" alt="<?php echo SITE_TITLE ?>" height="500" width="">
    </div>
    <?php if( SHOW_ERROR === true ): ?>
        <div class="text-center">
            Error Occured <br>
            <?php print($error) ?>
        </div>
        <?php endif; ?>
</body>
</html>