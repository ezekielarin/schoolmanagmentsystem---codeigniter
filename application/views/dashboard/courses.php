 <?php 
            $user = $this->ion_auth->user()->row();
            // re usable user info
            $institution_id = $user->institution_id;
            $user_id = $user->id;
            $username = $user->username;
            $email = $user->email;
            //faculty id of user
           $faculty = $this->db->query("SELECT * FROM institution_users WHERE user_id='$user_id'")->row();
          // $faculty_id = $faculty->faculty_id;

           ?>

<div>
	<h2>Departments of electrical</h2>
</div>
<div>
	<?php
	 $levels = $this->db->query("SELECT * FROM levels WHERE institution_id='$institution_id'")->result();
	 foreach ($levels as $level) {
	?>
	<a class="btn btn-primary" href="courses/level/<?php echo $level->level ?>">Edit</a><h3><?php echo $level->level  ?> level</h3>

	  <table class="table">
		<tr>
			<th>Code</th>
			<th>Title</th>
			<th>Credit Unit</th>
		</tr>
	     <?php 
	     $courses = $this->db->query("SELECT * FROM courses WHERE institution_id='$institution_id' AND level='$level->level'")->result();
	     foreach ($courses as $course) {
	     	
	      ?>
	
		<tr>
			<td><?php echo $course->code; ?></td>
			<td><?php echo $course->title; ?></td>
			<td><?php echo $course->credit_unit; ?></td>
		</tr>
		
	
	<?php 
	    }
	    ?>
	    </table>
	    <?php
	   }
	  ?>
</div>
