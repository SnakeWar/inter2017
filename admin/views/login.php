<?php

use controllers\SiteController;

foreach (SiteController::login() as $item) {
    $$item = $item;
}

/** @var $model \models\LoginForm */
?>


<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel">
            <div class="panel-body">
                <form>
                    <div class="form-group">
                        <div class="control-label">
                            <?= $model->getLabel('email') ?>
                        </div>
                        <input class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="control-label">
                            <?= $model->getLabel('password') ?>
                        </div>
                        <input class="form-control">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Entrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
