<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\linkPager;
use app\models\Faculty;
use app\models\Department;
use app\models\Course;
use yii\helpers\ArrayHelper;
use app\models\Student;
use kartik\select2\select2;
?>

<p><a class="btn btn-danger pull-left" href="index.php?r=course/index">View Faculty</a>  <a class="btn btn-default pull-left" href="index.php?r=student/all">View All Students</a></p>
<h2 class="page-header">Admin <a class="btn btn-default pull-right" href="index.php?r=course/index">View Courses</a>   <a class="btn btn-info pull-right" href="index.php?r=department/index">View Departments</a></h2>

<div class="admin-bar">
	
   <table class="table-responsive" >
     <tr class="admin-inner-bar1">
     <td class="admin-select1">  </td>
     <td class="admin-select" ><a href="index.php?r=student/all"><span class="student-count"><?php echo $countStudent ; ?></span><p class="student-count-text">Students</p></a></td>
     </tr>
  


     <tr class="admin-inner-bar2">
     <td class="admin-select1">  </td>
     <td class="admin-select" > <a href="index.php?r=faculty/index"><span class="student-count"><?php echo $countFaculty ; ?></span><p class="student-count-text">Faculties</p></a> </td>
     </tr>
 



     <tr class="admin-inner-bar3">
     <td class="admin-select1">  </td>
     <td class="admin-select" ><a href="index.php?r=department/index"><span class="student-count"><?php echo $countDepartment ; ?></span><p class="student-count-text">Departments</p></a>  </td>
     </tr>
   



     <tr class="admin-inner-bar4">
     <td class="admin-select1">  </td>
     <td class="admin-select" ><a href="index.php?r=course/index"><span class="student-count"><?php echo $countCourse ; ?></span><p class="student-count-text">Courses</p></a>  </td>
     </tr>
   </table>

</div>

<div class="card">
  <div class="card-header">
    <p class="card-updates">Notifications</p>
  </div>
  <div class="card-body">
    
   
   
  </div>
</div>