<?php ob_start(); ?>

<?php $content = ob_get_clean(); ?>

<?php include (__DIR__ . '/../../../templates/home_templates.php'); ?>