<?php
use components\Helper;

/**
 * Created by PhpStorm.
 * User: jr
 * Date: 4/17/17
 * Time: 6:58 PM
 */

Helper::checkIfUserIsLogged();
?>

<div class="panel">
    <div class="panel-body">
        Ola <?= $_SESSION['userName'] ?>
    </div>
</div>
