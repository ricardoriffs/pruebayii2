<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Album;

/* @var $this yii\web\View */
/* @var $model app\models\Seccion */
/* @var $form yii\widgets\ActiveForm */
$listAlbumes=ArrayHelper::map(Album::find()->where(['usuario_id' => Yii::$app->user->getId()])->asArray()->all(), 'id', 'nombre');
?>

<div class="seccion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'orden')->textInput() ?>

    <?= $form->field($model, 'num_hojas')->textInput() ?>

    <?= $form->field($model, 'album_id')->dropDownList($listAlbumes, ['prompt'=>'--Seleccione--']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
