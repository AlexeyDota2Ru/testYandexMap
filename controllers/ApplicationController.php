<?php


namespace app\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\ApplicationForm;

class ApplicationController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ]
            ]
        ];
    }

    /**
     * Displays application form
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new ApplicationForm();

        $model->city = "город (Ростовская область)";
        $model->fullName = Yii::$app->user->identity->full_name;

        if($model->load(Yii::$app->request->post()) && $model->saveApplication()) {
            $this->goHome();
        }

        return $this->render('index', [
            'model' => $model
        ]);
    }
}