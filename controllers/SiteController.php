<?php

namespace app\controllers;


use app\models\Application;
use yii\web\Controller;


class SiteController extends Controller
{

    /**
     * Displays home page.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'markers' => json_encode(Application::find()->with(['user'])->asArray()->all()),
        ]);
    }
}
