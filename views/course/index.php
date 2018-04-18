<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\linkPager;
?>
<h2 class="page-header">Courses<a href="index.php?r=course/create" class="btn btn-primary pull-right">Create</a> <a href="index.php?r=student/register" class="btn btn-default pull-right">Register Courses</a></h2>
<?php if(null !== yii::$app->session->getFlash('success')) : ?>
     <div class="alert alert-success"><?php echo yii::$app->session->getFlash('success'); ?></div>
<?php endif; ?>
<ul class="list-group">
 <?php foreach($courses as $course) :?>
 	<!-- &category=<?php //echo $cat->id ;?> -->
     <li class="list-group-item"><a href="index.php?r=course/details&id=<?php echo $course->course_id ;?> "> <?php echo $course->course_name ;?></a></li>
 <?php endforeach ;?>
</ul>

<?= linkPager::widget(['pagination'=>$pagination]) ; ?>