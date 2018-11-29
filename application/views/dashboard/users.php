
<div>
	<a class="btn btn-primary" href="users/newuser">Add User</a>
</div>

<table class="table">
 <tr>
 	<th>First Name</th>
 	<th>Last Name</th>
 	<th>Institution</th>
 	<th>Faculty</th>
 	<th>Role</th>
 </tr>
	

<?php 
 $admin = $this->ion_auth->user()->row();
 $users  =  $this->db->query("SELECT * FROM users WHERE institution_id='$admin->institution_id'")->result();

 foreach ($users as $usr) {
 	?>
 	<tr>
 		<td><?php echo $usr->first_name?></td>
 		<td><?php echo $usr->last_name?></td>
 		<td><?php echo $usr->institution?></td>
 		<td><?php echo $usr->institution?></td>
 		
 	</tr>


 	<?php
 }

?>
</table>