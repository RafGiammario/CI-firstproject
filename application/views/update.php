<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<section>
    <!--Form-->
    <div>
        <form method="post" action="<?= site_url('app/update'); ?>">
            <input type="hidden" name="id" value="<?= $todo->id; ?>">
            <input type="text" name="text" value="<?= $todo->text; ?>" required>
            <button type="submit">Update</button>
        </form>
    </div>
</section>
