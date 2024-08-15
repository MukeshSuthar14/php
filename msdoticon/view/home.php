<?php section("content"); ?>

    <h1 class="text-center"><?php echo (isset($pageTitle) && !empty($pageTitle) ? ($pageTitle) : 'Home' ); ?></h1>
    
<?php endSection("content"); ?>

<?php extendsView("layouts/header"); ?>