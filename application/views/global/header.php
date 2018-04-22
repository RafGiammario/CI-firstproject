<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<header>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">To<span style="color: red">Do</span> <i class="fa fa-check-circle"></i></a>
            </div>
            <div class="nav navbar-nav navbar-right">
                <div style="margin: 1em 2em;"><a href="<?= base_url().'app/logout'?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></div>
            </div>
        </div>
    </nav>
</header>
