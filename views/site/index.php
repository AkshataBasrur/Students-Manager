<?php
use yii\helpers\html;   
/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>
</head>
<body>
<?php if(yii::$app->session->hasFlash('message')): ?>
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <?php echo yii::$app->session->getFlash('message'); ?>
    </div>
<?php endif; ?>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">ID </th>
            <th scope="col">First name </th>
            <th scope="col">Last name </th>
            <th scope="col">Email address </th>
            <th scope="col">Photo </th>
            <th scope="col">Marks </th>
            <th scope="col">Status </th>
        </tr>
    </thead>
    <tbody>
        <?php if(count($studinfo)>0): ?>
        <?php foreach($studinfo as $sinfo): ?>
        <tr class="type-active">
            <th class="row"><?php echo $sinfo->id; ?> </th>
            <td> <?php echo $sinfo->fname; ?> </td>
            <td> <?php echo $sinfo->lname; ?> </td>
            <td> <?php echo $sinfo->email; ?> </td>
            <td> <?php echo $sinfo->picture; ?> </td>
            <td> <?php echo $sinfo->marks; ?> </td>
            <td> <?php echo $sinfo->status; ?> </td>
            <td>
                <span> <?= Html::a('View', ['view','id'=> $sinfo->id], ['class'=>'label label-primary']) ?></span>
                <span> <?= Html::a('Update', ['update','id'=> $sinfo->id], ['class'=>'label label-default']) ?></span>
                <span> <?= Html::a('Delete', ['delete','id'=> $sinfo->id], ['class'=>'label label-danger']) ?></span> 
            </td>
        </tr>
<?php endforeach; ?>
        <?php else: ?>
        <tr>
            <td> No Records found </td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>
</body>
</html>