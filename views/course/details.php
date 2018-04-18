<a href="index.php?r=course" >Back to Courses</a>
<h2 class="page-header"><?php echo $course->course_name; ?>
<span class="pull-right">

<a class="btn btn-default" href="index.php?r=course/edit&id=<?php echo $course->course_id ; ?>">Update</a>
<a class="btn btn-danger" href="index.php?r=course/delete&id=<?php echo $course->course_id ; ?> ">Delete</a>



</span>
</h2>
 <?php if(!empty($course->course_name)) : ?>
 <div class="well">
    <h3>Course Details</h3>
    <?php echo $course->course_name ; ?>
</div>
<?php endif ; ?>
<ul class="list-group">

<li class="list-group-item"><strong>Course name : </strong><?php echo $course->course_name; ?>
</li>
   

   	<?php if(!empty($course->department->department_name)) : ?>
<li class="list-group-item"><strong>Faculty : </strong><?php echo $course->department->department_name ; ?></li>
   <?php endif ; ?>

<!-- <li class="list-group-item"><strong>Department name : </strong><?php //echo $department->contact_email; ?> -->
</li>

   </ul>

<!-- <a class="btn btn-primary" href="mailto:<?php //echo $course->department->contact_email ; ?>?Subject=Job%20Application">Contact HOD</a>  -->