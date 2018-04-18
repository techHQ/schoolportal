
<h2 class="page-header">Welcome <?php echo $student->lastname; ?>
<span class="pull-right">

<!-- <a class="btn btn-default" href="index.php?r=department/edit&id=<?php //echo $department->depart_id ; ?>">Update</a>
<a class="btn btn-danger" href="index.php?r=department/delete&id=<?php //echo $department->depart_id ; ?> ">Delete</a>
 -->


</span>
</h2>
 <?php if(!empty($student->firstname)) : ?>
 <div class="well">
    <h3><?php echo $student->lastname; ?>'s Details</h3>
    
</div>
<?php endif ; ?>
<ul class="list-group">
<li class="list-group-item"> <img src="upload/<?php echo $student->student_image ?>" class="image-upload"/> <span class="school-name">Valencia College</span></li>
<li class="list-group-item"><strong>Student name : </strong><?php echo $student->lastname; ?> <?php echo $student->firstname; ?> <?php echo $student->middlename; ?>
</li>
   

<?php if(!empty($student->faculty->faculty_name)) : ?>
<li class="list-group-item"><strong>Faculty : </strong><?php echo $student->faculty->faculty_name ; ?></li>
 <?php endif ; ?>


 <?php if(!empty($student->department->depart_name)) : ?>
<li class="list-group-item"><strong>Department : </strong><?php echo $student->department->depart_name ; ?></li>
 <?php endif ; ?>


 <?php if(!empty($student->course->course_name)) : ?>
<li class="list-group-item"><strong>Courses : </strong><?php echo $student->course->course_name ; ?></li>
 <?php endif ; ?>





 <li class="list-group-item"><strong>Email : </strong><?php echo $student->email ; ?></li>
 <li class="list-group-item"><strong>Contact Number : </strong><?php echo $student->phonenumber ; ?></li>
 <li class="list-group-item"><strong>Username : </strong><?php echo $student->username ; ?></li>

   <?php if(!empty($student->created_at)) : ?>

	<?php $phpdate = strtotime($student->created_at); ?>
	<?php $formatted_date = date("F j, Y, g: i a", $phpdate) ; ?>

  <li class="list-group-item"><strong>Enrollment Date : </strong><?php echo $formatted_date  ; ?></li>
<?php endif; ?>


   </ul>

<a class="btn btn-primary" href="mailto:<?php echo $student->email ; ?>?Subject=Job%20Application">Contact <?php echo $student->lastname; ?></a>  