<?php
if (isset($errors)) {
    ?>
    <ul class="text-danger">
        <?php
        foreach ($errors as $error) {
            ?>
            <li><?php echo $error ?></li>
            <?php
        }
        ?>
    </ul>
    <?php
}

if (isset($message)) {
    ?>
    <p class="text-success"><?php echo $message ?></p>
    <?php
}