<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAppAsset;

AdminAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="header">
        <div class="row">
            <div class="container-fluid">
                <div class="col-sm-12">
                    <div class="admin-header-title">Управление сайтом</div>
                    <?=
                    Yii::$app->user->isGuest ? (
                    ['label' => 'Войти', 'url' => ['/site/login']]
                    ) : (
                    '<div class="admin-login">'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                        'Выйти (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</div>'
                    )
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="section-main">
        <div class="row">
            <div class="container-fluid">
                <div class="col-sm-2">
                    <div class="list-group">
                        <a href="#" class="list-group-item active">
                            Управление пользователями и правами
                        </a>
                        <a href="<?=\yii\helpers\Url::to(['/administrator/user'])?>" class="list-group-item">Пользователи</a>
                        <a href="#" class="list-group-item">Роли</a>
                        <a href="#" class="list-group-item">Разрешения</a>

                    </div>
                </div>
                <div class="col-sm-10">
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                    <?= Alert::widget() ?>
                    <?= $content ?>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
