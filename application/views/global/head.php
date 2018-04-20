<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>ToDo</title>

    <!--Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!--Font Awesome-->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--Open Sans-->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600">

    <!--Stylesheet-->
    <?php if($this->router->fetch_class() == 'app') : ?>
    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/stylesheets/style.css">
    <?php else: ?>
    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/stylesheets/login.css">
    <?php endif; ?>

    <!--JQuery-->
    <script type="application/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>