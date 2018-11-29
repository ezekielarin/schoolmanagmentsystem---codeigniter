         <?php 
            $user = $this->ion_auth->user()->row();
            // re usable user info
            $institution_id = $user->institution_id;
            $user_id = $user->id;
            $username = $user->username;
            $email = $user->email;
           ?>

    <h4>Faculty:  <?php echo $faculty->faculty ?></h4>
<div class="col-md-7">
	
</div>

		<table class="table">
			<tr>
				<td>Departments</td>
				<td>
						<form action="<?php echo base_url()?>dashboard/faculty/add_dept" method="post">
							<input type="hidden" name="institution_id" value="<?php echo $institution_id?>">
							<input type="hidden" name="faculty_id" value="<?php echo $faculty->id?>">
							<input type="text" name="department" placeholder="department of physics">
							<input type="submit" value="Add">
						</form>
				</td>
			</tr>
			<?php 
			 $dept =  $this->db->query("SELECT * FROM departments WHERE institution_id='$institution_id' AND faculty_id='$faculty->id'")->result();
			 foreach ($dept as $depts) {
			?>
			<tr>
				<td><?php echo $depts->department; ?></td>
			</tr>
			<?php 
		       } 
			?>
		</table>
		

</div>