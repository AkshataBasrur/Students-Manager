<?php
error_reporting(E_ALL);
use yii\helpers\html;
use yii\widgets\ActiveForm;

$this->title = 'YII CRUD Application';
?>

<div class="site-index">
    <H2>View Student </H2>
    <div class="body-content">
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo $studinfo->fname; ?>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo $studinfo->lname; ?>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo $studinfo->email; ?>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo $studinfo->picture; ?>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo $studinfo->marks; ?>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?php echo $studinfo->status; ?>
            </li>
        </ul>
        <div class="row">
            <a href=<?php echo yii::$app->homeUrl; ?> class="btn btn-primary">Go Back</a>
        </div>
    </div>
</div>