 <?php 
            $user = $this->ion_auth->user()->row();
            // re usable user info
            $institution_id = $user->institution_id;
            $user_id = $user->id;
            $username = $user->username;
            $email = $user->email;
           ?>
           
<div class="col-md-7">
	
		<?php
			
			foreach($venue as $v) {
		?>
	
	<form action="<?php echo base_url()?>dashboard/venues/update" method="post">
		<input type="hidden" name="id" value="<?php echo $v->id?>">
		<input type="text" name="venue" value="<?php echo $v->venue?>">
		<input type="text" name="capacity" value="<?php echo $v->capacity?>">
		<input type="submit" value="Update">
	</form>

			  
		<?php
	      }
		?>
		
		

</div>