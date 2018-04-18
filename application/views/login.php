<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>ToDo</title>

    <!--Font Awesome-->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--Open Sans-->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600">

    <!--Stylesheet-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/stylesheets/login.css">

</head>
<body>

<section>
    <!--Login-->
    <div>
        <form method="post" action="<?= site_url('welcome/login'); ?>">
            <label for="email">Email*</label>
            <input type="email" name="email">
            <label for="password">Password*</label>
            <input type="password" name="password">
            <button type="submit">Login</button>
        </form>

        <?= (function_exists('validation_errors'))? validation_errors() : ''; ?>
    </div>
</section>
</body>
</html>