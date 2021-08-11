<?php


namespace app\models;


use http\Client;
use yii\base\Model;

class ApplicationForm extends Model
{
    public $fullName;
    public $message;
    public $city;
    public $address;

    public function attributeLabels()
    {
        return [
            'message' => 'Текст заявки:',
            'city' => 'Город:',
            'address' => 'Адрес:',
            'fullName' => 'ФИО:'
        ];
    }

    public function rules()
    {
        return [
            [['message', 'address'], 'required'],
        ];
    }

    public function saveApplication()
    {
        $application = new Application();

        $application->user_id = \Yii::$app->user->id;
        $application->message = $this->message;
        $application->city = $this->city;
        $application->address = $this->address;

        return $application->save();;
    }
}