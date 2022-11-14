<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'title') ?>
    <?= $form->field($model, 'texts')->textInput(); ?>
     <?= $form->field($model, 'ctg'); ?>
    <?= $form->field($model, 'imageFile')->fileInput(); ?>
   <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']); ?>
    </div>

<?php ActiveForm::end(); ?>