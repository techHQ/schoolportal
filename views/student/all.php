<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Student;
use app\models\Department;


/* @var $this yii\web\View */
/* @var $model app\models\Student */
/* @var $form ActiveForm */
?>

 <h2 class="page-header" >All Students <a  class="btn btn-info pull-right" href="index.php?r=admin/index">Back to Admin</a> </h2>





<table class="table table-responsive table-hover">
 <tr class="info">
 
 <th>Name</th>
 <th>Middlename</th>
 <th>Lastname</th>
 <th>Faculty</th>
 <th>Department</th>
 <th>Courses</th>
 <th>Status</th>
 <th>Action</th>
 </tr>
 <?php if(!empty($student)): ?>
<?php foreach ( $student as $student ) : ?>
<tr class="table-row-color">



<td>    <?=  $student->firstname  ?>                    </td>
<td>    <?=  $student->middlename ?>                    </td>
<td>    <?=  $student->lastname   ?>                    </td>
<td>    <?=  $student->faculty->faculty_name   ?>       </td>
<td>    <?=  $student->department->depart_name   ?>     </td>
<td>     <?=  $student->course->course_name   ?>        </td>
<td>       <?= $student->status ?>                      </td>

<td>   
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li>
                <a href="index.php?r=student/details&id=<?php echo $student->student_id ; ?>">View</a>
            </li>
            <li>
                <a href="delete?id=">Withdraw</a>
            </li>
             <li>
                <a href="index.php?r=student/edit&id=<?php echo $student->student_id ; ?>">Approve/Disapprove</a>
            </li>
        </ul>
    </div>  

</td>
</tr>
<?php endforeach; ?>
<?php else : ?>

<h2>No student to list</h2>
<?php endif ; ?>

</table>
