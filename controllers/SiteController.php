<?php

namespace app\controllers;

use Yii;
use app\models\SignupForm;
use app\models\LoginForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class SiteController extends AppController
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionNews()
    {
        return $this->render('news');
    }

    public function actionVideos()
    {
        return $this->render('videos');
    }

    public function actionRecommendation()
    {
        return $this->render('recommendation');
    }

    public function actionCooperation()
    {
        return $this->render('cooperation');
    }

    public function actionContacts()
    {
        return $this->render('contacts');
    }

    public function actionLogin()
    {
        $this->setMeta('Вход');

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', compact('model'));
    }

    public function actionSignup()
    {
        $this->setMeta('Регистрация');
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }
        return $this->render('signup', compact('model'));
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}