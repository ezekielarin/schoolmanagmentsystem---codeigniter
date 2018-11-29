 <?php 
            $user = $this->ion_auth->user()->row();
            // re usable user info
            $institution_id = $user->institution_id;
            $user_id = $user->id;
            $username = $user->username;
            $email = $user->email;
           ?>

<div>
	       <?php    
              if ($this->ion_auth->is_admin()) // only admin can view this menu
              {
                ?>
	<form action="levels/addnew" method="post">
		<input type="hidden" name="institution_id" value="<?php echo $institution_id?>">
		<input type="text" name="level">
		<input type="submit" value="Add">
	</form>
	<?php
      }
	?>
</div>
<div class="col-md-7">
	<table class="table">
		<tr>
			<th>Levels</th>
			<th>Option</th>
			
		</tr>
		<?php
			$get = $this->db->query("SELECT * FROM levels WHERE institution_id='$institution_id' ORDER BY level ASC ")->result();
			foreach ($get as $level) {
		?>
			<tr>
			  <td><?php echo $level->level?></td>
			  <td><a href="levels/delete/<?php echo $level->id?>">Delete</a></td>
			  <td><a href="levels/edit/<?php echo $level->id?>">Edit</a></td>
		    </tr>
		<?php
	      }
		?>
		
		
	</table>
</div>