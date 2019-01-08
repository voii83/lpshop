<h1>Главная</h1>

<?php // Доступ к полям модели User ?>
<p class="h2">Здравствуйте, <?= Yii::$app->user->identity->name?> <?=Yii::$app->user->identity->surname?></p>
<p class="h3">Вы имеете следующие права:</p>
<?php // проверить наличие роли Yii::$app->user->can('роль') у пользователя ?>
<ul>
    <li>Доступ к интернет магазину:
        <?php
        Yii::$app->user->can('accessIShop') ?
            $access =  '<span class="text-success">Да</span>' :
            $access =  '<span class="text-danger">Нет</span>';
        echo $access;
        ?>
    </li>

    <li>Доступ к интернет магазину с ценами:
        <?php echo "<span class='text-danger'>Неизвестно</span>"; ?>
    </li>

    <li>Доступ к интернет магазину без цен в режиме каталога:
        <?php echo "<span class='text-danger'>Неизвестно</span>"; ?>
    </li>

    <li>Доступ к админке сайта:
        <?php
        Yii::$app->user->can('accessAdminPage') ?
            $access =  '<span class="text-success">Да</span>' :
            $access =  '<span class="text-danger">Нет</span>';
        echo $access;
        ?>
    </li>

    <li>Доступ ко всей админке:
        <?php echo "<span class='text-danger'>Неизвестно</span>"; ?>
    </li>

    <li>Доступ к админке для менеджера:
        <?php echo "<span class='text-danger'>Неизвестно</span>"; ?>
    </li>

    <li>Доступ к админке для контент-менеджера:
        <?php echo "<span class='text-danger'>Неизвестно</span>"; ?>
    </li>
</ul>
<?php

if (!\Yii::$app->user->can('accessAdminPage')) {
    echo '<p class="text-danger">Вы не имеете прав администрировать сайт!</p>';
}
else {
    echo '<p class="text-success">Вы администратор!</p>';
}
?>