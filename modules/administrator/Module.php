<?php

namespace app\modules\administrator;

use yii\filters\AccessControl;


class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\administrator\controllers';

    public function init()
    {
        parent::init();
    }

    // Использование проверки в фильтре доступа AccessControl
    // В раздел могут попасть зарегистрированные пользователи у которых доступна роль accessIShop
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['accessAdminPage']
                    ],
                ],
            ],
        ];
    }
}