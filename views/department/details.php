<a href="index.php?r=department" >Back to Departments</a>
<h2 class="page-header"><?php echo $department->depart_name; ?>
<span class="pull-right">

<a class="btn btn-default" href="index.php?r=department/edit&id=<?php echo $department->depart_id ; ?>">Update</a>
<a class="btn btn-danger" href="index.php?r=department/delete&id=<?php echo $department->depart_id ; ?> ">Delete</a>



</span>
</h2>
 <?php if(!empty($department->depart_name)) : ?>
 <div class="well">
    <h3>Department Details</h3>
    <?php echo $department->depart_name ; ?>
</div>
<?php endif ; ?>
<ul class="list-group">

<li class="list-group-item"><strong>Department name : </strong><?php echo $department->depart_name; ?>
</li>
   

   	<?php if(!empty($department->faculty->faculty_name)) : ?>
<li class="list-group-item"><strong>Faculty : </strong><?php echo $department->faculty->faculty_name ; ?></li>
   <?php endif ; ?>

<li class="list-group-item"><strong>Department name : </strong><?php echo $department->contact_email; ?>
</li>

   </ul>

<a class="btn btn-primary" href="mailto:<?php echo $department->contact_email ; ?>?Subject=Job%20Application">Contact HOD</a> 