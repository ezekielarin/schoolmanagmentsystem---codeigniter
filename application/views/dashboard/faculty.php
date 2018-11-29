              
           <?php 
            $user = $this->ion_auth->user()->row();
            // re usable user info
            $institution_id = $user->institution_id;
            $user_id = $user->id;
            $username = $user->username;
            $email = $user->email;
           ?>


              <?php 
              
              if ($this->ion_auth->is_admin()) // only admin can view this menu
              {
                ?>
<div>
	<form action="faculty/add" method="post">
		<input type="hidden" name="institution_id" value="<?php echo $institution_id?>">
		<input type="text" name="faculty">
		<input type="submit" value="Add">
	</form>
</div>
<?php
}
?>

<div class="col-md-7">
	<table class="table">
		<tr>
			<th>Faculty</th>
			<th>Options</th>
			
		</tr>
		<?php
		$string =  $this->db->query("SELECT * FROM faculty WHERE institution_id='$institution_id'")->result(); 
		if ($string) {
		foreach ($string as $fac) {
			?>
		<tr>
			<td><a href="faculty/view/<?php echo $fac->id; ?>"><?php echo $fac->faculty; ?></a></td>
			<td><a href="faculty/delete/<?php echo $fac->id?>">Delete</a></td>
			<td><a href="faculty/edit/<?php echo $fac->id?>">Edit</a></td>
		</tr>

			<?php
		  }
		}else{
			?>
			<tr><td>
				<span>This Section is Empty!</span>
				<h1><i class="fa fa-trash"></i> </h1>
			   </td>
			</tr>

			<?php
		}
		?>
		
		
	</table>
</div>