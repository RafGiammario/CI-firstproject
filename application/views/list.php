<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

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
    <div id="list">
        <?php if ($todos): ?>
        <ul>
            <?php foreach ($todos as $todo) : ?>
            <li class="<?php if($todo->completed) echo 'done'; ?>">
                <!--Check-->
                <div>
                    <a id="check" href="<?= ($todo->completed)? site_url("app/uncheck/$todo->id") : site_url("app/check/$todo->id"); ?>">
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
                    <!--Upload-->
                    <a class="update_btn" data-id="<?= $todo->id; ?>"href="#">
                        <i class="fa fa-upload"></i>
                    </a>
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
                <div id="update_form_<?= $todo->id; ?>" hidden>
                    <form method="post" action="<?= site_url("app/new_attachment/$todo->id") ?>" enctype="multipart/form-data">
                        <input id="file" type="file" name="file" required>
                        <button type="submit">Upload</button>
                    </form>
                </div>

                <?php if (isset($todo->attachments)): ?>
                <ul>

                    <?php foreach ($todo->attachments as $attachment) : ?>
                        <li>
                            <!--View-->
                            <div>
                                <a id="view" href="<?= base_url() . ATTACHMENTS . '/' . $attachment->attachment . $attachment->type_attachment ?>">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>

                            <!--Attachment-->
                            <div>
                                <p><?= $attachment->attachment . $attachment->type_attachment ?></p>
                            </div>

                            <!--Buttons-->
                            <div>
                                <!--Delete-->
                                <a href="<?= site_url("app/delete_attachment/$attachment->id_attachment"); ?>">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </div>

</section>