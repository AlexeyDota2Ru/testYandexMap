<?php

/**
 * @var $this yii\web\View
 * @var $model yii\models\ApplicationForm
 */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Заявка';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if(!empty($model->errors)):  ?>
        <?php foreach ($model->errors as $error): ?>
            <?= die($error)?>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'fullName')->textInput(['readonly' => true]) ?>

        <?= $form->field($model, 'message')->textarea(['placeholder' => 'Текст заявки ...']) ?>

        <?= $form->field($model, 'city')->textInput(['readonly' => true]) ?>

        <?= $form->field($model, 'address')->textInput(['placeholder' => 'Адресс ...']) ?>

        <?= Html::submitButton('Опубликовать', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>
</div>
