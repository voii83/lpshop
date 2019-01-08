<?php

namespace app\controllers;

class ShopController extends AppController
{
    // Использование проверки в фильтре доступа AccessControl
    // В раздел могут попасть зарегистрированные пользователи у которых доступна роль accessIShop
    public function behaviors() {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['accessIShop']
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCategory()
    {
        return $this->render('category');
    }

    public function actionProduct()
    {
        return $this->render('product');
    }
}