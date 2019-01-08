<?php

namespace app\models;

use yii\base\Model;
use app\models\User;

class SignupForm extends Model
{
    public $username;
    public $password;
    public $email;
    public $name;
    public $surname;
    public $phone;

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'email' => 'Email',
            'password' => 'Пароль',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'phone' => 'Телефон',
        ];
    }

    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required', 'message' => 'Введите логин.'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Такое логин уже занят.'],
            ['username', 'string', 'min' => 4, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required', 'message' => 'Введите почту'],
            ['email', 'email', 'message' => 'Почта введена не правильно'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Такая почта уже занята.'],
            ['password', 'required', 'message' => 'Введите пароль'],
            ['password', 'string', 'min' => 6],
            ['name', 'trim'],
            ['name', 'required', 'message' => 'Введите ваше имя.'],
            ['name', 'string', 'min' => 2, 'max' => 255],
            ['surname', 'trim'],
            ['surname', 'required', 'message' => 'Введите вашу фамилию.'],
            ['surname', 'string', 'min' => 2, 'max' => 255],
            ['phone', 'trim'],
            // Добавить правила валидации для телефона
        ];
    }

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->name = $this->name;
        $user->surname = $this->surname;
        $user->phone = $this->phone;

        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }
}