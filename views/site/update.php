<?php
error_reporting(E_ALL);
use yii\helpers\html;
use yii\widgets\ActiveForm;

$this->title = 'YII CRUD Application';
?>

<div class="site-index">
    <H1>REGISTER </H1>
    <div class="body-content">
        <?php
            $form = ActiveForm::begin()?>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <?= $form->field($studinfo, 'fname'); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <?= $form->field($studinfo, 'lname'); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <?= $form->field($studinfo, 'email'); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <?= $form->field($studinfo, 'picture'); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <?= $form->field($studinfo, 'marks'); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <?= $form->field($studinfo, 'status'); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <div class="col-lg-3">
                        <?= Html::submitButton('Update student', ['class'=> 'btn btn-primary']);?>
                    </div>
                    <div class="col-lg-2">
                        <a href=<?php echo yii::$app->homeUrl; ?> class="btn btn-primary">Go Back</a>
                    </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>