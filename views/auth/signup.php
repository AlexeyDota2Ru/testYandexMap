<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Пожалуйста заполните форму регистрации</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'fullName')->textInput(['autofocus' => true, 'placeholder' => 'Фио (обязательно)']) ?>

    <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email ...']) ?>

    <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Пароль ...']) ?>


    <div class="form-group">
        <div class="offset-lg-1 col-lg-11">
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
