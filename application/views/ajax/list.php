<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php if ($todos): ?>
<ul>
    <?php foreach ($todos as $todo) : ?>
        <li class="<?php if($todo->completed) echo 'done'; ?>">
            <!--Check-->
            <div>
                <a id="check" href="<?php echo ($todo->completed)? site_url("app/uncheck/$todo->id") : site_url("app/check/$todo->id"); ?>">
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
                <a id="delete" href="<?= site_url("app/delete/$todo->id"); ?>">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </li>

        <li class="attachment-form">
            <div>
                <form action="<?= site_url("app/new_attachment/$todo->id") ?>" enctype="multipart/form-data">
                    <input id="file" type="file" name="file">
                    <button type="submit">Upload</button>
                </form>
            </div>

            <ul>
                <?php foreach ($todos as $todo) : ?>
                    <li>
                        <!--View-->
                        <div>
                            <a id="check" href="<?php echo ($todo->completed)? site_url("app/uncheck/$todo->id") : site_url("app/check/$todo->id"); ?>">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>

                        <!--Attachment-->
                        <div>
                            <p>-----</p>
                        </div>

                        <!--Buttons-->
                        <div>
                            <!--Delete-->
                            <a href="">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>