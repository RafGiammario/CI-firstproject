<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>

    <!--Font Awesome-->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--Open Sans-->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600">

    <!--Stylesheet-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/stylesheets/style.css">

</head>
<body>

<section>
    <!--Form-->
    <div>
        <form method="post" action="<?= site_url('app/update'); ?>">
            <input type="hidden" name="id" value="<?= $todo->id; ?>">
            <input type="text" name="text" value="<?= $todo->text; ?>">
            <button type="submit">Update</button>
        </form>
    </div>
</section>
</body>
</html>