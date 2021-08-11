<?php


namespace app\models;


use yii\base\Model;

class SignupForm extends Model
{
    public $fullName;
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['fullName', 'email', 'password'], 'required'],
            ['fullName', 'string'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'app\models\User', 'targetAttribute' => 'email']
        ];
    }

    public function attributeLabels()
    {
        return [
            'fullName' => 'ФИО:',
            'email' => 'Email',
            'password' => 'Пароль',
        ];
    }

    public function signup()
    {
        if($this->validate()) {

            $user = new User();

            $user->full_name = $this->fullName;
            $user->email = $this->email;
            $user->password = $this->password;

            return $user->save(false);
        }
    }
}