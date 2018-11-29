 <?php 
            $user = $this->ion_auth->user()->row();
            // re usable user info
            $institution_id = $user->institution_id;
            $user_id = $user->id;
            $username = $user->username;
            $email = $user->email;
           ?>


<div>
	<h2>Departments of electrical</h2>
</div>

<div>
	<form action="<?php echo base_url() ?>dashboard/courses/addcourse" method="post">
		<input type="hidden" name="institution_id" value="<?php echo $institution_id?>">
		<input type="hidden" name="level" value="<?php echo $level?>">
		<input type="text" name="code" placeholder="Course Code">
		<input type="text" name="title" placeholder="Course Title">
		<input type="text" name="credit_unit" placeholder="Credit Unit">
		<input type="submit" value="Add">
	</form>
</div>
<hr>
<div>
	
	<table class="table">
		<tr>
			<th>Code</th>
			<th>Title</th>
			<th>Credit Unit</th>
			<th>Action</th>
		</tr>
		<?php 
		  $courses = $this->db->query("SELECT * FROM courses WHERE institution_id='$institution_id' AND level='$level'")->result();
		  foreach ($courses as $course) {
		 
		 ?>
		 <tr>
			<td><?php echo $course->code  ?></td>
			<td><?php echo $course->title  ?></td>
			<td><?php echo $course->credit_unit ?></td>
			<td><a href="">Delete</a></td>
			<td><a href="">Edit</a></td>
		</tr>


		 <?php 
		}

		 ?>
		
	</table>
</div>
