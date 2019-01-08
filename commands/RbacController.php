<?php

namespace app\commands;

use Yii;
use yii\console\Controller;

/**
 * Инициализатор RBAC выполняется в консоли php yii rbac/init
 */

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll(); //На всякий случай удаляем старые данные из БД...

        // Создадим роли админа и редактора новостей
        $admin = $auth->createRole('admin');
        $customer = $auth->createRole('customer');

        // запишем их в БД
        $auth->add($admin);
        $auth->add($customer);

        // Создаем разрешения.
        // Например, доступ в админку accessAdminPage и доступ в интернет магазин accessIShop
        $accessAdminPage = $auth->createPermission('accessAdminPage');
        $accessAdminPage->description = 'Доступ в админку';

        $accessIShop = $auth->createPermission('accessIShop');
        $accessIShop->description = 'Доступ в интернет магазин';

        // Запишем эти разрешения в БД
        $auth->add($accessAdminPage);
        $auth->add($accessIShop);

        // Роли «Доступ в интернет магазин» присваиваем разрешение «Покупка товара»
        $auth->addChild($customer,$accessIShop);

        // $admin наследует роль «Доступ в интернет магазин».
        $auth->addChild($admin, $accessIShop);
        // Еще $admin имеет собственное разрешение - «Доступ в админку»
        $auth->addChild($admin, $accessAdminPage);

        // Назначаем роль admin пользователю с ID 1
        $auth->assign($admin, 1);

        // Назначаем роль editor пользователю с ID 2
        $auth->assign($customer, 2);


    }
}