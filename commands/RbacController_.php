<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // Добавляем разрешение accessAdminAdmin
        $accessAdminAdmin = $auth->createPermission('accessAdminAdmin');
        $accessAdminAdmin->description = 'Доступ к админке сайта для админстратора';
        $auth->add($accessAdminAdmin);

        // Добавляем разрешение accessAdminManager
        $accessAdminManager = $auth->createPermission('accessAdminManager');
        $accessAdminManager->description = 'Доступ к админке сайта для менеджера';
        $auth->add($accessAdminManager);

        // Добавляем разрешение accessAdminContentManager
        $accessAdminContentManager = $auth->createPermission('accessAdminContentManager');
        $accessAdminContentManager->description = 'Доступ к админке сайта для контент менеджера';
        $auth->add($accessAdminContentManager);

        // Добавляем разрешение accessUserStore
        $accessUserStore = $auth->createPermission('accessUserStore');
        $accessUserStore->description = 'Доступ к магазину сайта в режиме магазина';
        $auth->add($accessUserStore);

        // Добавляем разрешение accessUserCatalog
        $accessUserCatalog = $auth->createPermission('accessUserCatalog');
        $accessUserCatalog->description = 'Доступ к магазину сайта в режиме каталога';
        $auth->add($accessUserCatalog);

        // Добавляем разрешение accessUserStoreSpecialCategory
        $accessUserStoreSpecialCategory = $auth->createPermission('accessUserStoreSpecialCategory');
        $accessUserStoreSpecialCategory->description = 'Доступ к магазину сайта в режиме магазина c доступом в спец категории';
        $auth->add($accessUserStoreSpecialCategory);

        // Добавляем разрешение accessVipUserStore
        $accessVipUserStore = $auth->createPermission('accessVipUserStore');
        $accessVipUserStore->description = 'Доступ к магазину сайта в режиме магазина для Vip пользователя';
        $auth->add($accessVipUserStore);

        // Добавить роли, применить к ним разрешения с правильным наследованием

        // Добавляем роль Admin
        // Добавляем роль Manager
        // Добавляем роль ContentManager

        // Добавляем роль StoreUser
        // Добавляем роль StoreUserSpecialCategory
        // Добавляем роль StoreVipUser
        // Добавляем роль ProductCatalogUser

    }
}