<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

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
