<h2>Пользователи</h2>

<?php foreach ($users as $user) : ?>
    <ul>
        <li><?= $user->username ?></li>
        <li><?= $user->name ?></li>
        <li><?= $user->surname ?></li>
        <li><?= $user->email ?></li>
        <li><?= $user->authAssignment->item_name ?></li>
    </ul>
<?php endforeach; ?>
