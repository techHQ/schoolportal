<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\linkPager;
?>
<h2 class="page-header">Departments<a href="index.php?r=department/edit" class="btn btn-default pull-right">Update</a><a href="index.php?r=department/create" class="btn btn-primary pull-right">Create</a></h2>
<?php if(null !== yii::$app->session->getFlash('success')) : ?>
     <div class="alert alert-success"><?php echo yii::$app->session->getFlash('success'); ?></div>
<?php endif; ?>
<ul class="list-group">
 <?php foreach($departments as $department) :?>
 	<!-- &category=<?php //echo $cat->id ;?> -->
     <li class="list-group-item"><a href="index.php?r=department/details&id=<?php echo $department->depart_id ;?> "> <?php echo $department->depart_name ;?></a></li>
 <?php endforeach ;?>
</ul>

<?= linkPager::widget(['pagination'=>$pagination]) ; ?>