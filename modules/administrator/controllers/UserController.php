<?php

namespace app\modules\administrator\controllers;

use app\modules\administrator\models\User;
use yii\web\Controller;

class UserController extends Controller
{
    public function actionIndex()
    {
        $users = User::find()->with('authAssignment')->all();

        return $this->render('index', compact('users'));
    }
}