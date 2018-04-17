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

    <!--Stylesheet project-->
    <link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/stylesheets/style.css">

</head>
<body>

    <section>
        <!--Form-->
        <div>
            <form method="post" action="<?= site_url('app/newToDo'); ?>">
                <input type="text" name="todo">
                <button type="submit">Save</button>
            </form>

            <?= (function_exists('validation_errors'))? validation_errors() : ''; ?>
        </div>

        <!--List-->
        <div>
            <ul>
                <?php foreach ($todos as $todo) : ?>
                <li class="<?php if($todo->completed) echo 'done'; ?>">
                    <!--Check-->
                    <div>
                        <a href="<?php echo ($todo->completed)? site_url("app/uncheck/$todo->id") : site_url("app/check/$todo->id"); ?>">
                            <?php if($todo->completed): ?>
                            <i class="fa fa-check"></i>
                            <?php endif; ?>
                        </a>
                    </div>
                    
                    <!--To Do-->
                    <div>
                        <p><?= $todo->text ?></p>
                    </div>
                    
                    <!--Buttons-->
                    <div>
                        <!--Modify-->
                        <a href="<?= site_url("app/todo/$todo->id"); ?>">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <!--Delete-->
                        <a href="<?= site_url("app/delete/$todo->id"); ?>">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
</body>
</html>